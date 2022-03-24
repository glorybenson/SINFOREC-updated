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
                                    <li class="breadcrumb-item"><a href="{{ route('marriage.registre') }}">Registre de
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
                                <ul>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Certificat de Mariage</li>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Acte de Mariage</li>
                                </ul>
                            </div>
                            </div>

                           <div class="card-body">
                                <div>
                                <h4 class="card-title float-left">Renseignement sur le mariage</h4>
                                </div>
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Prénom du Père de l'Epoux</td>
                                            <td>{{ $values->{'groom_father-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille du Père de l'Epoux</td>
                                            <td>{{ $values->{'groom_father-family_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom de l'Epouse</td>
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
                                            <td>Numéro de déclaration</td>
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


                            <div>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            1. Zone Gérographique</h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                    2. Acte de Mariage</h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Date du Mariage</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de déclaration</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de déclaration</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Heure du Mariage</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu du Mariage</td>
                                            <td># </td>
                                        </tr>
                                        <tr>
                                            <td>Officier d'ETAT CIVIL</td>
                                            <td># </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3. Renseignement sur l'Epoux </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de l'Epoux </td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de l'Epoux</td>
                                            <td># </td>
                                        </tr>
                                        <tr>
                                            <td>Addresse  de l'Epoux</td>
                                            <td># </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                4. Renseignement sur le Père de l'Epoux
                            </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du Père de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille du Père de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance du Père de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance du Père de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du Père de l'Epoux</td>
                                            <td># </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. Renseignement sur la Mère de l'Epoux
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                        <div class="card-header" id="headingFive">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. Renseignement sur la Mère de l'Epoux
                            </h5>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse de la Mère de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                        <div class="card-header" id="headingSix">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                6. Renseignement sur l'Epouse
                            </h5>
                        </div>
                        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille  de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                        <div class="card-header" id="headingSeven">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                7. Renseignement sur le Père de l'Epouse
                            </h5>
                        </div>
                        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom du Père de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille du Père de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance du Père de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance du Père de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession du Père de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse du Père de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                        <div class="card-header" id="headingEight">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                8. Renseignement sur la Mère de l'Epouse
                            </h5>
                        </div>
                        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom de la Mère de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de la Mère de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de la Mère de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance de la Mère de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession de la Mère de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse de la Mère de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                        <div class="card-header" id="headingNine">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                9. Renseignements additionnels
                            </h5>
                        </div>
                        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Regime Matrimonial</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Dotes</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                        <div class="card-header" id="headingTen">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                10. Jugement
                            </h5>
                        </div>
                        <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Jugement</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Date du jugement</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro du jugement</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu d'emission</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                        <div class="card-header" id="headingEleven">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                11. Premier témoin de l'Epoux
                            </h5>
                        </div>
                        <div id="collapseEleven" class="collapse" aria-labelledby="headingEleven" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom Premier témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom Premier témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession Premier témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse Premier témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                        <div class="card-header" id="headingTwelve">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                12. Deuxieme témoin de l'Epoux
                            </h5>
                        </div>
                        <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom Deuxieme témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom Deuxieme témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession Deuxieme témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse Deuxieme témoin de l'Epoux</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                        <div class="card-header" id="headingThirteen">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                             13. Premier témoin de l'Epouse
                            </h5>
                        </div>
                        <div id="collapseThirteen" class="collapse" aria-labelledby="headingThirteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom Premier témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom Premier témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession Premier témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse Premier témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                        <div class="card-header" id="headingFourteen">
                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                14. Deuxieme témoin de l'Epouse
                            </h5>
                        </div>
                        <div id="collapseFourteen" class="collapse" aria-labelledby="headingFourteen" data-parent="#accordionExample">
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Prénom Deuxieme témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Nom Deuxieme témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Profession Deuxieme témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>#</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse Deuxieme témoin de l'Epouse</td>
                                            <td>#</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

@endsection
