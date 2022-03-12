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

            
             
                            <div id="formControl">
                                <a>Zone Gérographique
                                    <i id="open-menu" class="fa fa-chevron-right"></i>
                                </a>
                                @if(isset($is_edit))
                                <ul style="display: block;" id="wizard-ul">
                                    <li>
                                        <p><a class="flow-control wizard-filled" id="wizard-navs-0" href="#">1 Zone
                                                Gérographique</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-1" class="wizard-filled" href="#">2
                                                Renseignement sur l’enfant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-2" class="wizard-filled" href="#">3 Renseignement sur le Père</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-3" class="wizard-filled" href="#">4 Renseignement de la Mère</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-4" class="wizard-filled" href="#">5 Renseignement sur le Déclarant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-5" class="wizard-filled" href="#">6 Jugement</a></p>
                                    </li>
                                </ul>
                            @else
                                <ul style="display: block;" id="wizard-ul">
                                    <li>
                                        <p><a class="flow-control" id="wizard-navs-0" href="#">1 Zone Gérographique</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-1" href="#">2 Renseignement sur l’enfant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-2" href="#">3 Renseignement sur le Père</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-3" href="#">4 Renseignement de la Mère</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-4" href="#">5 Renseignement sur le Déclarant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-5" href="#">6 Jugement</a></p>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
                 
                  
                <p>
                                 <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Pays</td>
                                            <td>{{ $values->{'geographical_zone-pays'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Arrondissement</td>
                                            <td>{{ $values->{'geographical_zone-arrondissements'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Région</td>
                                            <td>{{ $values->{'geographical_zone-regions'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Département</td>
                                            <td>{{ $values->{'geographical_zone-departments'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Commune</td>
                                            <td>{{ $values->{'geographical_zone-communes'} }} </td>
                                        </tr>
                                    </table>
                                    <div class="mb-5">
                                    </div>
                </p> 
             </div>
            </article>

           

                <ol>
                    <li>
                    <div id="formControl">
                    <a>Zone Gérographique 
                                    <i id="open-menu"></i>
                                </a> 
                            </div>
                            </li>
                    <li>Renseignement sur le Père </li>
                    <li>Renseignement de la Mère </li>
                    <li>Renseignement sur le Déclarant </li>
                    <li>Jugement </li>
                </ol

@endsection                              