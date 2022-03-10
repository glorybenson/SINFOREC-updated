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
                                        <h6>Date de Déclaration</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Numéro de déclaration</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Prénom de l'enfant </h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                    <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Nom de famille de l'enfant</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Date de Naissance de l'enfant</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Heure de Naissance</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Lieu de Naissance</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Sexe</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <h6>Formation sanitaire</h6>
                                    </div>
                                    <div class="col-9">
                                        <h6>#</h6>
                                    </div>
                                </div>
                                    </div>                      
                                </div>      
                                </div>              
@endsection                              
