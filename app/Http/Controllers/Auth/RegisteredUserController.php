<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            // Validazione dei dati
            $validatedData = $request->validate([
                'register_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],  
                'register_password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            
            // Creazione dell'utente
            $user = User::create([
                'email' => $validatedData['register_email'],
                'password' => Hash::make($validatedData['register_password']),
            ]);
    
            // Eventi e login automatico
            event(new Registered($user));
            Auth::login($user);
    
            // Redirect alla home dopo la registrazione
            return redirect(RouteServiceProvider::HOME);
        
        } catch (\Illuminate\Validation\ValidationException $e) {
            // In caso di errore di validazione, reindirizza indietro con un flag di sessione. Nel template blade del Login si inizializza 
            return redirect()->back()
                ->withErrors($e->validator)
                ->withInput()
                ->with('showRegistrationForm', true);
        }
    }
    
    
}
