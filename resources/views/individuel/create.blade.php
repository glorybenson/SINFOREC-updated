@extends('layouts.app')
@section('content')
<div class="row"
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
                                    <li class="breadcrumb-item"><a href="{{ route('celibat.index') }}">Vie Individuel</a>
                                    </li>
                                    <li class="breadcrumb-item active">Vie Individuel</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left">Vie Individuel</h4>
                                <div class="text-right">
                                    <a href="{{ route('celibat.index') }}" class="btn btn-dark px-3">
                                        Retour aux Célibat</a>
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
                                        <label for="demande" class="col-md-2 col-form-label text-md-end">
                                            Date de la demande</label>
                                            <div class="col-md-10">
                                        <input id="demande" placeholder="Select date" type="date"
                                               name="demande" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback15" required >
                                        <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="certificate-civil_servant" class="col-md-2 col-form-label text-md-end">Officier d'ETAT CIVIL</label>
                                    <div class="col-md-10">
                                    <select id="certificate-civil_servant"
                                            data-parsley-errors-container="#invalid-feedback12"
                                            data-live-search="true" data-name="civil_servant"
                                            name="certificate-civil_servant" class="selectpicker w-100 serializable modifiable" tabindex="2" required>
                                    <option value="" selected>--</option>
                                    @if(isset($users))
                                        @foreach($users as $item)
                                            <option value="{{((object)$item)->id}}">
                                                {{((object)$item)->first_name}}
                                                {{((object)$item)->last_name}}
                                            </option>
                                        @endforeach
                                    @endif
                                                </select>
                                    <span class="feedback-new" id="invalid-feedback12" role="alert"></span>
                                </div>
                            </div>

                                    <div class="row mb-3">
                                        <label for="declaration_number" class="col-md-2 col-form-label text-md-end">Numéro de déclaration</label>
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
                                            Créer un compte pour Vie Individuel
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
