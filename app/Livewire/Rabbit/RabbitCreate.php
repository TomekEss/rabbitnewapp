<?php

namespace App\Livewire\Rabbit;

use App\Models\Cages_eyes;
use App\Models\Cages_name;
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
}
