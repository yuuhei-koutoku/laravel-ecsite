<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\PrimaryCategory;
use App\Models\Product;
use App\Models\Stock;
use App\Services\ItemService;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        $categories = PrimaryCategory::with('secondary')
            ->get();

        $products = Product::availableItems()
            ->selectCategory($request->category ?? '0')
            ->searchKeyword($request->keyword)
            ->sortOrder($request->sort);

        if ($request->download === 'all_pages') {
            return ItemService::csvDownload($products->get(), 'all_pages');
        }

        $products = $products->paginate($request->pagination ?? '20');

        if ($request->download === 'current_page') {
            return ItemService::csvDownload($products, 'current_page');
        }

        $keyword = $request->keyword;

        return view('user.index',
            compact('products', 'categories', 'keyword'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $quantity = Stock::where('product_id', $product->id)
            ->whereNot('type', 3)
            ->sum('quantity');

        if ($quantity > 9) {
            $quantity = 9;
        }

        return view('user.show',
            compact('product', 'quantity'));
    }
}
