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
        return view('dashboard.user.login.signin');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
         $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // ✅ 2. Attempt to log in the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // ✅ 3. Redirect based on role_id
            if ($user->role_id === 1) {
                return redirect()->intended('/dashboard/admin');
            } elseif ($user->role_id === 2) {
                return redirect()->intended('/dashboard/employee');
            } else {
                return redirect()->intended('/index');
            }
        }

        // ✅ 4. If login fails
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ])->onlyInput('email');
        
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
