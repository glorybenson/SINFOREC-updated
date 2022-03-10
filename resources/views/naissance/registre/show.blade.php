@extends('layouts.app')

@section('content')
<style>
    .badge {
        font-size: 16px;
    }
</style>
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
                                    <li class="btn btn-green px-3">Extrait de Naissance</li>
                                    <li class="btn btn-green px-3">Bulletin de Naissance</li>
                                    <li class="btn btn-green px-3">Acte de Naissance</li>
                                </ul>
                                    <h4 class="card-title float-left">User Details</h4>
                                </div>
                                </div>


@endsection
