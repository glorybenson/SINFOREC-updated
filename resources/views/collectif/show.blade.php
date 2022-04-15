@extends('layouts.app')

@section('content')

    <div class="row">
        
    
        <div class="col-md-10 mx-auto">
            <div class= "mt-3">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="page-title">Dashboard</h5>
                                    <ul class="breadcrumb ml-2">
                                        <li class="breadcrumb-item"><a href="{{ route('collectif.index') }}">Vie Collectif</a>
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
                                        <h5 class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Generer le Certificat de Vie Collectif
                                        </h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div>
                                        <h4 class="card-title float-left"></h4>
                                    </div>

                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Prénom du demandeur</td>
                                            <td>{{ $values->{'first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de déclaration</td>
                                            <td>{{ $values->{'last_name'} }}</td>

                                </tr>
                                <tr>
                                    <td>Prénom du Père</td>
                                    <td>{{ $values->{'pere_first-name'} }}</td>
                                </tr>
                                <tr>
                                    <td>Nom de famille du Père</td>
                                    <td>{{ $values->{'pere_last-name'} }}</td>
                                </tr>
                                <tr>
                                    <td>Prénom de la Mère</td>
                                    <td>{{ $values->{'mere_first-name'} }}</td>
                                </tr>
                                <tr>
                                    <td>Nom de famille de la Mère</td>
                                    <td>{{ $values->{'mere_last-name'} }}</td>
                                </tr>
                                
                            </table>
                                    
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                       Other family Members</h5>

                                       <table class="table table-bordered table-striped">
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <tr>
                                            
                                            <td>Glory</td>
                                            <td>
                                                Benson
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                    <input type="hidden" id="btn" value=""/>

                                    <h4 class="mb-5">
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
