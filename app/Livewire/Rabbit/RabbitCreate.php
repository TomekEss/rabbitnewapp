<?php

namespace App\Livewire\Rabbit;

use App\Models\Cages_eyes;
use App\Models\Cages_name;
use App\Models\Rabbits;
use App\Models\Rabbits_in_cages;
use Livewire\Component;

class RabbitCreate extends Component
{
    public $name;
    public $gender;
    public $born;
    public $deworming;
    public $photo;
    public $note;
    public $breed;
    public $cages_name = [];
    public $cages_name_selected;
    public $cages_eye = [];
    public $cages_eye_selected;

    public $rabbit_in_cage;
    public function render()
    {
        return view('livewire.rabbit.rabbit-create');
    }

    public function mount()
    {
        $this->cages_name = Cages_name::all();
    }

    public function updatedCagesNameSelected($value)
    {
        $this->cages_eye = [];
        $this->cages_eye = Cages_eyes::where('id_cages_name', '=', $value)->get(['id','eyes_number']);
    }

    public function add_rabbit()
    {
        $this->validate();

        $rabbit = Rabbits::create([
            'name' => $this->name,
            'gender' => $this->gender,
            'born' => $this->born,
            'deworming' => $this->deworming,
            'photo' => $this->photo,
            'note' => $this->note,
            'breed' => $this->breed,
        ]);

        $rabbitid = $rabbit->id;

        Rabbits_in_cages::create([
            'rabbit_id' => $rabbitid,
            'cage_eye' => $this->cages_eye_selected,
            'cages_name_id' => $this->cages_name_selected,
        ]);

        return redirect(route('management.rabbits.index'));
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'born' => 'nullable',
            'gender' => 'required',
            'deworming' => 'nullable',
            'breed' => 'nullable',
            'note' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'cages_name_selected' => 'required',
            'cages_eye_selected' => 'required'
        ];
    }

    protected $messages = [
        'name.required' => 'Nazwa jest wymagana',
        'gender.required' => 'Data urodzenia jest wymagana',
        'cages_name_selected.required' => 'Nazwa klatki jest wymagana',
        'cages_eye_selected.required' => 'Numer oczka jest wymagana',
    ];
}
