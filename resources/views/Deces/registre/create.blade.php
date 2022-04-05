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
                                <a>Deces Registre
                                    <i id="open-menu" class="fa fa-chevron-right"></i>
                                </a>
                            </div>

                            <ul style="display: block;" id="wizard-ul">
                                @foreach($fields as $field)
                                    <li>
                                        <p>
                                            <a class="{{$field['is_filled'] ? ' wizard-filled' : ''}}"
                                               id="wizard-navs-{{$loop->index }}" href="#">
                                                {{ $loop->iteration }} {{ $field['title'] }}
                                            </a>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
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
                                                <select id="geographical_zone-centre"
                                                        data-parsley-errors-container="#invalid-feedback6" data-live-search="true" data-name="centre" name="geographical_zone-centre" class="selectpicker w-100 serializable modifiable" tabindex="2" required>
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
                                    <h5 class="card-title">2 Acte de Deces </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-4">
                                                <label for="date_du_deces">Date du Deces</label>
                                                <input id="date_du_deces" placeholder="Select date" type="date" name="date_du_deces" class="form-control serializable" data-parsley-errors-container="#invalid-feedback7" required >
                                                <span class="feedback-new" id="invalid-feedback7" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="declaration_number">Numéro de déclaration</label>
                                                <input id="declaration_number" type="text" class="form-control serializable" name="declaration_number" tabindex="1" data-parsley-errors-container="#invalid-feedback8" required >
                                                <span class="feedback-new" id="invalid-feedback8" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <label for="date_of_death">Date de déclaration</label>
                                                <input id="date_of_death" placeholder="Select date" type="date" name="date_of_death" class="form-control serializable" data-parsley-errors-container="#invalid-feedback7" required >
                                                <span class="feedback-new" id="invalid-feedback9" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="death_time">Heure du Deces</label>
                                                <input id="death_time" placeholder="Select date"
                                                       type="time" name="death_time" class="form-control serializable" tabindex="5" data-parsley-errors-container="#invalid-feedback10" required >
                                                <span class="feedback-new" id="invalid-feedback10" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <label for="place_of_death">Lieu du Deces</label>
                                                <input id="place_of_death" type="text" class="form-control
                                                serializable" name="place_of_death" tabindex="2" data-parsley-errors-container="#invalid-feedback11" required >
                                                <span class="feedback-new" id="invalid-feedback11" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="formation_sanitaire">Formation Sanitaire</label>
                                                <input id="formation_sanitaire" type="text" class="form-control
                                                serializable" name="formation_sanitaire" tabindex="2" data-parsley-errors-container="#invalid-feedback11" required >
                                                <span class="feedback-new" id="invalid-feedback11" role="alert"></span>
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
                                                <label for="deceased-first_name">Prénom de la personne Décèdée</label>
                                                <input id="deceased-first_name" type="text" class="form-control
                                                serializable" name="deceased-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                                <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased-family_name">Nom de famille de la personne Décèdée</label>
                                                <input id="deceased-family_name" type="text" class="form-control
                                                serializable" name="deceased-family_name" tabindex="2" data-parsley-errors-container="#invalid-feedback14" required >
                                                <span class="feedback-new" id="invalid-feedback14" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased-dob">
                                                Date de Naissance de la personne Décèdée</label>
                                                <input id="deceased-dob" placeholder="Select date" type="date"
                                                       name="deceased-dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback15" required >
                                                <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased-birth_place">Lieu de Naissance de la personne Décèdée</label>
                                                <input id="deceased-birth_place" type="text" class="form-control
                                                serializable" name="deceased-birth_place" tabindex="4" data-parsley-errors-container="#invalid-feedback16" required >
                                                <span class="feedback-new" id="invalid-feedback16" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased-profession">Profession de la personne Décèdée</label>
                                                <input id="deceased-profession" type="text" class="form-control
                                                serializable" name="deceased-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback17" required >
                                                <span class="feedback-new" id="invalid-feedback17" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased_sex_info">Sexe de la personne Décèdée</label>
                                                <select id="deceased_sex_info" data-live-search="true" name="deceased_sex_info" class="selectpicker w-100 serializable" tabindex="6" data-parsley-errors-container="#invalid-feedback13" required >
                                                    <option value>--</option>
                                                    <option value="Masculin">Masculin</option>
                                                    <option value="Féminin">Féminin</option>
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased-address">Addresse de la personne Décèdée</label>
                                                <input id="deceased-address" type="text" class="form-control
                                                serializable" name="deceased-address" tabindex="6"
                                                       data-parsley-errors-container="#invalid-feedback18" required >
                                                <span class="feedback-new" id="invalid-feedback18" role="alert"></span>
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
                                    <h5 class="card-title">4 Renseignement sur le Père du Défunt / de la Défunte</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="deceased_father-first_name">Prénom du Père du Défunt / de la Défunte</label>
                                                <input id="deceased_father-first_name" type="text" class="form-control
                                                serializable" name="deceased_father-first_name" tabindex="1"
                                                       data-parsley-errors-container="#invalid-feedback19" required >
                                                <span class="feedback-new" id="invalid-feedback19" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased_father-family_name">Nom de famille du Défunt / de la Défunte</label>
                                                <input id="deceased_father-family_name" type="text" class="form-control
                                                serializable" name="deceased_father-family_name" tabindex="2" data-parsley-errors-container="#invalid-feedback20" required >
                                                <span class="feedback-new" id="invalid-feedback20" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased_father-dob">Date de Naissance du Défunt / de la Défunte</label>
                                                <input id="deceased_father-dob" placeholder="Select date" type="date"
                                                       name="deceased_father-dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback21" required >
                                                <span class="feedback-new" id="invalid-feedback21" role="alert"></span>
                                            </div>
                                           
                                            <div class="row mb-4">
                                                <label for="deceased_father-profession">Profession du Père du Défunt / de la Défunte</label>
                                                <input id="deceased_father-profession" type="text" class="form-control
                                                serializable" name="deceased_father-profession" tabindex="5" data-parsley-errors-container="#invalid-feedback23" required >
                                                <span class="feedback-new" id="invalid-feedback23" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="deceased_father-address ">Addresse du Père du Défunt / de la Défunte</label>
                                                <input id="deceased_father-address" type="text" class="form-control
                                                serializable" name="deceased_father-address" tabindex="6" data-parsley-errors-container="#invalid-feedback24" required >
                                                <span class="feedback-new" id="invalid-feedback24" role="alert"></span>
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
                                    <h5 class="card-title">5 Renseignement sur la Mère du Défunt / de la Défunte</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-3">
                                                <label for="deceased_mother-first_name">Prénom de la Mère du Défunt / de la Défunte</label>
                                                <input id="deceased_mother-first_name" type="text" class="form-control
                                                serializable" name="deceased_mother-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback25" required >
                                                <span class="feedback-new" id="invalid-feedback25" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="deceased_mother-family_name">Nom de famille du Défunt / de la Défunte</label>
                                                <input id="deceased_mother-family_name" type="text" class="form-control
                                                serializable" name="deceased_mother-family_name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback26" required >
                                                <span class="feedback-new" id="invalid-feedback26" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="deceased_mother-dob">Date de Naissance du Défunt / de la Défunte</label>
                                                <input id="deceased_mother-dob" placeholder="Select date" type="date"
                                                       name="deceased_mother-dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback27" required >
                                                <span class="feedback-new" id="invalid-feedback27" role="alert"></span>
                                            </div>
                                            

                                            <div class="row mb-3">
                                                <label for="deceased_mother-profession" class="required">Profession de la Mère du Défunt / de la Défunte </label>
                                                <input id="deceased_mother-profession" type="text" class="form-control
                                                serializable" name="deceased_mother-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback29" required >
                                                <span class="feedback-new" id="invalid-feedback29" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="form-field row mb-3">
                                                <label for="deceased_mother_address">Addresse de la Mère du Défunt / de la Défunte</label>
                                                <select data-live-search="true" data-name="deceased_mother_address"
                                                        data-for="deceased_father-address" class="selectpicker w-100
                                                serializable modifiable address-special-select" tabindex="2" required >

                                                    <option value="" selected>--</option>
                                                    <option value="father_address">Meme que le Pere</option>
                                                    <option value="differente">Differente</option>
                                                </select>
                                                <input id="deceased_mother_address" type="text" class="form-control
                                                serializable" name="deceased_mother-address" tabindex="3" data-parsley-errors-container="#invalid-feedback30" required >
                                                <span class="feedback-new" id="invalid-feedback30" role="alert"></span>
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
                                    <h5 class="card-title">6 Renseignement sur le Déclarant</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="declarant-first_name">Prénom du déclarant</label>
                                                <input id="declarant-first_name" type="text" class="form-control
                                                serializable" name="declarant-first_name" tabindex="1"
                                                       data-parsley-errors-container="#invalid-feedback31" required >
                                                <span class="feedback-new" id="invalid-feedback31" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="declarant_name ">Nom du déclarant</label>
                                                <input id="declarant_name" type="text" class="form-control
                                                serializable" name="declarant_name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback32" required >
                                                <span class="feedback-new" id="invalid-feedback32" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            
                                            <div class="row mb-4">
                                                <label for="declarant_address">Adresse du déclarant</label>
                                                <input id="declarant_address" type="text" class="form-control
                                                serializable" name="declarant_address" tabindex="4"
                                                       data-parsley-errors-container="#invalid-feedback34" required >
                                                <span class="feedback-new" id="invalid-feedback34" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="declarant-profession">Profession du déclarant</label>
                                                <input id="declarant-profession" type="text" class="form-control
                                                serializable" name="declarant-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback35" required >
                                                <span class="feedback-new" id="invalid-feedback35" role="alert"></span>
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

                                             <div class="row mb-4">
                                                <label for="parente">Parente</label>
                                                <input id="parente" type="text" class="form-control
                                                serializable" name="parente" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback35" required >
                                                <span class="feedback-new" id="invalid-feedback35" role="alert"></span>
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
                                    <h5 class="card-title">7 Jugement</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-3">
                                                <label for="judgement-judgement">Jugement</label>
                                                <select id="judgement-judgement" data-live-search="true"
                                                        name="judgement-judgement" class="selectpicker w-100
                                                        serializable"   tabindex="1" data-parsley-errors-container="#invalid-feedback52"  required >
                                                    <option value="" selected>---</option>
                                                    <option value="Oui">Oui</option>
                                                    <option value="Non">Non</option>
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback52" role="alert"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judgement-date">Date du jugement</label>
                                                <input id="judgement-date" placeholder="Select date"
                                                       name="judgement-date" type="date" class="form-control
                                                       serializable removable"   tabindex="2" data-parsley-errors-container="#invalid-feedback53"  required >
                                                <span class="feedback-new" id="invalid-feedback53" role="alert"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judgement-number">Numéro du jugement</label>
                                                <input id="judgement-number" type="text" class="form-control
                                                serializable removable" name="judgement-number"   tabindex="3"
                                                       data-parsley-errors-container="#invalid-feedback54"  required >
                                                <span class="feedback-new" id="invalid-feedback54" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="judgment-region">Lieu d'emission</label>
                                                @if (isset($regions))
                                                    <select id="judgment-region" data-live-search="true"
                                                            name="judgment-region" class="selectpicker w-100
                                                            serializable removable" tabindex="4" data-parsley-errors-container="#invalid-feedback54" required >
                                                        <option value="" selected>--</option>
                                                        @foreach ($regions as $item)
                                                            @if(((object)$item)->id > 0)
                                                                <option value="{{ ((object)$item)->id }}">
                                                                    {{ ((object)$item)->description }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <span class="feedback-new" id="invalid-feedback54"
                                                          role="alert"></span>
                                                    @if ($errors->has('regions'))
                                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('regions') }}</strong>
                                            </span>
                                                    @endif
                                                @endif
                                            </div>
                                            <!--<div class="row mb-3">
                                                <label for="judgement-annotations">Mentions Marginales</label>
                                                <input id="judgement-annotations" type="text" class="form-control serializable removable" name="judgement-annotations" required  tabindex="5" data-parsley-errors-container="#invalid-feedback39">
                                                <span class="feedback-new" id="invalid-feedback39" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>-->
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
