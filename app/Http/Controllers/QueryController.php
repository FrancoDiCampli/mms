<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index()
    {
        $queries = Query::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.queries.index', compact('queries'));
    }

    public function create()
    {
        return view('admin.queries.create');
    }
}
