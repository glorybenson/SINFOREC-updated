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
                                    <li class="breadcrumb-item"><a href="{{ route('celibat.index') }}">Célibat</a>
                                    </li>
                                    <li class="breadcrumb-item active">Certificat De Célibat</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left">Certificat De Célibat</h4>
                                <div class="text-right">
                                    <a href="{{ route('celibat.index') }}" class="btn btn-dark px-3">
                                        Retour aux Célibat</a>
                                </div>
                            </div>
                            <div class="card-body">
                                        <form method="POST" action="{{ route('create.user.post') }}">
                                            @csrf

                                        <div class="row mb-3">
                                            <label for="first_name">Prénom</label>

                                            <div class="col-md-10">
                                            <input id="first_name" type="text" class="form-control
                                            serializable" name="first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                        <div class="row mb-3">
                                            <label for="last_name">Nom de famillee</label>
                                            <div class="col-md-10">
                                            <input id="last_name" type="text" class="form-control
                                            serializable" name="last_name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        </div>


                                    
                                    <div class="row mb-3">
                                        <label for="dob">
                                            Date de Naissance</label>
                                            <div class="col-md-10">
                                        <input id="dob" placeholder="Select date" type="date"
                                               name="dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback15" required >
                                        <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                    </div>
                                </div>

                                    <div class="row mb-3">
                                        <label for="address">Addresse</label>
                                        <div class="col-md-10">
                                        <input id="address" type="text" class="form-control
                                        serializable" name="address" tabindex="6" data-parsley-errors-container="#invalid-feedback24" required >
                                        <span class="feedback-new" id="invalid-feedback24" role="alert"></span>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                    <div class="row mb-3">
                                        <label for="cin" class="required">C.I.N</label>
                                        <div class="col-md-10">
                                        <input id="cin" type="number" class="form-control serializable" name="cin" tabindex="5" data-parsley-errors-container="#invalid-feedback32" required >
                                        <span class="feedback-new" id="invalid-feedback32" role="alert"></span>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                    <div class="row mb-3">
                                        <label for="demande">
                                            Date de la demande</label>
                                            <div class="col-md-10">
                                        <input id="demande" placeholder="Select date" type="date"
                                               name="demande" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback15" required >
                                        <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                    </div>
                                </div>

                                    <div class="row mb-3">
                                        <label for="declaration_number">Numéro de déclaration</label>
                                        <div class="col-md-10">
                                        <input id="declaration_number" type="text" class="form-control serializable" name="declaration_number" tabindex="1" data-parsley-errors-container="#invalid-feedback8" required >
                                        <span class="feedback-new" id="invalid-feedback8" role="alert"></span>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary px-4" onclick="return confirm('Are you sure you want to submit this form?')">
                                            Créer un compte pour Célibat
                                        </button>
                                    </div>
                                </form>
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
