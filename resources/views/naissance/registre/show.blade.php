@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="mt-3">
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
                            

                                    <h4 class="card-title float-left">Renseignement sur l’enfant</h4>
                            </div>
                            </div>
                            <div class="card-body">
                                <div class="row pr-3 pl-3">
                                <div class="col-3">
                                        <p>Date de Déclaration</p>
                                    </div>
                                    <div class="col-9">
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Numéro de déclaration</p>
                                    </div>
                                    <div class="col-9">
                                        <p>#</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Prénom de l'enfant </p>
                                    </div>
                                    <div class="col-9">
                                        <p>#</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Nom de famille de l'enfant</p>
                                    </div>
                                    <div class="col-9">
                                        <p>
                                        {{ $add  ?? ''
                                            ->get('') }}<P>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Date de Naissance de l'enfant</p>
                                    </div>
                                    <div class="col-9">
                                        <p>#</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Heure de Naissance</p>
                                    </div>
                                    <div class="col-9">
                                        <p>#</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Lieu de Naissance</p>
                                    </div>
                                    <div class="col-9">
                                        <p>#</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Sexe</p>
                                    </div>
                                    <div class="col-9">
                                        <p>#</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Formation sanitaire</p>
                                    </div>
                                    <div class="col-9">
                                        <p>#</p>
                                    </div>
                                </div>                   
                        </div>                      
                    </div>      
                </div>            

@endsection                              