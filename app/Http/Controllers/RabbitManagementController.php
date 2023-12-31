<?php

namespace App\Http\Controllers;

use App\Models\Rabbits;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Requests\StoreRabbitRequest;

class RabbitManagementController extends Controller
{
    public function index(): View
    {
        $rabbits = Rabbits::paginate(15);

        return view('Management.Rabbits.index', compact('rabbits'));
    }

    public function create()
    {
        return view('Management.Rabbits.create');
    }

    public function edit(Rabbits $rabbit)
    {
        abort_if(!Auth::check(), '403', 'Brak dostępu');

        return view('Management.Rabbits.edit', compact('rabbit'));
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
            dd($e);
            return back();
        }

        return redirect()->route('management.rabbits.index');
    }

    public function delete(Rabbits $rabbit)
    {
        abort_if(!Auth::check(), '403', 'Brak dostępu');

        $rabbit->delete();

        return redirect()->route('management.rabbits.index');
    }

}
