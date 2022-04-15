@extends('layouts.app')

@section('content')

    <div class="row"
    data-tool="{{ isset( $old) ? $old : '{}' }}"
    data-conn="{{ $link }}">
        
    
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
                                    
                                    <div id="demo">
                                    </div>
                                    <input type="hidden" id="btn" value=""/>

                                    <div class="mb-5">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
