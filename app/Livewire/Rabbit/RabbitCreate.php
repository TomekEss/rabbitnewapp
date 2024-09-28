<?php

namespace App\Livewire\Rabbit;

use App\Models\Cage\CagesEye;
use App\Models\Cage\CagesName;
use App\Models\Rabbit\Dicts\RabbitTypeDict;
use App\Models\Rabbit\Rabbits;
use Livewire\Component;
use Livewire\WithFileUploads;

class RabbitCreate extends Component
{
    use WithFileUploads;

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
    public $rabbit_types;
    public $rabbit_types_selected;

    public $rabbit_in_cage;
    public function render()
    {
        return view('livewire.rabbit.rabbit-create');
    }

    public function mount()
    {
        $this->cages_name = CagesName::all();
        $this->rabbit_types = RabbitTypeDict::all();
    }

    public function updatedCagesNameSelected($value)
    {
        $this->cages_eye = [];
        $this->cages_eye = CagesEye::where('id_cages_name', '=', $value)->get(['id','eyes_number']);
    }

    public function add_rabbit()
    {
        $this->validate();

        try {
            $rabbit = Rabbits::create([
                'name' => $this->name,
                'gender' => $this->gender,
                'born' => $this->born,
                'deworming' => $this->deworming,
                'photo' => $this->photo->getClientOriginalName(),
                'note' => $this->note,
                'breed' => $this->rabbit_types_selected,
            ]);

            if ($this->photo != null){
                $this->photo->store(path: 'kroliki');
            }

        }catch (\Exception $exception){
            session()->flash('error', $exception->getMessage());
        }

        //Jeżeli zostal wybrany numer oczka oraz nazwa klatki to zapisz
        if ($this->cages_eye_selected != null && $this->cages_name_selected != null)
        {
            Rabbits_inCages::create([
                'rabbit_id' => $rabbit->id,
                'cage_eye' => $this->cages_eye_selected,
                'cages_name_id' => $this->cages_name_selected,
            ]);
        }

        return redirect(route('management.rabbits.index'));
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'born' => 'nullable',
            'gender' => 'required',
            'deworming' => 'nullable',
            'rabbit_types_selected' => 'nullable',
            'note' => 'nullable',
            'photo' => 'nullable|image|max:2048',
            'cages_name_selected' => 'nullable',
            'cages_eye_selected' => 'nullable'
        ];
    }

    protected $messages = [
        'name.required' => 'Nazwa jest wymagana',
        'gender.required' => 'Data urodzenia jest wymagana',
//        'cages_name_selected.required' => 'Nazwa klatki jest wymagana',
//        'cages_eye_selected.required' => 'Numer oczka jest wymagana',
    ];
}
