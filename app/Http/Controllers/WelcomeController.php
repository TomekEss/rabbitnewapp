<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function welcomeView() :View
    {
        abort_if(!auth()->check(), 403, 'Nie jesteś zalogowany.');

        return \view('welcome');
    }
}
