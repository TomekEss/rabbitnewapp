<?php

namespace App\Http\Controllers;

use App\Models\Cages_eyes;
use App\Models\Cages_name;
use App\Models\Rabbits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Requests\StoreRabbitRequest;

class RabbitManagementController extends Controller
{
    public function index(): View
    {
        $rabbit = Rabbits::with('rabbit_in_cage')->get();

        $rabbitssort = $rabbit->sortBy(function($item){
            return $item->rabbit_in_cage->eye->eyes_number;
        });

        $rabbits = $rabbitssort->groupBy(function($item){
            return $item->rabbit_in_cage->cage_name->name;
        });



        return view('Management.Rabbits.index', compact('rabbits'));
    }

    public function create()
    {
        return view('Management.Rabbits.create');
    }

    public function store(StoreRabbitRequest $req)
    {

        if ($req->hasFile('photo'))
        {
            $file = $req->file('photo');
            $photo = file_get_contents($file);
        }else{
            $photo = null;
        }

        try {
            Rabbits::create([
                'name' => $req->name,
                'born' => $req->born,
                'gender' => $req->gender,
                'deworming' => $req->deworming,
                'breed' => $req->breed,
                'note' => $req->note,
                'photo' => $photo
            ]);
        }catch (\Illuminate\Database\QueryException $e) {
            return back();
        }

        return redirect()->route('management.rabbits.index');
    }

    public function edit(Rabbits $rabbit)
    {
        abort_if(!Auth::check(), '403', 'Brak dostępu');

        return view('Management.Rabbits.edit', compact(['rabbit']));
    }

    public function update(Request $req, Rabbits $rabbit)
    {

    }

    public function show(Rabbits $rabbit)
    {
        abort_if(!Auth::check(), '403', 'Brak dostępu');

        return view('Management.Rabbits.show', compact('rabbit'));
    }



    public function delete(Rabbits $rabbit)
    {
        abort_if(!Auth::check(), '403', 'Brak dostępu');

        $rabbit->delete();

        return redirect()->route('management.rabbits.index');
    }

}
