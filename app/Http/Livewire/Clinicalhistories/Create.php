<?php

namespace App\Http\Livewire\Clinicalhistories;

use App\Models\ClinicalHistory;
use App\Models\Diagnostic;
use App\Models\Patient;
use App\Models\TemplateClinicalHistory;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

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
    public $diagnostics;
    public $inputDiagnostic;
    public $auxDiagnostic = null;
    public $arrayDiagnostic = [];
    public $weight;
    public $height;

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
        'height' => 'required',
        'weight' => 'required',
    ];

    public function mount()
    {
        $this->ant_medical = $this->paciente->ant_medical;
        $this->ant_surgical = $this->paciente->ant_surgical;
    }

    public function createDiagnostic()
    {
        $newDiagnostic = Diagnostic::create([
            'diagnostic' => $this->inputDiagnostic
        ]);

        $this->addDiagnostic($newDiagnostic);
    }

    public function addDiagnostic($value)
    {
        $this->arrayDiagnostic[] = $value;
        $this->convertDiagnostic();
        $this->auxDiagnostic = null;
        $this->inputDiagnostic = null;
    }

    public function deleteDiagnostic($id)
    {
        array_splice($this->arrayDiagnostic, $id, 1, null);
        $this->convertDiagnostic();
    }

    public function searchDiagnostic()
    {
        $values = Diagnostic::where('diagnostic', 'LIKE', $this->inputDiagnostic . '%')->get();
        if (count($values) > 0) {
            $this->auxDiagnostic = $values;
        } else $this->auxDiagnostic = null;
    }

    public function selectDiagnostic($id)
    {
        $this->diagnostic = Diagnostic::find($id)->diagnostic;
        $this->plantilla['diagnostic'] = $this->diagnostic;
        $this->auxDiagnostic = null;
    }

    public function convertDiagnostic()
    {
        if (count($this->arrayDiagnostic) > 0) {
            foreach ($this->arrayDiagnostic as $item) {
                $this->diagnostic = $this->diagnostic . ', ' . $item['diagnostic'];
            }
        }

        $this->plantilla['diagnostic'] = $this->diagnostic;
    }

    public function selectTemplate()
    {
        $this->arrayDiagnostic = [];
        if ($this->template_id) {
            $this->plantilla = TemplateClinicalHistory::findOrFail($this->template_id);
            $diagnostic = $this->plantilla['diagnostic'];
            $arreglo = [
                'id' => 0,
                'diagnostic' => $diagnostic
            ];
            $this->addDiagnostic($arreglo);
        } else {
            $this->plantilla = null;
            $this->arrayDiagnostic = [];
        }
    }

    public function updatePatient()
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
        $data['weight'] = $this->weight;
        $data['height'] = $this->height;
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
