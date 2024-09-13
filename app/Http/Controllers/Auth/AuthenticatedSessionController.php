<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Category;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('auth.login', compact('categories'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();
        // Ottieni l'utente autenticato
        $user = Auth::user();

        // Ottieni l'indirizzo IP dell'utente che effettua il login
        $userIp = $request->ip();

        // Salva l'IP dell'utente nel database
        DB::table('users')
            ->where('id', $user->id)
            ->update(['last_login_ip' => $userIp]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Ottieni l'utente autenticato
        $user = Auth::user();

        // Resetta (cancella) l'IP salvato per l'utente
        DB::table('users')
            ->where('id', $user->id)
            ->update(['last_login_ip' => null]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth');
    }
}
