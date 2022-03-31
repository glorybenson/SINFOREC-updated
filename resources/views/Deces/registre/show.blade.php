@extends('layouts.app')

@section('content')

    <div class="row">
    <!--<p class="hidden">@json ($registre) </p>-->
        <div class="col-md-10 mx-auto">
            <div class="mt-3">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="page-title">Dashboard</h5>
                                    <ul class="breadcrumb ml-2">
                                        <li class="breadcrumb-item"><a href="{{ route('marriage.registre') }}">Décès</a>
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
                                            <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Bulletin de Décès
                                            </li>
                                            <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Acte de Décès
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <style>
                                    .arrow {
                                        border: solid black;
                                        border-width: 0 3px 3px 0;  
                                        display: inline-block; 
                                        padding: 3px;
                                    }
                                    .down {  
                                        transform: rotate(45deg); 
                                        -webkit-transform: rotate(45deg);
                                    }
                                    </style>

                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="false" aria-controls="collapseOne">
                                                1. Zone Gérographique &nbsp;
                                                <span><i class="arrow down"></i></span>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pays</td>
                                                        <td>{{ $models['geographical_zone-pays'] }}</td>
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
                                                        <td>Arrondissement</td>
                                                        <td>{{ $models['geographical_zone-arrondissements'] }}</td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td>Commune</td>
                                                        <td>{{ $models['geographical_zone-communes'] }}  </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Centre</td>
                                                        <td>{{ $models['geographical_zone-centre'] }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                2. Acte de Décès</h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Date du Décès</td>
                                                        <td>{{ $values->{'date_du_deces'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Numéro de déclaration</td>
                                                        <td>{{ $values->{'declaration_number'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de déclaration</td>
                                                        <td>{{ $values->{'date_of_death'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Heure du Décès</td>
                                                        <td>{{ $values->{'death_time'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu du Décès</td>
                                                        <td>{{ $values->{'place_of_death'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Formation Sanitaire</td>
                                                        <td>{{ $values->{'formation_sanitaire'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                3. Renseignement sur le Défunt / la Défunte </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Prénom de la personne Décèdée</td>
                                                        <td>{{ $values->{'deceased-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille de la personne Décèdée</td>
                                                        <td>{{ $values->{'deceased-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance de la personne Décèdée</td>
                                                        <td>{{ $values->{'deceased-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu de Naissance de la personne Décèdée</td>
                                                        <td>{{ $values->{'deceased-birth_place'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession de la personne Décèdée</td>
                                                        <td>{{ $values->{'deceased-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sexe de la personne Décèdée</td>
                                                        <td>{{ $values->{'deceased_sex_info'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse de la personne Décèdée</td>
                                                        <td>{{ $values->{'deceased-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                4. Renseignement sur le Père du Défunt / de la Défunte
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Prénom du Père du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_father-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_father-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_father-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession du Père du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_father-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse du Père du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_father-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                5. Renseignement sur la Mère du Défunt / de la Défunte
                                            </h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Prénom de la Mère du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_mother-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_mother-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_mother-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession de la Mère du Défunt / de la Défunte</td>
                                                        <td>{{ $values->{'deceased_mother-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse de la Mère du Défunt / de la Défunte</td>
                                                        <td>#</td>
                                                    </tr>                                                   
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingSix">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseSix"
                                                aria-expanded="false"
                                                aria-controls="collapseSix">
                                                6. Renseignement sur le Déclarant
                                            </h5>
                                        </div>
                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Prénom du déclarant</td>
                                                        <td>{{ $values->{'declarant-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom du déclarant</td>
                                                        <td>{{ $values->{'declarant_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adresse du déclarant</td>
                                                        <td>{{ $values->{'declarant_address'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession du déclarant</td>
                                                        <td>{{ $values->{'declarant-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>C.I.N</td>
                                                        <td>{{ $values->{'declarant_info-cin'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Parente</td>
                                                        <td>{{ $values->{'parente'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingSeven">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseSeven"
                                                aria-expanded="false"
                                                aria-controls="collapseSeven">
                                                7. Jugement
                                            </h5>
                                        </div>
                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                             data-parent="#accordionExample">
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
                                                        <td>Numéro du jugement</td>
                                                        <td>{{ $values->{'judgement-number'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu d'emission</td>
                                                        <td>{{ $models['judgement-region'] }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
