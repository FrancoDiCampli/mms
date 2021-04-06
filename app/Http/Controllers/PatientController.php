<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Query;
use App\Models\Patient;
use App\Models\SocialWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePatient;
use App\Http\Requests\UpdatePatient;

class PatientController extends Controller
{
    public function index()
    {
        return view('admin.patients.index');
    }

    public function create()
    {
        $socialworks = SocialWork::all();
        return view('admin.patients.create', compact('socialworks'));
    }

    public function store(StorePatient $request)
    {
        $data = $request->validated();
        try {
            return DB::transaction(function () use ($data, $request) {
                $patient = Patient::create($data);
                if ($request->get('consulta')) {
                    Query::create([
                        'query' => $request->consulta,
                        'patient_id' => $patient->id,
                        'user_id' => auth()->user()->id,
                    ]);
                }
                return redirect()->route('patients.index');
            });
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        $patient = Patient::with(['clinicalhistories', 'queries', 'social_work'])->find($id);

        if ($patient->fnac) {
            $patient->fnac = Carbon::parse($patient->fnac);
            if (!$patient->age) {
                $patient->age = $patient->fnac->age;
            }
        }

        $mezcla = collect();
        $patient->clinicalhistories->map(function ($item) use ($mezcla) {
            $mezcla->push($item);
        });
        $patient->queries->map(function ($item) use ($mezcla) {
            $mezcla->push($item);
        });
        $ordenar = $mezcla->sortByDesc('created_at');

        return view('admin.patients.show', ['patient' => $patient, 'mezcla' => $ordenar->values()]);
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        $socialworks = SocialWork::all();
        return view('admin.patients.edit', ['patient' => $patient, 'socialworks' => $socialworks]);
    }

    public function update(UpdatePatient $request, $id)
    {
        $patient = Patient::find($id);
        $data = $request->validated();
        $patient->update($data);
        return redirect()->route('patients.show', $patient->id);
    }

    public function updateAntecedentes(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->update([
            'ant_medical' => $request->ant_medical,
            'ant_surgical' => $request->ant_surgical,
        ]);
        $patient->touch();
        return redirect()->route('patients.show', $patient->id);
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
