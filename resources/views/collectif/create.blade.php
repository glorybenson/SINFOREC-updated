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
                                    <li class="breadcrumb-item"><a href="{{ route('collectif.index') }}">Vie Collectif </a>
                                    </li>
                                    <li class="breadcrumb-item active">Certificat de Vie Collectif </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title float-left">Certificat de Vie Collectif</h4>
                                <div class="text-right">
                                    <a href="{{ route('celibat.index') }}" class="btn btn-dark px-3">
                                        Retour aux Collectif</a>
                                </div>
                            </div>
                            <div class="card-body">
                                        <form method="POST" action="{{ $post_url }}">
                                            @csrf

                                        <div style="float:left; width:24%; margin-right:1%;" class="row mb-3">
                                            <label for="first_name">Prénom du demandeur</label>

                                            
                                            <input id="first_name" type="text" class="form-control
                                            serializable" name="first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    

                                    

                                        <div style="float:left; width:24%; margin-right:1%;" class="row mb-3">
                                            <label for="last_name">Nom de famille du demandeur</label>
                                            
                                            <input id="last_name" type="text" class="form-control
                                            serializable" name="last_name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        

                                        <div style="clear:both;">&nbsp;

                                        <div class="row mb-3">
                                            <label for="pere_first-name" class="col-md-2 col-form-label text-md-end">Prénom du Père</label>

                                            <div class="col-md-10">
                                            <input id="pere_first-name" type="text" class="form-control
                                            serializable" name="pere_first-name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                        <div class="row mb-3">
                                            <label for="pere_last-name" class="col-md-2 col-form-label text-md-end">Nom de famille du Père</label>
                                            <div class="col-md-10">
                                            <input id="pere_last-name" type="text" class="form-control
                                            serializable" name="pere_last-name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="mere_first-name" class="col-md-2 col-form-label text-md-end">Prénom de la Mère</label>

                                            <div class="col-md-10">
                                            <input id="mere_first-name" type="text" class="form-control
                                            serializable" name="mere_first-name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                        <div class="row mb-3">
                                            <label for="mere_last-name" class="col-md-2 col-form-label text-md-end">Nom de famille de la Mère</label>
                                            <div class="col-md-10">
                                            <input id="mere_last-name" type="text" class="form-control
                                            serializable" name="mere_last-name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                            <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            @if ($errors->has('description'))
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                        </div>
                                        </div>







                                    
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary px-4" onclick="return confirm('Are you sure you want to submit this form?')">
                                            Créer un compte pour vie Collectif
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
