<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResidenceController extends Controller
{
    //
    public function index()
    {
        $add = DB::table('residence')
            ->join('users', 'residence.created_by', '=', 'users.id')
            ->select('residence.*')
            ->get();
        return view('residence.index', [
            'add' => $add
        ]);
    }
    public function create()
    {
        return view('residence.create', );
    }
}
