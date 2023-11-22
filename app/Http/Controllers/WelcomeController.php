<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function welcomeView() :View
    {
        if (!Auth::check()){
            return \view('login');
        }

        return \view('welcome');
    }
}
