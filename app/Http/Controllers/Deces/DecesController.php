<?php

namespace App\Http\Controllers\Deces;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DecesController extends Controller
{
    //Index method here
    public function createView(){
        return view('Deces.registre.create');
    }
}
