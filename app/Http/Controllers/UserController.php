<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\ValidationException;
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

    public function userStore(UserRegisterRequest $req)
    {
        $req->validate([
            'login' => 'required',
            'password' => 'required|min:5',
            'email' => 'required',
        ]);

        try {
            $user = User::create([
                'name' => $req->login,
                'email' => $req->email,
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
        return redirect()->to(route('login'));
    }

    public function loginView() :View
    {
        return \view('login');
    }

    public function loginAttempt(Request $req)
    {
            if (!Auth::validate(['name' => $req->login, 'password' => $req->password])) {
                // Utworzenie nowego obiektu MessageBag z błędami
                $errors = new MessageBag(['login' => 'Nieprawidłowy login lub hasło']);

                // Przekazanie błędów do sesji
                return redirect()->back()->withInput()->withErrors($errors);
            }

            // Jeśli dane są prawidłowe, zaloguj użytkownika i przekieruj
            Auth::attempt(['name' => $req->login, 'password' => $req->password]);
            return redirect()->to(route('welcome'));
    }

    public function useredit()
    {
        $user = Auth::user();
        $changepassword = 0;

        return view('useredit', compact('user','changepassword'));
    }

    public function userupdate(User $user, Request $req)
    {
        // Walidacja w celu zapewnienia, że użytkownik zmienia dane swojego konta.
        $authID = Auth::id();
        $currentUserID = $user->id;

        abort_if($authID !== $currentUserID && !Auth::check(), '403', 'Brak dostępu');

        if($req->password !== null){
            if (Auth::attempt(['name' => $user->name, 'password' => $req->password])) {
                try {
                    $user->update([
                        'name' => $req->login,
                        'password' => $req->newpassword,
                    ]);

                    return redirect()->route('welcome');
                }catch (QueryException $e){
                    return back()->withErrors(['somethink' => 'Błąd wpius do bazy danych']);
                }
            }
        }

            try {
                $user->update([
                   'name' => $req->login,
                ]);
                return redirect()->route('welcome');
            }catch (QueryException $e){
                return back()->withErrors(['somethink' => 'Błąd z bazy danych']);
            }

        return back()->withErrors(['somethink' => 'Coś poszło nie tak']);
    }


}
