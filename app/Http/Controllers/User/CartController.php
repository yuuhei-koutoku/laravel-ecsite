<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Jobs\SendOrderedMail;
use App\Jobs\SendThanksMail;
use App\Models\Cart;
use App\Models\Stock;
use App\Models\User;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $products = $user->products;
        $totalPrice = 0;

        foreach ($products as $product) {
            $totalPrice += $product->price * $product->pivot->quantity;
        }

        return view('user.cart',
            compact('products', 'totalPrice'));
    }

    public function add(Request $request)
    {
        $itemInCart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth::id())->first();

        if ($itemInCart) {
            $itemInCart->quantity += $request->quantity;
            $itemInCart->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return to_route('user.cart.index');
    }

    public function delete($id)
    {
        Cart::where('product_id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return to_route('user.cart.index');
    }

    public function checkout()
    {
        $user = User::findOrFail(Auth::id());

        $session = DB::transaction(function () use ($user) {
            $products = $user->products;

            $lineItems = [];
            foreach ($products as $product) {
                $quantity = '';
                $quantity = Stock::where('product_id', $product->id)->lockForUpdate()->sum('quantity');

                if ($product->pivot->quantity > $quantity) {
                    return to_route('user.cart.index');
                } else {
                    $lineItem = [
                        'price_data' => [
                            'unit_amount' => $product->price,
                            'currency' => 'JPY',
                            'product_data' => [
                                'name' => $product->name,
                                'description' => $product->information,
                            ],
                        ],
                        'quantity' => $product->pivot->quantity,
                    ];
                    array_push($lineItems, $lineItem);
                }
            }

            // 商品の在庫を減らす
            foreach ($products as $product) {
                Stock::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'type' => \Constant::PRODUCT_LIST['reduce'],
                    'quantity' => $product->pivot->quantity * -1,
                ]);
            }

            // Stripeのシークレットキーを設定
            \Stripe\Stripe::setApiKey(config('stripe.secret_key'));

            // Checkoutセッションを作成
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'], // 支払い方法を指定
                'line_items' => [$lineItems], // 販売する商品を定義
                'mode' => 'payment', // モードを選択
                'success_url' => route('user.cart.success'), // 成功時のURLを指定
                'cancel_url' => route('user.cart.cancel'), // キャンセル時のURLを指定
            ]);

            return $session;
        }, 2);

        // ビューにパブリックキーを渡す
        $publicKey = config('stripe.public_key');

        return view('user.checkout',
            compact('session', 'publicKey'));
    }

    public function success()
    {
        $items = Cart::where('user_id', Auth::id())->get();
        $products = CartService::getItemsInCart($items);
        $user = User::findOrFail(Auth::id());

        SendThanksMail::dispatch($products, $user);
        foreach ($products as $product) {
            SendOrderedMail::dispatch($product, $user);
        }

        foreach ($user->products as $product) {
            Stock::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'type' => \Constant::PRODUCT_LIST['decision'],
                'quantity' => $product->pivot->quantity,
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();

        return to_route('user.items.index');
    }

    public function cancel()
    {
        $user = User::findOrFail(Auth::id());

        foreach ($user->products as $product) {
            Stock::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'type' => \Constant::PRODUCT_LIST['add'],
                'quantity' => $product->pivot->quantity,
            ]);
        }

        return to_route('user.cart.index');
    }
}
