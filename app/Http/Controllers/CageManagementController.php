<?php

namespace App\Http\Controllers;

use App\Http\Requests\CageEyeCreateRequest;
use App\Models\Cages_eyes;
use App\Models\Cages_name;
use Illuminate\Database\QueryException;

class CageManagementController extends Controller
{
    public function index()
    {
        $cages_name = Cages_name::with('cages_eay');
        $cages_eyes = Cages_eyes::with(['rabbits_in_cages', 'cages_name'])->withCount('rabbits_in_cages')->paginate(25);

        return view('Management.Cages.index', compact(['cages_name', 'cages_eyes']));
    }

    public function createEay()
    {
        $cages_name = Cages_name::all();

        return view('Management.Cages.Eye.create', compact('cages_name'));
    }

    public function storeEye(CageEyeCreateRequest $req)
    {
        $cage_name = $req->cage_name;


        try {
            Cages_eyes::create([
                'id_cages_name' => $req->cage_name,
                'eyes_number' => $req->eye_number,
                'cleaning_day' => $req->cleaning_date,
            ]);
        }catch (QueryException $e)
        {
                return redirect()->back()->withInput()->withErrors($e);
        }


        return redirect(route('management.cages.index'));
    }
}
