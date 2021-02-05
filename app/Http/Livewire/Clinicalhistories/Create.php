<?php

namespace App\Http\Livewire\Clinicalhistories;

use App\Models\ClinicalHistory;
use App\Models\Diagnostic;
use App\Models\Patient;
use App\Models\TemplateClinicalHistory;
use Livewire\Component;

class Create extends Component
{
    public $paciente;
    public $template_id;
    public $plantilla;
    public $hospitalization_date;
    public $discharge_date;
    public $ant_medical;
    public $ant_surgical;
    public $diagnostic;
    public $auxDiagnostic = null;

    protected $rules = [
        'plantilla.reason_consult' => 'required',
        'plantilla.current_disease_history' => 'required',
        'plantilla.overall_status' => 'required',
        'plantilla.respiratory_system' => 'required',
        'plantilla.cardiovascular_system' => 'required',
        'plantilla.abdomen' => 'required',
        'plantilla.diagnostic' => 'required',
        'plantilla.study_plan' => 'required',
        'plantilla.treatment' => 'required',
        'hospitalization_date' => 'required|date',
        'discharge_date' => 'required|date|after_or_equal:hospitalization_date',
    ];

    public function mount()
    {
        $this->ant_medical = $this->paciente->ant_medical;
        $this->ant_surgical = $this->paciente->ant_surgical;
    }

    public function buscarDiagnostico()
    {
        $this->auxDiagnostic = Diagnostic::where('diagnostic', $this->diagnostic)->get();
    }

    public function seleccionar()
    {
        if ($this->template_id) {
            $this->plantilla = TemplateClinicalHistory::findOrFail($this->template_id);
        } else $this->plantilla = null;
    }

    public function actualizar()
    {
        $patient = Patient::findOrFail($this->paciente->id);
        $patient->update([
            'ant_medical' => $this->ant_medical,
            'ant_surgical' => $this->ant_surgical,
        ]);
        $patient->touch();
    }

    public function store()
    {
        $this->validate();

        if ($this->template_id == null) {
            $attributes = $this->plantilla;
            $attributes['name'] = 'nombre' . time();
            $this->plantilla = TemplateClinicalHistory::create($attributes);
        }

        $data = $this->plantilla->toArray();

        $data['patient_id'] = $this->paciente->id;
        $data['weight'] = 90;
        $data['height'] = 2;
        $data['sanatorio_id'] = 1;
        $data['type_intervention'] = 1;
        $data['user_id'] = auth()->user()->id;
        $data['hospitalization_date'] = $this->hospitalization_date;
        $data['discharge_date'] = $this->discharge_date;
        $data['ant_medical'] = $this->ant_medical;
        $data['ant_surgical'] = $this->ant_surgical;

        unset($data['name']);
        unset($data['id']);

        ClinicalHistory::create($data);

        return redirect()->route('patients.show', $this->paciente->id);
    }

    public function render()
    {
        return view('livewire.clinicalhistories.create', [
            'templates' => TemplateClinicalHistory::all(['id', 'name'])
        ]);
    }
}
