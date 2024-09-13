<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function checkIp(Request $request)
    {
        // Ottieni l'indirizzo IP del visitatore
        $visitorIp = $request->ip();

        // Cerca l'utente che ha effettuato il login con questo IP
        $user = DB::table('users')->where('last_login_ip', $visitorIp)->first();


        // Se l'utente esiste e l'IP corrisponde
        if ($user) {
            return response()->json([
                'is_authenticated' => true,
                'email' => $user->email,
            ]);
        }

        // Se l'utente non esiste o l'IP non corrisponde
        return response()->json(['is_authenticated' => false]);
    }
}
