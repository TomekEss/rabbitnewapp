<?php

namespace App\Http\Controllers;

use App\Models\Rabbits;
use Illuminate\View\View;
use App\Http\Requests\StoreRabbitRequest;

class RabbitManagementController extends Controller
{
    public function index(): View
    {
        return view('Management.Rabbits.index');
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
        try {
            error_log('dsa');
            Rabbits::create([
                'name' => $req->name,
                'born' => $req->born,
                'gender' => $req->gender,
                'deworming' => $req->deworming,
                'note' => $req->note
            ]);
        }catch (\Illuminate\Database\QueryException $e) {
            return back();
        }

        return redirect()->route('management.rabbits.index');
    }
}
