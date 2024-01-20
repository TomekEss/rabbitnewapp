<?php

namespace App\Http\Controllers;

use App\Models\Cages_eays;
use App\Models\Cages_name;
use Illuminate\Http\Request;

class CageManagementController extends Controller
{
    public function index()
    {
        $cages_name = Cages_name::with('cages_eay');
        $cages_eays = Cages_eays::with('cages_name')->paginate(15);

        return view('Management.Cages.index', compact(['cages_name', 'cages_eays']));
    }
}
