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
                                        <li class="breadcrumb-item"><a href="{{ route('individuel.index') }}">Celibat</a>
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

                                <div class="text-left">
                                    <h4 class="card-title float-left">Vie Individuel</h4>
                                </div>

                                <div class="text-right">
                                    <h5 class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Generer le Certificat de Vie Individuel
                                    </h5>
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
                                            <td>Date de la demande</td>
                                            <td>{{ $values->{'demande'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Officier d'ETAT CIVIL</td>
                                            <td>{{ $civilServantName }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de déclaration</td>
                                            <td>{{ $values->{'declaration_number'} }}</td>
                                        </tr>
                                        
                                    </table>
                                    <div class="mb-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
