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
        return view('admin.patients.index');
    }

    public function create()
    {
        $socialworks = SocialWork::all();
        return view('admin.patients.create', compact('socialworks'));
    }

    public function store(Request $request)
    {
        // return $request;
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
                'social_works' => 'required',
                'ant_medical' => 'nullable|min:5',
                'ant_surgical' => 'nullable|min:5',
                'observations' => 'nullable|min:5',
            ],
            [
                'name.required' => 'El campo nombre es requerido.',
                'surname.required' => 'El campo apellido es requerido.',
                'dni.required' => 'El campo dni es requerido.',
                'social_works.required' => 'El campo obra social es requerido.',
            ]
        );
        Patient::create($data);
        return redirect()->route('patients.index');
    }

    public function show($id)
    {
        $patient = Patient::with(['clinicalhistories', 'queries'])->find($id);
        $obras = collect();

        if ($patient->social_works) {
            foreach ($patient->social_works as $value) {
                $aux = SocialWork::find($value['id']);
                if ($value['affiliate']) {
                    $aux->afiliado = $value['affiliate'];
                }
                $obras->push($aux);
            }
            $patient->obras = $obras;
        }

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
        $obras = collect();

        $indices = collect($patient->social_works)->keyBy('id')->keys();

        $si = $socialworks->whereIn('id', $indices);
        $si->map(function ($value) use ($patient) {
            $value->check = true;
            $value->merge($patient->social_works[1]);
        });
        return dd($si);

        $no = $socialworks->whereNotIn('id', $indices);
        $no->map(function ($value) {
            $value->check = false;
        });

        $obras->push($si);
        $obras->push($no);

        $patient->obras = $obras->flatten()->sortBy('id');

        return view('admin.patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
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
                'social_works' => 'required',
                'ant_medical' => 'nullable|min:5',
                'ant_surgical' => 'nullable|min:5',
                'observations' => 'nullable|min:5',
            ],
            [
                'name.required' => 'El campo nombre es requerido.',
                'surname.required' => 'El campo apellido es requerido.',
                'dni.required' => 'El campo dni es requerido.',
                'social_works.required' => 'El campo obra social es requerido.',
            ]
        );
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
