<?php

namespace App\Http\Controllers;

use App\Http\Requests\CageEyeCreateRequest;
use App\Models\Cages_eyes;
use App\Models\Cages_name;

class CageManagementController extends Controller
{
    public function index()
    {
        $cages_name = Cages_name::with('cages_eay');
        $cages_eyes = Cages_eyes::with('cages_name')->paginate(25);

        return view('Management.Cages.index', compact(['cages_name', 'cages_eyes']));
    }

    public function createEay()
    {
        $cages_name = Cages_name::all();

        return view('Management.Cages.Eye.create', compact('cages_name'));
    }

    public function storeEye(CageEyeCreateRequest $req)
    {
        dd('sukces');

        return redirect(route('management.cages.index'));
    }
}
