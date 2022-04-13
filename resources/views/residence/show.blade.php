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
                                        <li class="breadcrumb-item"><a href="{{ route('residence.index') }}">Résidence</a>
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
                                    <h5 class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Generer le Certificat de Résidence
                                    </h5>
                                </div>
                            </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Prénom</td>
                                            <td>{{ $values->{'first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille</td>
                                            <td>{{ $values->{'last_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance</td>
                                            <td>{{ $values->{'dob'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance</td>
                                            <td>{{ $values->{'place_of_birth'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Profession</td>
                                            <td>{{ $values->{'profession'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sexe</td>
                                            <td>{{ $values->{'sex_info'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse</td>
                                            <td>{{ $values->{'address'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de delivrance</td>
                                            <td>{{ $values->{'demande'} }}</td>
                                        </tr>
                                        
                                    </table>
                                    <div class="mb-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
