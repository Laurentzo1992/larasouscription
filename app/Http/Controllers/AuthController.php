<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /**
     * Display the index page.
     */

    public function index(): View
    {

       /* User::create([
            'name' => 'laurent',
            'email' => 'laurent@gmail.com',
            'password' => Hash::make('0000'),
        ]);

        $projets = [
            ['libelle' => 'Les confiseries', 'amount' => 200000000],
            ['libelle' => 'Les boissons', 'amount' => 100000000],
            ['libelle' => 'Les pâtisseries', 'amount' => 300000000],
            ['libelle' => 'Les viennoiseries', 'amount' => 500000000],
        ];

        foreach ($projets as $projet) {
            Projet::create($projet);
        } */

        return view('auth.index');
    }


    /**
     * Display the login form.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request.
     */
    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('souscription.show'));
        }
        return to_route('auth.login')->withErrors([
            'email' => 'Email invalid',
        ])->onlyInput('email');
    }


    /**
     * Handle the loout request.
     */
    public function logout(Request $request)
    {
    Auth::logout();

    //$request->session()->invalidate();

    //$request->session()->regenerateToken();

    return to_route('auth.index');
    }
}
