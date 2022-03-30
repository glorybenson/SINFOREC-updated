<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deces extends Model
{
    use HasFactory;
    protected $table = 'deces';

    protected $fillable = [
        'Pays',
        'Regions',
        'Departments',
        'Arrondissments',
        'Comunes',
        'Centres',
        'Date_du_Décès',
        'Numéro_de_déclaration',
        'Date_de_déclaration',
        'time_of_death',
        'place_o_death',
        'health_training',
        'firstname_of_the_deceased',
        'lasttname_of_the_deceased',
        'dob_of_deceased',
        'birthplace_of_deceased',
        'occupation_of_the_deceased',
        'sex_of_deceased',
        'address_of_deceased',
        'firstname_of_the_father_of_deceased',
        'father_family_name',
        'dob_of_father',
        'occupation_of_the_father_of_deceased',
        'address_of_the_father_of_deceased',
        'firstname_of_the_mother_of_deceased',
        'mother_family_name',
        'dob_of_mother',
        'occupation_of_the_mother_of_deceased',
        'address_of_the_mother_of_deceased',
        'declarant_firstname',
        'declarant_lasttname',
        'declarant_address',
        'declarant_profession',
        'declarant_cin',
        'judgement_judgement',
        'judgement_date',
        'judgement_number',
        'judgement_region',
        'mention_marginales',
        'saveAndExit'
        //'Parente',
        //'created_by',
        //'created_at',
    ];
}

     