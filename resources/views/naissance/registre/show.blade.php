@extends('layouts.app')

@section('content')

<div class="row">
<!--<p class="hidden">@json ($registre) </p>-->
    <div class="col-md-10 mx-auto">
        <div class= "mt-3">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <h5 class="page-title">Dashboard</h5>
                                <ul class="breadcrumb ml-2">
                                    <li class="breadcrumb-item"><a href="{{ route('naissance.registre') }}">Naissance</a>
                                    </li>
                                    <li class="breadcrumb-item active">View</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                            <div class="text-right">
                                <ul>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Extrait de Naissance</li>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Bulletin de Naissance</li>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Acte de Naissance</li>
                                </ul>
                            </div>
                            </div>

                            <div class="card-body">
                                <div>
                                <h4 class="card-title float-left">Renseignement sur l’enfant</h4>
                                </div>
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Date de Déclaration</td>
                                            <td>{{ $values->{'child_info-date_of_decl'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de déclaration</td>
                                            <td>{{ $values->{'child_info-decl_number'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom de l'enfant</td>
                                            <td>{{ $values->{'child_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de l'enfant</td>
                                            <td>{{ $values->{'child_info-last_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de l'enfant</td>
                                            <td>{{ $values->{'child_info-dob'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Heure de Naissance</td>
                                            <td>{{ $values->{'child_info-birth_time'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance</td>
                                            <td>{{ $values->{'child_info-place_of_birth'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sexe</td>
                                            <td>{{ $values->{'child_info-gender'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Formation sanitaire</td>
                                            <td>{{ $values->{'child_info-health_training'} }}</td>
                                        </tr>
                                    </table>
                                    <div class="mb-5">
                                    </div>
                                </div>
                            </div>


                            <div>
                            <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
        <h5 data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        1. Zone Gérographique</h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Pays</td>
                                            <td>{{ $models['geographical_zone-pays'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Arrondissement</td>
                                            <td>{{ $models['geographical_zone-arrondissements'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Région</td>
                                            <td>{{ $models['geographical_zone-regions'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Département</td>
                                            <td>{{ $models['geographical_zone-departments'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Commune</td>
                                            <td>{{ $models['geographical_zone-communes'] }} </td>
                                        </tr>
                                    </table>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        2. Renseignement sur le Père</h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du Père</td>
                                            <td>{{ $values->{'father_info-country'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille du Père</td>
                                            <td>{{ $values->{'father_info-region'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance du Père</td>
                                            <td>{{ $values->{'father_info-department'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance du Père</td>
                                            <td>{{ $values->{'father_info-borough'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du Père</td>
                                            <td>{{ $values->{'father_info-communes'} }} </td>
                                        </tr>
                                        <tr>
                                            <td>Addresse du Père</td>
                                            <td>{{ $values->{'father_info-center'} }} </td>
                                        </tr>
                                    </table>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5
      class="mb-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        3. Renseignement de la Mère
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de la Mère </td>
                                            <td>{{ $values->{'mother_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de la Mère</td>
                                            <td>{{ $values->{'mother_info-family_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de la Mère</td>
                                            <td>{{ $values->{'mother_info-dob'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de la Mère</td>
                                            <td>{{ $values->{'mother_info-birth_place'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de la Mère</td>
                                            <td>{{ $values->{'mother_info-occupation'} }} </td>
                                        </tr>
                                        <tr>
                                            <td>Addresse de la Mère</td>
                                            <td>{{ $values->{'mother_info-address'} }} </td>
                                        </tr>
                                    </table>
      </div>
    </div>
  </div>
</div>
<div class="card">
    <div class="card-header" id="headingFour">
      <h5
      class="mb-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        4.  Renseignement sur le Déclarant
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du déclarant</td>
                                            <td>{{ $values->{'declarant_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom du déclarant</td>
                                            <td>{{ $values->{'declarant_info-last_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Adresse du déclarant</td>
                                            <td>{{ $values->{'declarant_info-address'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du déclarant</td>
                                            <td>{{ $values->{'declarant_info-profession'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>{{ $values->{'declarant_info-cin'} }} </td>
                                        </tr>
                                    </table>
      </div>
    </div>
  </div>
</div>
    <div class="card">
    <div class="card-header" id="headingFive">
      <h5
      class="mb-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
        5. Jugement
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
      <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Jugement</td>
                                            <td>{{ $values->{'judgement-judgement'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date du jugement</td>
                                            <td>{{ $values->{'judgement-date'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Régions</td>
                                            <td>{{ $values->{'judgment-region'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mentions Marginales</td>
                                            <td>{{ $values->{'judgement-annotations'} }}</td>
                                        </tr>
                                    </table>
      </div>
    </div>
    </div>
    </div>
    </div>
                           <!-- <div id="formControl">
                                <h5>1. Zone Gérographique <i id="open-menu" class="fa fa-chevron-right"></i>
                                </h5>
                                @if(isset($is_edit))
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Pays</td>
                                            <td>{{ $models['geographical_zone-pays'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Arrondissement</td>
                                            <td>{{ $models['geographical_zone-arrondissements'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Région</td>
                                            <td>{{ $models['geographical_zone-regions'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Département</td>
                                            <td>{{ $models['geographical_zone-departments'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Commune</td>
                                            <td>{{ $models['geographical_zone-communes'] }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @else
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Pays</td>
                                            <td>{{ $models['geographical_zone-pays'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Arrondissement</td>
                                            <td>{{ $models['geographical_zone-arrondissements'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Région</td>
                                            <td>{{ $models['geographical_zone-regions'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Département</td>
                                            <td>{{ $models['geographical_zone-departments'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Commune</td>
                                            <td>{{ $models['geographical_zone-communes'] }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>


                           <div id="formControl">
                                <h5>2. Renseignement sur le Père
                                    <i id="open-menu" class="fa fa-chevron-right"></i>
                                </h5>
                                @if(isset($is_edit))
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du Père</td>
                                            <td>{{ $values->{'father_info-country'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille du Père</td>
                                            <td>{{ $values->{'father_info-region'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance du Père</td>
                                            <td>{{ $values->{'father_info-department'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance du Père</td>
                                            <td>{{ $values->{'father_info-borough'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du Père</td>
                                            <td>{{ $values->{'father_info-center'} }} </td>
                                        </tr>
                                        <tr>
                                            <td>Addresse du Père</td>
                                            <td>{{ $values->{'father_info-communes'} }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @else
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du Père</td>
                                            <td>{{ $values->{'father_info-country'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille du Père</td>
                                            <td>{{ $values->{'father_info-region'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance du Père</td>
                                            <td>{{ $values->{'father_info-department'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance du Père</td>
                                            <td>{{ $values->{'father_info-borough'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du Père</td>
                                            <td>{{ $values->{'father_info-center'} }} </td>
                                        </tr>
                                        <tr>
                                            <td>Addresse du Père</td>
                                            <td>{{ $values->{'father_info-communes'} }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div id="formControl">
                                <h5>3. Renseignement de la Mère
                                    <i id="open-menu" class="fa fa-chevron-right"></i></h5>
                                @if(isset($is_edit))
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de la Mère </td>
                                            <td>{{ $values->{'mother_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de la Mère</td>
                                            <td>{{ $values->{'mother_info-family_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de la Mère</td>
                                            <td>{{ $values->{'mother_info-dob'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de la Mère</td>
                                            <td>{{ $values->{'mother_info-birth_place'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de la Mère</td>
                                            <td>{{ $values->{'mother_info-occupation'} }} </td>
                                        </tr>
                                        <tr>
                                            <td>Addresse de la Mère</td>
                                            <td>{{ $values->{'mother_info-address'} }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @else
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de la Mère </td>
                                            <td>{{ $values->{'mother_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de la Mère</td>
                                            <td>{{ $values->{'mother_info-family_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de la Mère</td>
                                            <td>{{ $values->{'mother_info-dob'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de la Mère</td>
                                            <td>{{ $values->{'mother_info-birth_place'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de la Mère</td>
                                            <td>{{ $values->{'mother_info-occupation'} }} </td>
                                        </tr>
                                        <tr>
                                            <td>Addresse de la Mère</td>
                                            <td>{{ $values->{'mother_info-address'} }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div id="formControl">
                                <h5>3.  Renseignement sur le Déclarant
                                    <i id="open-menu" class="fa fa-chevron-right"></i>
                                </h5>
                               
                                @if(isset($is_edit))
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du déclarant</td>
                                            <td>{{ $values->{'declarant_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom du déclarant</td>
                                            <td>{{ $values->{'declarant_info-last_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Adresse du déclarant</td>
                                            <td>{{ $values->{'declarant_info-address'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du déclarant</td>
                                            <td>{{ $values->{'declarant_info-profession'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>{{ $values->{'declarant_info-cin'} }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @else
                            
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du déclarant</td>
                                            <td>{{ $values->{'declarant_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom du déclarant</td>
                                            <td>{{ $values->{'declarant_info-last_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Adresse du déclarant</td>
                                            <td>{{ $values->{'declarant_info-address'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du déclarant</td>
                                            <td>{{ $values->{'declarant_info-profession'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>{{ $values->{'declarant_info-cin'} }} </td>
                                        </tr>
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            
             <div id="formControl">
                <h5>5. Jugement
                        <i id="open-menu" class="fa fa-chevron-right"></i></h5>                              
                                @if(isset($is_edit))
                                <ul style="display: none;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Jugement</td>
                                            <td>{{ $values->{'judgement-judgement'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date du jugement</td>
                                            <td>{{ $values->{'judgement-date'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Régions</td>
                                            <td>{{ $values->{'judgment-region'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mentions Marginales</td>
                                            <td>{{ $values->{'judgement-annotations'} }}</td>
                                        </tr>
                                        
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @else
                                <ul style="display: block;">
                                    <li>
                                    <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Jugement</td>
                                            <td>{{ $values->{'judgement-judgement'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date du jugement</td>
                                            <td>{{ $values->{'judgement-date'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Régions</td>
                                            <td>{{ $values->{'judgment-region'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Mentions Marginales</td>
                                            <td>{{ $values->{'judgement-annotations'} }}</td>
                                        </tr>
                                        
                                    </table>
                                    </div>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
                    <li> </li>
                    <li> </li>
                    <li>Renseignement sur le Déclarant </li>
                    <li>Jugement </li>
</ol-->

@endsection
