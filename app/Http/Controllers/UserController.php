<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Requests\UserLoginRequest;

class UserController extends Controller
{
    public function registerView() :View
    {
        if (Auth::check()) {
            return \view('welcome');
        }else {
            return \view('register');
        }
    }

    public function userStore(UserLoginRequest $req)
    {
        $req->validate([
            'login' => 'required',
            'password' => 'required|min:5',
        ]);

        try {
            $user = User::create([
                'name' => $req->login,
                'password' => Hash::make($req->password),
            ]);

            Auth::login($user);

            return redirect()->to(route('welcome'));
        }catch (QueryException $e)
        {
            return redirect()->to(route('user.register'));
        }
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->to(route('welcome'));
    }

    public function loginView() :View
    {
        return \view('login');
    }

    public function loginAttempt(Request $req)
    {
        // Próba logowania
        if (Auth::attempt(['name' => $req->login, 'password' => $req->password])) {
            // Jeśli logowanie się powiedzie, przekieruj do strony głównej
            return redirect()->to(route('welcome'));
        }
        // Jeśli logowanie się nie powiedzie, wyświetl komunikat o błędzie
        return back()->withErrors([
            'email' => 'Podane dane są nieprawidłowe.',
        ])->withInput($req->only('email', 'remember'));
    }


}
