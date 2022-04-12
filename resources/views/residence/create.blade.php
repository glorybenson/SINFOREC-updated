@extends('layouts.app')
@section('content')
<div class="row">
    data-tool="{{ isset( $old) ? $old : '{}' }}"
     data-conn="{{ $link }}">
    <div class="col-md-10 mx-auto">
        <div class="mt-3">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <h5 class="page-title">Dashboard</h5>
                                <ul class="breadcrumb ml-2">
                                    <li class="breadcrumb-item"><a href="{{ route('residence.index') }}">Résidence</a>
                                    </li>
                                    <li class="breadcrumb-item active">Certificat de Résidence</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left">Certificat de Résidence</h4>
                                <div class="text-right">
                                    <a href="{{ route('residence.index') }}" class="btn btn-dark px-3">
                                        Retour aux Résidence</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ $post_url }}">
                                    @csrf

                                        <div class="row mb-3">
                                            <label for="first_name" class="col-md-2 col-form-label text-md-end">Prénom</label>

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
                                            <label for="last_name" class="col-md-2 col-form-label text-md-end">Nom de famillee</label>
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
                                        <label for="dob" class="col-md-2 col-form-label text-md-end">
                                            Date de Naissance</label>
                                            <div class="col-md-10">
                                        <input id="dob" placeholder="Select date" type="date"
                                               name="dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback15" required >
                                        <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="place_of_birth" class="col-md-2 col-form-label text-md-end">Lieu de Naissance</label>
                                    <div class="col-md-10">
                                    <input id="place_of_birth" type="text" class="form-control serializable" name="place_of_birth" tabindex="3" data-parsley-errors-container="#invalid-feedback10" required >
                                    <span class="feedback-new" id="invalid-feedback10" role="alert"></span>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="profession" class="col-md-2 col-form-label text-md-end">Profession</label>
                                <div class="col-md-10">
                                <input id="profession" type="text"
                                       class="form-control serializable"
                                       name="profession" tabindex="5" data-parsley-errors-container="#invalid-feedback62" required >
                                <span class="feedback-new" id="invalid-feedback62" role="alert"></span>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('description') }}</strong>
                            </span>
                                @endif
                            </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sex_info" class="col-md-2 col-form-label text-md-end">Sexe</label>
                                <div class="col-md-10">
                                <select id="sex_info" data-live-search="true" name="sex_info" class="selectpicker w-100 serializable" tabindex="6" data-parsley-errors-container="#invalid-feedback13" required >
                                    <option value>--</option>
                                    <option value="Masculin">Masculin</option>
                                    <option value="Féminin">Féminin</option>
                                </select>
                                <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                            </div>
                            </div>

                                    <div class="row mb-3">
                                        <label for="address" class="col-md-2 col-form-label text-md-end">Addresse</label>
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
                                        <label for="demande" class="col-md-2 col-form-label text-md-end">
                                            Date de delivrance</label>
                                            <div class="col-md-10">
                                        <input id="demande" placeholder="Select date" type="date"
                                               name="demande" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback15" required >
                                        <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                    </div>
                                </div>

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary px-4" onclick="return confirm('Are you sure you want to submit this form?')">
                                            Créer un compte pour Résidence
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