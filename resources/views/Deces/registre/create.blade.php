@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <h5 class="page-title">Dashboard</h5>
                        <ul class="breadcrumb ml-2">
                            <li class="breadcrumb-item active"><a href="{{ route('deces.registre') }}"
                                                                  class="text-primary">Régistre de Décès</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row"
             data-tool="{{ isset( $old) ? $old : '{}' }}"
             data-conn="{{ $link }}">
            <div class="col-md-4">
                <div class="card p-3 wizard-form">
                    <ul>
                        <li>
                            <div id="formControl">
                                <a>Registre Décès
                                    <i id="open-menu" class="fa fa-chevron-right"></i>
                                </a>
                            </div>
                            @if(isset($is_edit))
                                <ul style="display: block;" id="wizard-ul">
                                    <li>
                                        <p><a class="flow-control{{$filledFields[0] ? ' wizard-filled' : ''}}"
                                              id="wizard-navs-0" href="#">1
                                                Zone
                                                Gérographique</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-1" class="{{$filledFields[1] ? ' wizard-filled' : ''}}"
                                              href="#">2
                                                Renseignement sur l’enfant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-2" class="{{$filledFields[2] ? ' wizard-filled' : ''}}"
                                              href="#">3 Renseignement sur le Père</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-3" class="{{$filledFields[3] ? ' wizard-filled' : ''}}"
                                              href="#">4 Renseignement de la Mère</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-4" class="{{$filledFields[4] ? ' wizard-filled' : ''}}"
                                              href="#">5 Renseignement sur le Déclarant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-5" class="{{$filledFields[5] ? ' wizard-filled' : ''}}"
                                              href="#">6 Jugement</a></p>
                                    </li>
                                </ul>
                            @else
                                <ul style="display: block;" id="wizard-ul">
                                    <li>
                                        <p><a class="flow-control" id="wizard-navs-0" href="#">1 Zone Gérographique</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-1" href="#">2 Renseignement sur l’enfant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-2" href="#">3 Renseignement sur le Père</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-3" href="#">4 Renseignement de la Mère</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-4" href="#">5 Renseignement sur le Déclarant</a></p>
                                    </li>
                                    <li>
                                        <p><a id="wizard-navs-5" href="#">6 Jugement</a></p>
                                    </li>
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card pb-4">
                    <form id="form" method="POST" class="demo-form" action="{{ $post_url }}">
                        @csrf
                        <div class="form-section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">1 Zone Gérographique</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-4">
                                                <label for="geographical_zone-pays">Pays</label>
                                                <select id="geographical_zone-pays" data-parsley-errors-container="#invalid-feedback" data-live-search="true" data-name="pays" name="geographical_zone-pays" class="selectpicker w-100 serializable modifiable pb-1" required>
                                                    <option value="" selected>--</option>
                                                    @if(isset($pays))
                                                        @foreach($pays as $pay)
                                                            @if(((object)$pay)->id > 0)
                                                                <option value="{{((object)$pay)->id}}">{{((object)$pay)->description}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback" role="alert"></span>
                                                @error('pay')
                                                <span class="invalid-feedback" id="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="geographical_zone-regions">Régions</label>
                                                <select id="geographical_zone-regions" data-parsley-errors-container="#invalid-feedback2" data-live-search="true" data-name="regions" name="geographical_zone-regions" class="selectpicker w-100 serializable modifiable" tabindex="2" required >
                                                    <option value="" selected>--</option>
                                                    @if(isset($regions))
                                                        @foreach($regions as $region)
                                                            @if(((object)$region)->id > 0)
                                                                <option value="{{((object)$region)->id}}">{{((object)$region)->description}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback2" role="alert"></span>
                                                @error('region')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="geographical_zone-departments">Départements</label>
                                                <select id="geographical_zone-departments" data-parsley-errors-container="#invalid-feedback3" data-live-search="true" data-name="departments" name="geographical_zone-departments" class="selectpicker w-100 serializable modifiable" tabindex="2" required >
                                                    <option value="" selected>--</option>
                                                    @if(isset($departments))
                                                        @foreach($departments as $department)
                                                            @if(((object)$department)->id > 0)
                                                                <option value="{{((object)$department)->id}}">{{((object)$department)->description}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback3" role="alert"></span>
                                                @error('department')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="geographical_zone-arrondissements">Arrondissements</label>
                                                <select id="geographical_zone-arrondissements" data-parsley-errors-container="#invalid-feedback4" data-live-search="true" data-name="arrondissements" name="geographical_zone-arrondissements" class="selectpicker w-100 serializable modifiable" tabindex="2" required >
                                                    <option value="" selected>--</option>
                                                    @if(isset($arrondissements))
                                                        @foreach($arrondissements as $arrondissement)
                                                            @if(((object)$arrondissement)->id > 0)
                                                                <option value="{{((object)$arrondissement)->id }}">{{((object)$arrondissement)->description }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback4" role="alert"></span>
                                                @error('arrondissement')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="geographical_zone-communes">Communes</label>
                                                <select id="geographical_zone-communes" data-parsley-errors-container="#invalid-feedback5" data-live-search="true" data-name="communes" name="geographical_zone-communes" class="selectpicker w-100 serializable modifiable" tabindex="2" required >
                                                    <option value="" selected>--</option>
                                                    @if(isset($communes))
                                                        @foreach($communes as $commune)
                                                            @if(((object)$commune)->id > 0)
                                                                <option value="{{((object)$commune)->id}}" >{{((object)$commune)->description}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback5" role="alert"></span>
                                                @error('commune')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                            <div class="mb-4">
                                                <label for="geographical_zone-centre">Centres</label>
                                                <select id="geographical_zone-centre" data-parsley-errors-container="#invalid-feedback6" data-live-search="true" data-name="centre" name="geographical_zone-centre" class="selectpicker w-100 serializable" tabindex="2" required>
                                                    <option value="" selected>--</option>
                                                    @if(isset($centre))
                                                        @foreach($centre as $item)
                                                            @if(((object)$item)->id > 0)
                                                                <option value="{{((object)$item)->id}}">{{((object)$item)->description}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback6" role="alert"></span>
                                                @error('centre')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">2 Acte de Décès </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-4">
                                                <label for="">Date du Décès</label>
                                                <input id="" placeholder="Select date" type="date" name="" class="form-control serializable" data-parsley-errors-container="#invalid-feedback7" required >
                                                <span class="feedback-new" id="invalid-feedback7" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Numéro de déclaration</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="1" data-parsley-errors-container="#invalid-feedback8" required >
                                                <span class="feedback-new" id="invalid-feedback8" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Date de déclaration</label>
                                                <input id="" placeholder="Select date" type="date" name="" class="form-control serializable" data-parsley-errors-container="#invalid-feedback7" required >
                                                <span class="feedback-new" id="invalid-feedback7" role="alert"></span>
                                            </div>
                                                                                   
                                            <div class="mb-4">
                                                <label for="">Heure du Décès</label>
                                                <input id="" placeholder="Select date" type="time" name="" class="form-control serializable" tabindex="5" data-parsley-errors-container="#invalid-feedback12" required >
                                                <span class="feedback-new" id="invalid-feedback12" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="">Lieu du Décès</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="6" data-parsley-errors-container="#invalid-feedback10" required >
                                                <span class="feedback-new" id="invalid-feedback10" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
            
                                            <div class="mb-4">
                                                <label for="">Formation sanitaire</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="7" data-parsley-errors-container="#invalid-feedback15">
                                                <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">3 Renseignement sur le Défunt / la Défunte</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="">Prénom de la personne Décèdée</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="1" data-parsley-errors-container="#invalid-feedback16" required >
                                                <span class="feedback-new" id="invalid-feedback16" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="">Nom de famille de la personne Décèdée</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="2" data-parsley-errors-container="#invalid-feedback17" required >
                                                <span class="feedback-new" id="invalid-feedback17" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="">
                                                Date de Naissance de la personne Décèdée</label>
                                                <input id="" placeholder="Select date" type="date" name="" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback18" required >
                                                <span class="feedback-new" id="invalid-feedback18" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="">Lieu de Naissance de la personne Décèdée</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="4" data-parsley-errors-container="#invalid-feedback19" required >
                                                <span class="feedback-new" id="invalid-feedback19" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="">Profession de la personne Décèdée</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="5" data-parsley-errors-container="#invalid-feedback20" required >
                                                <span class="feedback-new" id="invalid-feedback20" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="">Sexe de la personne Décèdée</label>
                                                <select id="" data-live-search="true" name="" class="selectpicker w-100 serializable"   tabindex="6" data-parsley-errors-container="#invalid-feedback40"  required >
                                                    <option value="" selected>---</option>
                                                    <option value="">Masculin</option>
                                                    <option value="">Féminin</option>
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback40" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="">Addresse de la personne Décèdée</label>
                                                <input id="" type="text" class="form-control serializable" name="" tabindex="7" data-parsley-errors-container="#invalid-feedback21" required >
                                                <span class="feedback-new" id="invalid-feedback21" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">4 Renseignement de la Mère</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="mother_info-first_name">Prénom de la Mère</label>
                                                <input id="mother_info-first_name" type="text" class="form-control serializable" name="mother_info-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback22" required >
                                                <span class="feedback-new" id="invalid-feedback22" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="mother_info-family_name">Nom de famille de la Mère</label>
                                                <input id="mother_info-family_name" type="text" class="form-control serializable" name="mother_info-family_name" tabindex="2" data-parsley-errors-container="#invalid-feedback23" required >
                                                <span class="feedback-new" id="invalid-feedback23" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="mother_info-dob">Date de Naissance de la Mère</label>
                                                <input id="mother_info-dob" placeholder="Select date" type="date" name="mother_info-dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback24" required >
                                                <span class="feedback-new" id="invalid-feedback24" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="mother_info-birth_place">Lieu de Naissance de la Mère</label>
                                                <input id="mother_info-birth_place" type="text" class="form-control serializable" name="mother_info-birth_place" tabindex="4" data-parsley-errors-container="#invalid-feedback25" required >
                                                <span class="feedback-new" id="invalid-feedback25" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="mother_info-occupation">Profession de la Mère</label>
                                                <input id="mother_info-occupation" type="text" class="form-control serializable" name="mother_info-occupation" tabindex="5" data-parsley-errors-container="#invalid-feedback26" required >
                                                <span class="feedback-new" id="invalid-feedback26" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="mother_info-address">Addresse de la Mère</label>
                                                <input id="mother_info-address" type="text" class="form-control serializable" name="mother_info-address" tabindex="6" data-parsley-errors-container="#invalid-feedback27" required >
                                                <span class="feedback-new" id="invalid-feedback27" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">5 Renseignement sur le Déclarant</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-3">
                                                <label for="declarant_info-first_name">Prénom du déclarant</label>
                                                <input id="declarant_info-first_name" type="text" class="form-control serializable" name="declarant_info-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback29" required >
                                                <span class="feedback-new" id="invalid-feedback29" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="declarant_info-last_name">Nom du déclarant</label>
                                                <input id="declarant_info-last_name" type="text" class="form-control serializable" name="declarant_info-last_name" tabindex="2" data-parsley-errors-container="#invalid-feedback30" required >
                                                <span class="feedback-new" id="invalid-feedback30" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="declarant_info-address">Adresse du déclarant </label>
                                                <input id="declarant_info-address" type="text" class="form-control serializable" name="declarant_info-address" tabindex="3" data-parsley-errors-container="#invalid-feedback31" required >
                                                <span class="feedback-new" id="invalid-feedback31" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="declarant_info-profession" class="required">Profession du déclarant </label>
                                                <input id="declarant_info-profession" type="text" class="form-control serializable" name="declarant_info-profession" tabindex="5" data-parsley-errors-container="#invalid-feedback32" required >
                                                <span class="feedback-new" id="invalid-feedback32" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="declarant_info-cin" class="required">C.I.N</label>
                                                <input id="declarant_info-cin" type="number" class="form-control serializable" name="declarant_info-cin" tabindex="5" data-parsley-errors-container="#invalid-feedback32" required >
                                                <span class="feedback-new" id="invalid-feedback32" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-section current">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">6 Jugement</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-3">
                                                <label for="judgement-judgement">Jugement</label>
                                                <select id="judgement-judgement" data-live-search="true" name="judgement-judgement" class="selectpicker w-100 serializable"   tabindex="1" data-parsley-errors-container="#invalid-feedback40"  required >
                                                    <option value="" selected>---</option>
                                                    <option value="Oui">Oui</option>
                                                    <option value="Non">Non</option>
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback40" role="alert"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judgement-date">Date du jugement</label>
                                                <input id="judgement-date" placeholder="Select date" name="judgement-date" type="date" class="form-control serializable removable"   tabindex="2" data-parsley-errors-container="#invalid-feedback36"  required >
                                                <span class="feedback-new" id="invalid-feedback36" role="alert"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judgement-number">Numéro du jugement</label>
                                                <input id="judgement-number" type="text" class="form-control serializable removable" name="judgement-number"   tabindex="3" data-parsley-errors-container="#invalid-feedback38"  required >
                                                <span class="feedback-new" id="invalid-feedback38" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judgment-region">Régions</label>
                                                @if (isset($regions))
                                                    <select id="judgment-region" data-live-search="true" name="judgment-region" class="selectpicker w-100 serializable removable" tabindex="4" data-parsley-errors-container="#invalid-feedback46" required >
                                                        <option value="" selected>--</option>
                                                        @foreach ($regions as $item)
                                                            @if(((object)$item)->id > 0)
                                                                <option value="{{ ((object)$item)->id }}">
                                                                    {{ ((object)$item)->description }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="feedback-new" id="invalid-feedback46" role="alert"></span>
                                                    @if ($errors->has('regions'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('regions') }}</strong>
                                            </span>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judgement-annotations">Mentions Marginales</label>
                                                <input id="judgement-annotations" type="text" class="form-control serializable removable" name="judgement-annotations" required  tabindex="5" data-parsley-errors-container="#invalid-feedback39">
                                                <span class="feedback-new" id="invalid-feedback39" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-navigation float-right mr-4" id="new">
                            <input type="hidden" name="saveAndExit" value="1">
                            <input type="hidden" name="docId" value="0">
                            <button type="button" class="previous btn btn-primary p-2 pr-3 pl-3 mr-3"> Précédente</button>
                            <button id="draft" type="button" class="draft btn btn-primary p-2 pr-3
                            pl-3">Sauvegarder</button>
                            <button type="button" class="draft next btn btn-primary ml-2 p-2 pr-3 pl-3">Sauver
                                et Continuer</button>
                            <input type="submit" class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right"
                                   value="Sauver et Sortir">
                            <span class="clearfix"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection