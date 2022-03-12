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

                          <!--  <div class="card-body">
                                <div class="row pr-3 pl-3">
                                <div class="col-3">
                                        <p>Date de Déclaration</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-date_of_decl'} }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Numéro de déclaration</p>
                                    </div>
                                    <div class="col-9">
                                       {{ $values->{'child_info-decl_number'} }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Prénom de l'enfant </p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-first_name'} }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Nom de famille de l'enfant</p>
                                    </div>
                                    <div class="col-9">
                                        {{ $values->{'child_info-last_name'} }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Date de Naissance de l'enfant</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-dob'} }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Heure de Naissance</p>
                                    </div>
                                    <div class="col-9">
                                        <p>
                                        {{ $values->{'child_info-birth_time'} }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Lieu de Naissance</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-place_of_birth'} }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Sexe</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-gender'} }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Formation sanitaire</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-health_training'} }}</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div> -->

                
                <h5 class="collapsible">1. Zone Gérographique</button>
                <div class="content">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
                

                            <div id="formControl">
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
                   <!-- <li> </li>
                    <li> </li>
                    <li>Renseignement sur le Déclarant </li>
                    <li>Jugement </li>
</ol-->
<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

@endsection
