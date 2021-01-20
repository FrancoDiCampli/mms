<?php

namespace App\Http\Livewire\Queries;

use App\Models\Patient;
use App\Models\Query;
use Livewire\Component;

class Create extends Component
{
    public $consulta;
    public $patient_id;
    public $patient_dni;
    public $patient_name;
    public $buscarPaciente;
    public $pacientes;
    public $paciente;

    public function selectedPaciente(Patient $item)
    {
        $this->paciente = $item;
        $this->patient_id = $item->id;
        $this->patient_dni = $item->dni;
        $this->patient_name = $item->surname . ' ' . $item->name;
        $this->buscarPaciente = '';
        $this->pacientes = null;
    }

    public function store()
    {
        $this->validate(
            [
                'consulta' => 'required|min:5',
                'patient_id' => 'required',
            ],
            [
                'consulta.required' => 'El campo :attribute es requerido.',
                'patient_id.required' => 'Debe seleccionar un paciente.',
            ],
        );

        Query::create([
            'query' => $this->consulta,
            'patient_id' => $this->patient_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('queries.index');
    }

    public function render()
    {
        if ($this->buscarPaciente != '') {
            $this->pacientes = Patient::orWhere('surname', 'LIKE', $this->buscarPaciente . '%')
                ->orWhere('dni', 'LIKE', $this->buscarPaciente . '%')
                ->orWhere('name', 'LIKE', $this->buscarPaciente . '%')
                ->get();
        } else {
            $this->pacientes = null;
        }
        return view('livewire.queries.create', [
            'pacientes' => $this->pacientes,
            'paciente' => $this->paciente,
        ]);
    }
}
