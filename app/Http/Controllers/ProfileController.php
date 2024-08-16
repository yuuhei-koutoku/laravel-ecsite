<?php

namespace App\Http\Controllers;

use App\Http\Controllers\User\GuestLoginController;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $stocks = DB::table('t_stocks')
            ->join('products', 't_stocks.product_id', '=', 'products.id')
            ->join('images', 'products.image1', '=', 'images.id')
            ->select('images.filename', 'products.name', 'products.price', 't_stocks.quantity', 't_stocks.created_at')
            ->where('t_stocks.user_id', Auth::id())
            ->where('t_stocks.type', 3)
            ->orderBy('t_stocks.created_at', 'desc')
            ->get();

        return view('profile.edit', [
            'user' => $request->user(),
            'stocks' => $stocks,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        if (GuestLoginController::isGuestUser()) {
            return redirect()->intended('/profile');
        }

        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('user.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (GuestLoginController::isGuestUser()) {
            return redirect()->intended('/profile');
        }

        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
