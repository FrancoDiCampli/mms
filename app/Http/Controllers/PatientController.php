<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatient;
use App\Http\Requests\UpdatePatient;
use App\Models\Patient;
use App\Models\SocialWork;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        Patient::create($data);
        return redirect()->route('patients.index');
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
        return view('admin.patients.show', ['patient' => $patient]);
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

    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
