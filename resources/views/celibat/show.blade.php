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
                                        <li class="breadcrumb-item"><a href="{{ route('celibat.index') }}">Celibat</a>
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

                                    <div>
                                        <h4 class="card-title ml-0 p-2 pr-3 pl-0 float-left">Certificat De Célibat
                                        </h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div>
                                        <h4 class="card-title float-left"></h4>
                                    </div>
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
                                            <td>Addresse</td>
                                            <td>{{ $values->{'address'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>{{ $values->{'cin'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de la demande</td>
                                            <td>{{ $values->{'demande'} }}</td>
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
