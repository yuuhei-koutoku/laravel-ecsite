<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class GuestLoginController extends Controller
{
    private const GUEST_USER_ID = 1;

    public function guestLogin(): RedirectResponse
    {
        if (Auth::loginUsingId(self::GUEST_USER_ID)) {
            session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return redirect()->intended('/login');
    }

    public static function isGuestUser(): bool
    {
        return Auth::id() === self::GUEST_USER_ID;
    }
}
