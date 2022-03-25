<?php

namespace App\Http\Controllers\Deces;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay;
use App\Models\Region;
use App\Models\Centre;
use App\Models\Communes;
use App\Models\Department;
use App\Models\Arrondissement;

class DecesController extends Controller
{
    //Index method here
    public function index(){
        return view('Deces.registre.inddex');
    }

    public function createView(){

        $pays = Pay::all();
        $regions = Region::all();
        $departments = Department::all();
        $arrondissements = Arrondissement::all();
        $communes = Communes::all();
        $centre = Centre::all();
        return view('Deces.registre.create', compact('pays', 'regions', 'departments', 'arrondissements', 'communes', 'centre'));
    }

    public function storeDeces(Request $request){
        $winner = $request->all();
        dd($winner);
    }


}
