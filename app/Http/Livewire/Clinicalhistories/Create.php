<?php

namespace App\Http\Livewire\Clinicalhistories;

use App\Models\ClinicalHistory;
use App\Models\TemplateClinicalHistory;
use Livewire\Component;

class Create extends Component
{
    public $paciente;
    public $template_id;
    public $plantilla;
    public $hospitalization_date;
    public $discharge_date;

    protected $rules = [
        'plantilla.reason_consult' => 'nullable',
        'plantilla.current_disease_history' => 'nullable',
        'plantilla.overall_status' => 'nullable',
        'plantilla.respiratory_system' => 'nullable',
        'plantilla.cardiovascular_system' => 'nullable',
        'plantilla.abdomen' => 'nullable',
        'plantilla.diagnostic' => 'nullable',
        'plantilla.study_plan' => 'nullable',
        'plantilla.treatment' => 'nullable',
    ];

    public function seleccionar()
    {
        $this->plantilla = TemplateClinicalHistory::findOrFail($this->template_id);
    }

    public function store()
    {
        $data = $this->plantilla->toArray();

        $data['patient_id'] = $this->paciente->id;
        $data['weight'] = 90;
        $data['height'] = 2;
        $data['sanatorio_id'] = 1;
        $data['type_intervention'] = 1;
        $data['user_id'] = auth()->user()->id;
        $data['hospitalization_date'] = $this->hospitalization_date;
        $data['discharge_date'] = $this->discharge_date;
        $data['ant_medical'] = $this->paciente->ant_medical;
        $data['ant_surgical'] = $this->paciente->ant_surgical;

        unset($data['name']);
        unset($data['id']);

        ClinicalHistory::create($data);

        return redirect()->route('patients.show', $this->paciente->id);
    }

    public function render()
    {
        return view('livewire.clinicalhistories.create', [
            'templates' => TemplateClinicalHistory::all()
        ]);
    }
}
