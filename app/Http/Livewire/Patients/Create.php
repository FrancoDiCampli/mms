<?php

namespace App\Http\Livewire\Patients;

use App\Models\Patient;
use App\Models\SocialWork;
use Livewire\Component;

class Create extends Component
{
    public $obra_id;
    public $num_afiliado;
    public $social_works = [];
    public $dni;
    public $surname;
    public $name;

    public function agregar()
    {
        if ($this->obra_id != 1 && $this->obra_id != null && $this->num_afiliado != null) {
            $aux = [
                'id' => $this->obra_id,
                'affiliate' => $this->num_afiliado,
            ];

            array_push($this->social_works, $aux);

            $this->num_afiliado = '';
        } elseif ($this->obra_id == 1) {
            $aux = [
                'id' => $this->obra_id,
                'affiliate' => null,
            ];

            array_push($this->social_works, $aux);

            $this->num_afiliado = '';
        }
    }

    public function store()
    {
        $this->validate(
            [
                'name' => 'required|min:3',
                'surname' => 'required|min:3',
                'dni' => 'required|min:7|max:8',
                'social_works' => 'required',
            ],
        );

        Patient::create([
            'name' => $this->name,
            'surname' => $this->surname,
            'dni' => $this->dni,
            'social_works' => $this->social_works,
        ]);

        return redirect()->route('patients.index');
    }

    public function render()
    {
        return view('livewire.patients.create', [
            'socialworks' => SocialWork::all()
        ]);
    }
}
