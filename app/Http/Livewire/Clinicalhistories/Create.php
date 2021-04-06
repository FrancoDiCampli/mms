<?php

namespace App\Http\Livewire\Clinicalhistories;

use App\Models\Patient;
use Livewire\Component;
use App\Models\Diagnostic;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\ClinicalHistory;
use App\Models\StudyPlan;
use App\Models\TemplateClinicalHistory;

class Create extends Component
{
    use WithPagination;

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
    // public $auxDiagnostic = null;
    public $arrayDiagnostic = [];
    public $weight = 0;
    public $height = 0;
    public $name_template;
    public $study_plan = [];
    public $filtro;
    public $new_plan;

    protected $rules = [
        'plantilla.reason_consult' => 'required',
        'plantilla.current_disease_history' => 'required',
        'plantilla.overall_status' => 'required',
        'plantilla.respiratory_system' => 'required',
        'plantilla.cardiovascular_system' => 'required',
        'plantilla.abdomen' => 'required',
        'plantilla.diagnostic' => 'required',
        // 'plantilla.study_plan' => 'nullable',
        'plantilla.treatment' => 'required',
        'hospitalization_date' => 'required|date',
        'discharge_date' => 'required|date|after_or_equal:hospitalization_date',
        'height' => 'required',
        'weight' => 'required',
        'name_template' => 'unique:template_clinical_histories,name',
        'new_plan' => 'unique:study_plans,study_plan'
    ];

    public function mount()
    {
        $this->ant_medical = $this->paciente->ant_medical;
        $this->ant_surgical = $this->paciente->ant_surgical;
        $this->hospitalization_date = today()->format('Y-m-d');
        $this->discharge_date = today()->format('Y-m-d');
    }

    public function createDiagnostic()
    {
        $code = Str::random(5);
        $newDiagnostic = Diagnostic::create([
            'code' => Str::upper($code),
            'diagnostic' => $this->inputDiagnostic
        ]);

        $this->addDiagnostic($newDiagnostic);
    }

    public function createPlan()
    {
        StudyPlan::create([
            'study_plan' => $this->new_plan
        ]);
        $this->new_plan = '';
        $this->render();
    }

    public function addDiagnostic($value)
    {
        $cond = true;
        foreach ($this->arrayDiagnostic as $item) {
            if ($item['id'] == $value['id']) {
                $cond = false;
            }
        }
        if ($cond) {
            $this->arrayDiagnostic[] = $value;
            $this->convertDiagnostic();
            $this->auxDiagnostic = null;
            $this->inputDiagnostic = null;
        }
    }

    public function deleteDiagnostic($id)
    {
        array_splice($this->arrayDiagnostic, $id, 1, null);
        $this->convertDiagnostic();
    }

    public function searchDiagnostic()
    {
        $this->render();
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
            $attributes['name'] = $this->name_template;
            $attributes['study_plan'] = implode(", ", $this->study_plan);
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
        $data['study_plan'] = implode(", ", $this->study_plan);

        unset($data['name']);
        unset($data['id']);
        unset($data['created_at']);
        unset($data['updated_at']);

        ClinicalHistory::create($data);

        return redirect()->route('patients.show', $this->paciente->id);
    }

    public function updatingInputDiagnostic()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.clinicalhistories.create', [
            'templates' => TemplateClinicalHistory::all(['id', 'name']),
            'auxDiagnostic' => Diagnostic::select(['id', 'code', 'diagnostic'])
                ->where('diagnostic', 'LIKE', $this->inputDiagnostic . '%')
                ->simplePaginate(5),
            'study_plans' => StudyPlan::all()
        ]);
    }
}
