<?php

namespace App\Livewire\Rabbit;

use App\Models\Cages_eyes;
use App\Models\Cages_name;
use App\Models\Rabbits;
use App\Models\Rabbits_in_cages;
use Livewire\Component;

class RabbitEdit extends Component
{
    public Rabbits $rabbit;

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
        return view('livewire.rabbit.rabbit-edit');
    }

    public function mount()
    {
        $this->rabbit_in_cage = Rabbits_in_cages::where('rabbit_id', '=', $this->rabbit->id)->first();
        $this->cages_name_selected = $this->rabbit_in_cage->cages_name_id ?? null;
        $this->cages_eye_selected = $this->rabbit_in_cage->cage_eye ?? null;
        $this->name = $this->rabbit->name;
        $this->gender = $this->rabbit->gender;
        $this->born = $this->rabbit->born;
        $this->deworming = $this->rabbit->deworming;
        $this->photo = $this->rabbit->photo;
        $this->note = $this->rabbit->note;
        $this->breed = $this->rabbit->breed;
        $this->cages_name = Cages_name::all();
        $this->cages_eye = Cages_eyes::where('id_cages_name', '=', $this->cages_name_selected)->get(['id','eyes_number']);;
    }

    public function updatedCagesNameSelected($value)
    {
        $this->cages_eye = [];
        $this->cages_eye = Cages_eyes::where('id_cages_name', '=', $value)->get(['id','eyes_number']);
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
        ];
    }
    public function save_rabbit()
    {
        $this->validate();

        $this->rabbit->update([
            'name' => $this->name,
            'gender' => $this->gender,
            'born' => $this->born,
            'derworming' => $this->deworming,
            'breed' => $this->breed,
        ]);

        if ($this->rabbit->rabbit_in_cage == null && $this->cages_name_selected != null && $this->cages_eye_selected != null){
            Rabbits_in_cages::create([
                'rabbit_id' => $this->rabbit->id,
                'cage_eye' => $this->cages_eye_selected,
                'cages_name_id' => $this->cages_name_selected,
            ]);
        }

        if ($this->rabbit->rabbit_in_cage != null && $this->cages_name_selected != null && $this->cages_eye_selected != null) {
            $this->rabbit->rabbit_in_cage->update([
                'cage_eye' => $this->cages_eye_selected,
                'cages_name_id' => $this->cages_name_selected,
            ]);
        }

        return redirect(route('management.rabbits.index'));
    }



}
