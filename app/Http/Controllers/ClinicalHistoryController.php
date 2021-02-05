<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class ClinicalHistoryController extends Controller
{
    public function create($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.clinicalhistories.create', ['patient' => $patient]);
    }

    public function store(Request $request)
    {
        return $request;
    }
}
