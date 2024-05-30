<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->hasRole(['admin'])){
            $redirect_to = '/panel/admin';
        } elseif(Auth::user()->hasRole(['user'])){
            $redirect_to = '/dashboard';
        } else {
            $redirect_to = '/unknown_user';
        }
        // Redirect only if the user hasn't already been redirected
        // if ($request->path() !== ltrim($redirect_to, '/')) {
        //     return redirect($redirect_to);
        // }

        return redirect()->intended($redirect_to);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
