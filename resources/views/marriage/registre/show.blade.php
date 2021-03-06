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
                                        <li class="breadcrumb-item"><a href="{{ route('marriage.registre') }}">Registre
                                                de
                                                Mariage</a>
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
                                            <h5 class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Certificat de
                                                Mariage
                                            </h5>
                                            <h5 class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Acte de Mariage
                                            </h5>
                                        </div>
                                        
                                        <div class="text-left">
                                            <h5 class="btn btn-outline-primary ml-2 p-2 pr-3 pl-3">{{ $values->{'groom-first_name'} }} {{ $values->{'groom-family_name'} }}</h5>
                                            <h5 class="btn btn-outline-primary ml-2 p-2 pr-3 pl-3">{{ $values->{'bride-first_name'} }} {{ $values->{'bride-family_name'} }}</h5> 
                                        </div>
                                    </div>
                                

                               <!-- <div class="card-body">
                                    <div>
                                        <h4 class="card-title float-left">Renseignement sur le mariage</h4>
                                    </div>
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Pr??nom du P??re de l'Epoux</td>
                                            <td>{{ $values->{'groom_father-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille du P??re de l'Epoux</td>
                                            <td>{{ $values->{'groom_father-family_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pr??nom de l'Epouse</td>
                                            <td>{{ $values->{'bride-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de l'Epouse</td>
                                            <td>{{ $values->{'bride-family_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date du Mariage</td>
                                            <td>{{ $values->{'certificate-date_of_marriage'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Num??ro de d??claration</td>
                                            <td>{{ $values->{'certificate-decl_number'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Officier d'ETAT CIVIL</td>
                                            <td>{{ $values->{'certificate-civil_servant'} }}</td>
                                        </tr>
                                    </table>
                                    <div class="mb-5">
                                    </div>
                                </div>
                            </div>


                            <div>-->
                                <style>
                                    .fa-angle-down{
                                        transform: rotate(0deg);
                                        transition: transform 1s linear;
                                    }
                                    .fa-angle-down.open{
                                        transform: rotate(180deg);
                                        transition: transform 1s linear;
                                    }
                                    
                                    </style>

                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="false" aria-controls="collapseOne">
                                                1. Zone G??rographique &nbsp;
                                                <span><i id="icon" class="fa fa-angle-down"></i></span>
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
                                                        <td>R??gion</td>
                                                        <td>{{ $models['geographical_zone-regions'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>D??partement</td>
                                                        <td>{{ $models['geographical_zone-departments'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Arrondissement</td>
                                                        <td>{{ $models['geographical_zone-arrondissements'] }}</td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td>Commune</td>
                                                        <td>{{ $models['geographical_zone-communes'] }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Centre</td>
                                                        <td>{{ $models['geographical_zone-centre'] }} </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                2. Acte de Mariage</h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Date du Mariage</td>
                                                        <td>{{ $values->{'certificate-date_of_marriage'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Num??ro de d??claration</td>
                                                        <td>{{ $values->{'certificate-decl_number'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de d??claration</td>
                                                        <td>{{ $values->{'certificate-date_of_decl'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Heure du Mariage</td>
                                                        <td>{{ $values->{'certificate-wedding_time'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu du Mariage</td>
                                                        <td>{{ $values->{'certificate-wedding_venue'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Officier d'ETAT CIVIL</td>
                                                        <td>{{ $civilServantName }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingThree">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree">
                                                3. Renseignement sur l'Epoux </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom de l'Epoux</td>
                                                        <td>{{ $values->{'groom-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille de l'Epoux</td>
                                                        <td>{{ $values->{'groom-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance de l'Epoux</td>
                                                        <td>{{ $values->{'groom-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu de Naissance de l'Epoux</td>
                                                        <td>{{ $values->{'groom-birth_place'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession de l'Epoux</td>
                                                        <td>{{ $values->{'groom-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse de l'Epoux</td>
                                                        <td>{{ $values->{'groom-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFour">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                4. Renseignement sur le P??re de l'Epoux
                                            </h5>
                                        </div>
                                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom du P??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_father-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille du P??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_father-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance du P??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_father-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu de Naissance du P??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_father-birth_place'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession du P??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_father-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse du P??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_father-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFive">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                5. Renseignement sur la M??re de l'Epoux
                                            </h5>
                                        </div>
                                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom de la M??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_mother-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille de la M??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_mother-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance de la M??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_mother-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu de Naissance de la M??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_mother-birth_place'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession de la M??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_mother-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse de la M??re de l'Epoux</td>
                                                        <td>{{ $values->{'groom_mother-address'} }}</td>
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
                                                6. Renseignement sur l'Epouse
                                            </h5>
                                        </div>
                                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom de l'Epouse</td>
                                                        <td>{{ $values->{'bride-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille de l'Epouse</td>
                                                        <td>{{ $values->{'bride-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance de l'Epouse</td>
                                                        <td>{{ $values->{'bride-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu de Naissance de l'Epouse</td>
                                                        <td>{{ $values->{'bride-birth_place'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession de l'Epouse</td>
                                                        <td>{{ $values->{'bride-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse de l'Epouse</td>
                                                        <td>{{ $values->{'bride-address'} }}</td>
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
                                                7. Renseignement sur le P??re de l'Epouse
                                            </h5>
                                        </div>
                                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom du P??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_father-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille du P??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_father-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance du P??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_father-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu de Naissance du P??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_father-birth_place'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession du P??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_father-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse du P??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_father-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header" id="headingEight">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseEight"
                                                aria-expanded="false"
                                                aria-controls="collapseEight">
                                                8. Renseignement sur la M??re de l'Epouse
                                            </h5>
                                        </div>
                                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom de la M??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_mother-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom de famille de la M??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_mother-family_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date de Naissance de la M??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_mother-dob'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu de Naissance de la M??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_mother-birth_place'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession de la M??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_mother-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse de la M??re de l'Epouse</td>
                                                        <td>{{ $values->{'bride_mother-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header" id="headingNine">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseNine"
                                                aria-expanded="false"
                                                aria-controls="collapseNine">
                                                9. Renseignements additionnels
                                            </h5>
                                        </div>
                                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Regime Matrimonial</td>
                                                        <td>{{ $values->{'additional-regime'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Type</td>
                                                        <td>{{ $values->{'additional-type'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Dotes</td>
                                                        <td>{{ $values->{'additional-feats'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTen">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTen"
                                                aria-expanded="false"
                                                aria-controls="collapseTen">
                                                10. Jugement
                                            </h5>
                                        </div>
                                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen"
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
                                                        <td>Num??ro du jugement</td>
                                                        <td>{{ $values->{'judgement-number'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lieu d'emission</td>
                                                        <td>{{ $models['judgment-region'] }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingEleven">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseEleven"
                                                aria-expanded="false"
                                                aria-controls="collapseEleven">
                                                11. Premier t??moin de l'Epoux
                                            </h5>
                                        </div>
                                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    
                                                    <tr>
                                                        <td>Pr??nom Premier t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_one-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom Premier t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_one-name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession Premier t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_one-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>C.I.N</td>
                                                        <td>{{ $values->{'groom_witness_one-cin'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse Premier t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_one-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingTwelve">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwelve"
                                                aria-expanded="false"
                                                aria-controls="collapseTwelve">
                                                12. Deuxieme t??moin de l'Epoux
                                            </h5>
                                        </div>
                                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom Deuxieme t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_two-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom Deuxieme t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_two-name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession Deuxieme t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_two-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>C.I.N</td>
                                                        <td>{{ $values->{'groom_witness_two-cin'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse Deuxieme t??moin de l'Epoux</td>
                                                        <td>{{ $values->{'groom_witness_two-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card">
                                        <div class="card-header" id="headingThirteen">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseThirteen"
                                                aria-expanded="false"
                                                aria-controls="collapseThirteen">
                                                13. Premier t??moin de l'Epouse
                                            </h5>
                                        </div>
                                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom Premier t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_one-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom Premier t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_one-name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession Premier t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_one-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>C.I.N</td>
                                                        <td>{{ $values->{'bride_witness_one-cin'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse Premier t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_one-address'} }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header" id="headingFourteen">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFourteen"
                                                aria-expanded="false"
                                                aria-controls="collapseFourteen">
                                                14. Deuxieme t??moin de l'Epouse
                                            </h5>
                                        </div>
                                        <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen"
                                             data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped">
                                                    <tr>
                                                        <td>Pr??nom Deuxieme t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_two-first_name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nom Deuxieme t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_two-name'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profession Deuxieme t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_two-profession'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>C.I.N</td>
                                                        <td>{{ $values->{'bride_witness_two-cin'} }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Addresse Deuxieme t??moin de l'Epouse</td>
                                                        <td>{{ $values->{'bride_witness_two-address'} }}</td>
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
