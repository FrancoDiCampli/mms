<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index()
    {
        $queries = Query::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.queries.index', ['queries' => $queries]);
    }

    public function create($id)
    {
        $patient = Patient::find($id);
        return view('admin.queries.create', ['patient' => $patient]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'consulta' => 'required|min:5',
            ],
            [
                'consulta.required' => 'El campo consulta es requerido.',
            ],
        );

        Query::create([
            'query' => $request->consulta,
            'patient_id' => $request->patient_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('patients.show', $request->patient_id);
    }
}
