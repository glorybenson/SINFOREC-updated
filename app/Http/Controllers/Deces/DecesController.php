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
        $add = Deces::all();
        return view('Deces.registre.index', compact('add'));
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
       
       $deces = new Deces;

       $deces->pays = $request->geographical_zone_pays;
       $deces->Regions = $request->geographical_zone_regions;
       $deces->Departments = $request->geographical_zone_departments;
       $deces->Arrondissments = $request->geographical_zone_arrondissements;
       $deces->Comunes = $request->geographical_zone_communes;
       $deces->Centres = $request->geographical_zone_centre;
       $deces->Date_du_Décès = $request->date_de_deces;
       $deces->Numéro_de_déclaration = $request->Numéro_de_déclaration;
       $deces->Date_de_déclaration = $request->date_de_déclaration;
       $deces->time_of_death = $request->heure_du_décès;
       $deces->place_o_death = $request->lieu_du_décès;
       $deces->health_training = $request->formation_sanitaire;
       $deces->firstname_of_the_deceased = $request->prénom_de_la_personne_Décèdée;
       $deces->lasttname_of_the_deceased = $request->nom_de_famille_de_la_personne_Décèdée;
       $deces->dob_of_deceased = $request->date_de_Naissance_de_la_personne_Décèdée;
       $deces->birthplace_of_deceased = $request->Lieu_de_Naissance_de_la_personne_Décèdée;
       $deces->occupation_of_the_deceased = $request->Profession_de_la_personne_Décèdée;
       $deces->sex_of_deceased = $request->Sexe_de_la_personne_Décèdée;
       $deces->address_of_deceased = $request->Addresse_de_la_personne_Décèdée;
       $deces->firstname_of_the_father_of_deceased = $request->firstname_of_the_father_of_deceased;
       $deces->father_family_name = $request->father_family_name;
       $deces->dob_of_father = $request->dob_of_father;
       $deces->occupation_of_the_father_of_deceased = $request->occupation_of_the_father_of_deceased;
       $deces->address_of_the_father_of_deceased = $request->address_of_the_father_of_deceased;
       $deces->firstname_of_the_mother_of_deceased = $request->firstname_of_the_mother_of_deceased;
       $deces->mother_family_name = $request->mother_family_name;
       $deces->dob_of_mother = $request->dob_of_mother;
       $deces->occupation_of_the_mother_of_deceased = $request->occupation_of_the_mother_of_deceased;
       $deces->address_of_the_mother_of_deceased = $request->address_of_the_mother_of_deceased;
       $deces->declarant_firstname = $request->declarant_firstname;
       $deces->declarant_lasttname = $request->declarant_lasttname;
       $deces->declarant_address = $request->declarant_address;
       $deces->declarant_profession = $request->declarant_profession;
       $deces->declarant_cin = $request->declarant_cin;
       $deces->judgement_judgement = $request->judgement_judgement;
       $deces->judgement_date = $request->judgement_date;
       $deces->judgement_number = $request->judgement_number;
       $deces->judgement_region = $request->judgment_region;
       $deces->mention_marginales = $request->mention_marginales;

       if($deces->save()){
        return redirect()->back()->with('success', 'Deces Created Successfully');
       }else{
         return redirect()->back()->with('error', 'Failed');
       }

     
    }


}
