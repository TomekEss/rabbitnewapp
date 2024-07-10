<?php

namespace App\Livewire\Cage;

use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
class CageCreate extends Component
{
    use LivewireAlert;

    public $name;
    public $countNumber;
    public $eyes = [];

    public function mount()
    {
        $this->eyes = [['eyenumber' => 1, 'cleaningDay' => Carbon::today()->format('Y-m-d')]];
        $this->countNumber = count($this->eyes);
    }
    public function render()
    {
        return view('livewire.cage.cage-create');
    }

    public function rules()
    {
      return [
              'name' => 'required|min:5',
              'eyes' => 'required|array|min:1',
              'countNumber' => 'required|integer|min:1',
              'eyes.*.eyenumber' => 'required|integer|min:1',
              'eyes.*.cleaningDay' => 'required|date|min:1',
            ];
    }


    protected $messages =
     [
            'name.required' => 'Nazwa klatki jest wymagana',
            'name.min' => 'Nazwa musi mieć co najmniej 5 znaków',
            'eyes.required' => 'Oczka są wymagane',
            'eyes.array' => 'Oczka muszą być tablicą',
            'eyes.min' => 'Musi być dodane co najmniej 1 oczko',
            'countNumber.required' => 'Liczba oczek jest wymagana',
            'countNumber.integer' => 'Liczba oczek musi być liczbą',
            'countNumber.min' => 'Liczba oczek musi być co najmniej 1',
            'eyes.*.eyenumber.required' => 'Pole numer oczka jest wymagane',
            'eyes.*.eyenumber.integer' => 'Pole numer oczka musi być liczbą',
            'eyes.*.eyenumber.min' => 'Pole numer oczka musi być co najmniej 1',
            'eyes.*.cleaningDay.required' => 'Pole data sprzątania jest wymagane',
            'eyes.*.cleaningDay.date' => 'Pole data sprzątania musi być w formacie daty Y-m-d',
            'eyes.*.cleaningDay.min' => 'Pole data sprzątania musi mieć co najmniej 1 wiersz',
    ];



    public function addEye()
    {
        $this->eyes[] = ['eyenumber' => count($this->eyes) + 1, 'cleaningDay' => Carbon::today()->format('Y-m-d')];
        $this->countEyes();
    }

    public function removeEye()
    {
        array_pop($this->eyes);
        $this->countEyes();
    }

    public function save()
    {
        try {
            $this->validate();
        }catch (\Exception $e)
        {
            $errors = $e->validator->errors()->all();
            $errorMessages = implode('<br>', $e->validator->errors()->all());
            $this->alert('error', $errorMessages, [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

            $this->validate();
        }


    }

    public function countEyes()
    {
        $this->countNumber = count($this->eyes);
    }
}
