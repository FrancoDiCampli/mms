<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\SocialWork;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('surname', 'ASC')->paginate(5);
        return view('admin.patients.index', compact('patients'));
    }

    public function create()
    {
        $socialworks = SocialWork::all();
        return view('admin.patients.create', compact('socialworks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|min:3',
                'surname' => 'required|min:3',
                'dni' => 'required|min:7|max:8',
                'affiliate' => 'nullable|min:5',
                'email' => 'nullable|email',
                'phone' => 'nullable|min:6',
                'fnac' => 'nullable|min:8',
                'age' => 'nullable|min:1',
                'address' => 'nullable|min:6',
                'city' => 'nullable|min:3',
                'province' => 'nullable|min:3',
                'social_work_id' => 'nullable',
                'observations' => 'nullable|min:5',
            ],
            [
                'name.required' => 'El campo nombre es requerido.',
                'surname.required' => 'El campo apellido es requerido.',
                'dni.required' => 'El campo dni es requerido.',
            ]
        );
        Patient::create($data);
        return redirect()->route('patients.index');
    }

    public function show($id)
    {
        $patient = Patient::find($id);

        if ($patient->fnac) {
            $patient->fnac = Carbon::parse($patient->fnac);
            if (!$patient->age) {
                $patient->age = $patient->fnac->age;
            }
        }

        return view('admin.patients.show', compact('patient'));
    }

    public function edit($id)
    {
        $patient = Patient::find($id);
        $socialworks = SocialWork::all();
        return view('admin.patients.edit', compact('patient', 'socialworks'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $data = $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'dni' => 'required|min:7|max:8',
            'affiliate' => 'nullable|min:5',
            'email' => 'nullable|email',
            'phone' => 'nullable|min:6',
            'fnac' => 'nullable|min:8',
            'age' => 'nullable|min:1',
            'address' => 'nullable|min:6',
            'city' => 'nullable|min:3',
            'province' => 'nullable|min:3',
            'social_work_id' => 'nullable',
            'observations' => 'nullable|min:5',
        ]);
        $patient->update($data);
        return redirect()->route('patients.index');
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect()->route('patients.index');
    }
}
