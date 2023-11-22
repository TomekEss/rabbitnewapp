<?php

namespace App\Http\Controllers;

use App\Models\Rabbits;
use Illuminate\View\View;
use App\Http\Requests\StoreRabbitRequest;

class RabbitManagementController extends Controller
{
    public function index(): View
    {
        $rabbits = Rabbits::all();

        return view('Management.Rabbits.index', compact('rabbits'));
    }

    public function create()
    {
        return view('Management.Rabbits.create');
    }

    public function edit()
    {
        return view('Management.Rabbits.edit');
    }

    public function store(StoreRabbitRequest $req)
    {
        if ($req->hasFile('photo'))
        {
            $file = $req->file('photo');
            $photo = file_get_contents($file);
        }

        try {
            Rabbits::create([
                'name' => $req->name,
                'born' => $req->born,
                'gender' => $req->gender,
                'deworming' => $req->deworming,
                'note' => $req->note,
                'photo' => $photo
            ]);
        }catch (\Illuminate\Database\QueryException $e) {
            dd($e);
            return back();
        }

        return redirect()->route('management.rabbits.index');
    }
}
