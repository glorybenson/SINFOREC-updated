@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <h5 class="page-title">Dashboard</h5>
                        <ul class="breadcrumb ml-2">
                            <li class="breadcrumb-item active"><a href="{{ route('marriage.registre') }}"
                                                                  class="text-primary">Registre de Mariage</a></li>
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
                                <a>Mariage Registre
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
                                    <h5 class="card-title">2 Acte de Mariage </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="mb-4">
                                                <label for="certificate-date_of_marriage">Date du Mariage</label>
                                                <input id="certificate-date_of_marriage" placeholder="Select date" type="date" name="certificate-date_of_marriage" class="form-control serializable" data-parsley-errors-container="#invalid-feedback7" required >
                                                <span class="feedback-new" id="invalid-feedback7" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="certificate-decl_number">Numéro de déclaration</label>
                                                <input id="certificate-decl_number" type="text" class="form-control serializable" name="certificate-decl_number" tabindex="1" data-parsley-errors-container="#invalid-feedback8" required >
                                                <span class="feedback-new" id="invalid-feedback8" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <label for="certificate-date_of_decl">Date de déclaration</label>
                                                <input id="certificate-date_of_decl" placeholder="Select date" type="date" name="certificate-date_of_decl" class="form-control serializable" data-parsley-errors-container="#invalid-feedback7" required >
                                                <span class="feedback-new" id="invalid-feedback9" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="certificate-wedding_time">Heure du Mariage</label>
                                                <input id="certificate-wedding_time" placeholder="Select date"
                                                       type="time" name="certificate-wedding_time" class="form-control serializable" tabindex="5" data-parsley-errors-container="#invalid-feedback10" required >
                                                <span class="feedback-new" id="invalid-feedback10" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <label for="certificate-wedding_venue">Lieu du Mariage</label>
                                                <input id="certificate-wedding_venue" type="text" class="form-control
                                                serializable" name="certificate-wedding_venue" tabindex="2" data-parsley-errors-container="#invalid-feedback11" required >
                                                <span class="feedback-new" id="invalid-feedback11" role="alert"></span>
                                            </div>
                                            <div class="mb-4">
                                                <label for="certificate-civil_servant">Officier d'ETAT CIVIL</label>
                                                <select id="certificate-civil_servant"
                                                        data-parsley-errors-container="#invalid-feedback12"
                                                        data-live-search="true" data-name="civil_servant"
                                                        name="certificate-civil_servant" class="selectpicker w-100 serializable modifiable" tabindex="2" required>
                                                <optiuon value="" selected>--</optiuon>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">3 Renseignement sur l'Epoux</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="groom-first_name">Prénom de l'Epoux</label>
                                                <input id="groom-first_name" type="text" class="form-control
                                                serializable" name="groom-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback13" required >
                                                <span class="feedback-new" id="invalid-feedback13" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom-family_name">Nom de famille  de l'Epoux</label>
                                                <input id="groom-family_name" type="text" class="form-control
                                                serializable" name="groom-family_name" tabindex="2" data-parsley-errors-container="#invalid-feedback14" required >
                                                <span class="feedback-new" id="invalid-feedback14" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom-dob">
                                                Date de Naissance de l'Epoux</label>
                                                <input id="groom-dob" placeholder="Select date" type="date"
                                                       name="groom-dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback15" required >
                                                <span class="feedback-new" id="invalid-feedback15" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom-birth_place">Lieu de Naissance  de l'Epoux</label>
                                                <input id="groom-birth_place" type="text" class="form-control
                                                serializable" name="groom-birth_place" tabindex="4" data-parsley-errors-container="#invalid-feedback16" required >
                                                <span class="feedback-new" id="invalid-feedback16" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom-profession">Profession de l'Epoux</label>
                                                <input id="groom-profession" type="text" class="form-control
                                                serializable" name="groom-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback17" required >
                                                <span class="feedback-new" id="invalid-feedback17" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom-address">Addresse  de l'Epoux</label>
                                                <input id="groom-address" type="text" class="form-control
                                                serializable" name="groom-address" tabindex="6"
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
                                    <h5 class="card-title">4 Renseignement sur le Père de l'Epoux</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="groom_father-first_name">Prénom du Père de l'Epoux</label>
                                                <input id="groom_father-first_name" type="text" class="form-control
                                                serializable" name="groom_father-first_name" tabindex="1"
                                                       data-parsley-errors-container="#invalid-feedback19" required >
                                                <span class="feedback-new" id="invalid-feedback19" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_father-family_name">Nom de famille du Père de l'Epoux</label>
                                                <input id="groom_father-family_name" type="text" class="form-control
                                                serializable" name="groom_father-family_name" tabindex="2" data-parsley-errors-container="#invalid-feedback20" required >
                                                <span class="feedback-new" id="invalid-feedback20" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_father-dob">Date de Naissance du Père de l'Epoux</label>
                                                <input id="groom_father-dob" placeholder="Select date" type="date"
                                                       name="groom_father-dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback21" required >
                                                <span class="feedback-new" id="invalid-feedback21" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_father-birth_place">Lieu de Naissance du Père de l'Epoux</label>
                                                <input id="groom_father-birth_place" type="text" class="form-control
                                                serializable" name="groom_father-birth_place" tabindex="4" data-parsley-errors-container="#invalid-feedback22" required >
                                                <span class="feedback-new" id="invalid-feedback22" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_father-profession">Profession du Père de l'Epoux</label>
                                                <input id="groom_father-profession" type="text" class="form-control
                                                serializable" name="groom_father-profession" tabindex="5" data-parsley-errors-container="#invalid-feedback23" required >
                                                <span class="feedback-new" id="invalid-feedback23" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_father-address">Addresse du Père de l'Epoux</label>
                                                <input id="groom_father-address" type="text" class="form-control
                                                serializable" name="groom_father-address" tabindex="6" data-parsley-errors-container="#invalid-feedback24" required >
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
                                    <h5 class="card-title">5 Renseignement sur la Mère de l'Epoux</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-3">
                                                <label for="groom_mother-first_name">Prénom de la Mère de l'Epoux</label>
                                                <input id="groom_mother-first_name" type="text" class="form-control
                                                serializable" name="groom_mother-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback25" required >
                                                <span class="feedback-new" id="invalid-feedback25" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="groom_mother-family_name">Nom de famille de la Mère de l'Epoux</label>
                                                <input id="groom_mother-family_name" type="text" class="form-control
                                                serializable" name="groom_mother-family_name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback26" required >
                                                <span class="feedback-new" id="invalid-feedback26" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="groom_mother-dob">Date de Naissance de la Mère de l'Epoux</label>
                                                <input id="groom_mother-dob" placeholder="Select date" type="date"
                                                       name="groom_mother-dob" class="form-control serializable" tabindex="3" data-parsley-errors-container="#invalid-feedback27" required >
                                                <span class="feedback-new" id="invalid-feedback27" role="alert"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="groom_mother-birth_place">Lieu de Naissance de la Mère de l'Epoux</label>
                                                <input id="groom_mother-birth_place" type="text" class="form-control
                                                serializable" name="groom_mother-birth_place" tabindex="4" data-parsley-errors-container="#invalid-feedback28" required >
                                                <span class="feedback-new" id="invalid-feedback28" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="row mb-3">
                                                <label for="groom_mother-profession" class="required">Profession de la Mère de l'Epoux </label>
                                                <input id="groom_mother-profession" type="text" class="form-control
                                                serializable" name="groom_mother-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback29" required >
                                                <span class="feedback-new" id="invalid-feedback29" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="row mb-3">
                                                <label for="groom_mother-address">Addresse de la Mère de l'Epoux </label>
                                                <input id="groom_mother-address" type="text" class="form-control
                                                serializable" name="groom_mother-address" tabindex="3" data-parsley-errors-container="#invalid-feedback30" required >
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
                                    <h5 class="card-title">6 Renseignement sur l'Epouse</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="bride-first_name">Prénom de l'Epouse</label>
                                                <input id="bride-first_name" type="text" class="form-control
                                                serializable" name="bride-first_name" tabindex="1"
                                                       data-parsley-errors-container="#invalid-feedback31" required >
                                                <span class="feedback-new" id="invalid-feedback31" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride-family_name">Nom de famille  de l'Epouse</label>
                                                <input id="bride-family_name" type="text" class="form-control
                                                serializable" name="bride-family_name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback32" required >
                                                <span class="feedback-new" id="invalid-feedback32" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride-dob">
                                                Date de Naissance de l'Epouse</label>
                                                <input id="bride-dob" placeholder="Select date" type="date"
                                                       name="bride-dob" class="form-control serializable"
                                                       tabindex="3" data-parsley-errors-container="#invalid-feedback33" required >
                                                <span class="feedback-new" id="invalid-feedback33" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride-birth_place">Lieu de Naissance de l'Epouse</label>
                                                <input id="bride-birth_place" type="text" class="form-control
                                                serializable" name="bride-birth_place" tabindex="4"
                                                       data-parsley-errors-container="#invalid-feedback34" required >
                                                <span class="feedback-new" id="invalid-feedback34" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride-profession">Profession de l'Epouse</label>
                                                <input id="bride-profession" type="text" class="form-control
                                                serializable" name="bride-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback35" required >
                                                <span class="feedback-new" id="invalid-feedback35" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride-address">Addresse de l'Epouse</label>
                                                <input id="bride-address" type="text" class="form-control
                                                serializable" name="bride-address" tabindex="6"
                                                       data-parsley-errors-container="#invalid-feedback36" required >
                                                <span class="feedback-new" id="invalid-feedback36" role="alert"></span>
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
                                    <h5 class="card-title">7 Renseignement sur le Père de l'Epouse</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="bride_father-family_name">Prénom du Père de l'Epouse</label>
                                                <input id="bride_father-first_name" type="text" class="form-control
                                                serializable" name="bride_father-first_name" tabindex="1"
                                                       data-parsley-errors-container="#invalid-feedback37" required >
                                                <span class="feedback-new" id="invalid-feedback37" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_father-family_name">Nom de famille du Père de l'Epouse</label>
                                                <input id="bride_father-family_name" type="text" class="form-control
                                                serializable" name="bride_father-family_name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback38" required >
                                                <span class="feedback-new" id="invalid-feedback38" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_father-dob">Date de Naissance du Père de l'Epouse</label>
                                                <input id="bride_father-dob" placeholder="Select date" type="date"
                                                       name="bride_father-dob" class="form-control serializable"
                                                       tabindex="3" data-parsley-errors-container="#invalid-feedback39" required >
                                                <span class="feedback-new" id="invalid-feedback39" role="alert"></span>
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_father-birth_place">Lieu de Naissance du Père de l'Epouse</label>
                                                <input id="bride_father-birth_place" type="text" class="form-control
                                                serializable" name="bride_father-birth_place" tabindex="4"
                                                       data-parsley-errors-container="#invalid-feedback40" required >
                                                <span class="feedback-new" id="invalid-feedback40" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_father-profession">Profession du Père de l'Epouse</label>
                                                <input id="bride_father-profession" type="text" class="form-control
                                                serializable" name="bride_father-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback41" required >
                                                <span class="feedback-new" id="invalid-feedback41" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_father-address">Addresse du Père de l'Epouse</label>
                                                <input id="bride_father-address" type="text" class="form-control
                                                serializable" name="bride_father-address" tabindex="6"
                                                       data-parsley-errors-container="#invalid-feedback42" required >
                                                <span class="feedback-new" id="invalid-feedback42" role="alert"></span>
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
                                    <h5 class="card-title">8 Renseignement sur la Mère de l'Epouse</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-3">
                                                <label for="bride_mother-first_name">Prénom de la Mère de l'Epouse</label>
                                                <input id="bride_mother-first_name" type="text" class="form-control
                                                serializable" name="bride_mother-first_name" tabindex="1"
                                                       data-parsley-errors-container="#invalid-feedback43" required >
                                                <span class="feedback-new" id="invalid-feedback43" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="bride_mother-family_name">Nom de famille de la Mère de l'Epouse</label>
                                                <input id="bride_mother-family_name" type="text" class="form-control
                                                serializable" name="bride_mother-family_name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback44" required >
                                                <span class="feedback-new" id="invalid-feedback44" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="bride_mother-dob">Date de Naissance de la Mère de l'Epouse</label>
                                                <input id="bride_mother-dob" placeholder="Select date" type="date"
                                                       name="bride_mother-dob" class="form-control serializable"
                                                       tabindex="3" data-parsley-errors-container="#invalid-feedback45" required >
                                                <span class="feedback-new" id="invalid-feedback45" role="alert"></span>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="bride_mother-birth_place">Lieu de Naissance de la Mère de l'Epouse</label>
                                                <input id="bride_mother-birth_place" type="text" class="form-control
                                                serializable" name="bride_mother-birth_place" tabindex="4"
                                                       data-parsley-errors-container="#invalid-feedback46" required >
                                                <span class="feedback-new" id="invalid-feedback46" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="row mb-3">
                                                <label for="bride_mother-profession" class="required">Profession de la Mère de l'Epouse </label>
                                                <input id="bride_mother-profession" type="text" class="form-control
                                                serializable" name="bride_mother-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback47" required >
                                                <span class="feedback-new" id="invalid-feedback47" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>

                                            <div class="row mb-3">
                                                <label for="bride_mother-address">Addresse de la Mère de l'Epouse </label>
                                                <input id="bride_mother-address" type="text" class="form-control
                                                serializable" name="bride_mother-address" tabindex="3"
                                                       data-parsley-errors-container="#invalid-feedback48" required >
                                                <span class="feedback-new" id="invalid-feedback48" role="alert"></span>
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
                                    <h5 class="card-title">9 Renseignements additionnels </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-3">
                                            <label for="additional-regime">Regime Matrimonial</label>
                                                <select id="additional-regime" data-live-search="true" name="additional-regime" class="selectpicker
                                                w-100 serializable"   tabindex="1" data-parsley-errors-container="#invalid-feedback49"  required >
                                                    <option value="" selected>---</option>
                                                    <option value="">Poligamie</option>
                                                    <option value="">Monogamie</option>
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback49" role="alert"></span>
                                                </div>
                                                <div class="row mb-3">
                                            <label for="additional-type">Type</label>
                                                <select id="additional-type" data-live-search="true" name="additional-type" class="selectpicker
                                                w-100 serializable"   tabindex="1" data-parsley-errors-container="#invalid-feedback50"  required >
                                                    <option value="" selected>---</option>
                                                    <option value="">Bien Commun</option>
                                                    <option value="">Separation des Biens</option>
                                                </select>
                                                <span class="feedback-new" id="invalid-feedback50" role="alert"></span>
                                                </div>
                                                <div class="row mb-3">
                                                <label for="additional-type">Dotes</label>
                                                <input id="additional-type" type="text" class="form-control
                                                serializable" name="additional-type" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback51" required >
                                                <span class="feedback-new" id="invalid-feedback51" role="alert"></span>
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
                                    <h5 class="card-title">10 Jugement</h5>
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

                        <div class="form-section">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">11 Premier témoin de l'Epoux</h5>
                                </div>


                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="groom_witness_one-first_name">Prénom Premier témoin de l'Epoux</label>
                                                <input id="groom_witness_one-first_name" type="text"
                                                       class="form-control serializable"
                                                       name="groom_witness_one-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback55" required >
                                                <span class="feedback-new" id="invalid-feedback55" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_witness_one-name">Nom Premier témoin de l'Epoux</label>
                                                <input id="groom_witness_one-name" type="text" class="form-control
                                                serializable" name="groom_witness_one-name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback56" required >
                                                <span class="feedback-new" id="invalid-feedback56" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_witness_one-profession">Profession Premier témoin de l'Epoux</label>
                                                <input id="groom_witness_one-profession" type="text"
                                                       class="form-control serializable"
                                                       name="groom_witness_one-profession" tabindex="5" data-parsley-errors-container="#invalid-feedback57" required >
                                                <span class="feedback-new" id="invalid-feedback57" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="groom_witness_one-cin" class="required">C.I.N</label>
                                                <input id="groom_witness_one-cin" type="number" class="form-control
                                                serializable" name="groom_witness_one-cin" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback58" required >
                                                <span class="feedback-new" id="invalid-feedback58" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_witness_one-address">Addresse Premier témoin de l'Epoux</label>
                                                <input id="groom_witness_one-address" type="text" class="form-control
                                                 serializable" name="groom_witness_one-address" tabindex="6"
                                                       data-parsley-errors-container="#invalid-feedback59" required >
                                                <span class="feedback-new" id="invalid-feedback59" role="alert"></span>
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
                                    <h5 class="card-title">12 Deuxieme témoin de l'Epoux</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="groom_witness_two-first_name">Prénom Deuxieme témoin de l'Epoux</label>
                                                <input id="groom_witness_two-first_name" type="text"
                                                       class="form-control serializable"
                                                       name="groom_witness_two-first_name" tabindex="1"
                                                       data-parsley-errors-container="#invalid-feedback60" required >
                                                <span class="feedback-new" id="invalid-feedback60" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_witness_two-name">Nom Deuxieme témoin de l'Epoux</label>
                                                <input id="groom_witness_two-name" type="text" class="form-control
                                                serializable" name="groom_witness_two-name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback61" required >
                                                <span class="feedback-new" id="invalid-feedback61"
                                                      role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_witness_two-profession">Profession Deuxieme témoin de l'Epoux</label>
                                                <input id="groom_witness_two-profession" type="text"
                                                       class="form-control serializable"
                                                       name="groom_witness_two-profession" tabindex="5" data-parsley-errors-container="#invalid-feedback62" required >
                                                <span class="feedback-new" id="invalid-feedback62" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="groom_witness_two-cin" class="required">C.I.N</label>
                                                <input id="groom_witness_two-cin" type="number" class="form-control
                                                serializable" name="groom_witness_two-cin" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback63" required >
                                                <span class="feedback-new" id="invalid-feedback63" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="groom_witness_two-address">Addresse Deuxieme témoin de l'Epoux</label>
                                                <input id="groom_witness_two-address" type="text" class="form-control
                                                 serializable" name="groom_witness_two-address" tabindex="6"
                                                       data-parsley-errors-container="#invalid-feedback64" required >
                                                <span class="feedback-new" id="invalid-feedback64" role="alert"></span>
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
                                    <h5 class="card-title">13 Premier témoin de l'Epouse</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="bride_witness_one-first_name">Prénom Premier témoin de l'Epouse</label>
                                                <input id="bride_witness_one-first_name" type="text"
                                                       class="form-control serializable"
                                                       name="bride_witness_one-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback65" required >
                                                <span class="feedback-new" id="invalid-feedback65" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_witness_one-name">Nom Premier témoin de l'Epouse</label>
                                                <input id="bride_witness_one-name" type="text" class="form-control
                                                serializable" name="bride_witness_one-name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback66" required >
                                                <span class="feedback-new" id="invalid-feedback66" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_witness_one-profession">Profession Premier témoin de l'Epouse</label>
                                                <input id="bride_witness_one-profession" type="text"
                                                       class="form-control serializable"
                                                       name="bride_witness_one-profession" tabindex="5" data-parsley-errors-container="#invalid-feedback67" required >
                                                <span class="feedback-new" id="invalid-feedback67" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="bride_witness_one-cin" class="required">C.I.N</label>
                                                <input id="bride_witness_one-cin" type="number" class="form-control
                                                serializable" name="bride_witness_one-cin" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback68" required >
                                                <span class="feedback-new" id="invalid-feedback68" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_witness_one-address">Addresse Premier témoin de l'Epouse</label>
                                                <input id="bride_witness_one-address" type="text" class="form-control
                                                 serializable" name="bride_witness_one-address" tabindex="6"
                                                       data-parsley-errors-container="#invalid-feedback69" required >
                                                <span class="feedback-new" id="invalid-feedback69" role="alert"></span>
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
                                    <h5 class="card-title">14 Deuxieme témoin de l'Epouse</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="row mb-4">
                                                <label for="bride_witness_two-first_name">Prénom Deuxieme témoin de l'Epouse</label>
                                                <input id="bride_witness_two-first_name" type="text"
                                                       class="form-control serializable"
                                                       name="bride_witness_two-first_name" tabindex="1" data-parsley-errors-container="#invalid-feedback70" required >
                                                <span class="feedback-new" id="invalid-feedback70" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_witness_two-name">Nom Deuxieme témoin de l'Epouse</label>
                                                <input id="bride_witness_two-name" type="text" class="form-control
                                                serializable" name="bride_witness_two-name" tabindex="2"
                                                       data-parsley-errors-container="#invalid-feedback71" required >
                                                <span class="feedback-new" id="invalid-feedback71" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_witness_two-profession">Profession Deuxieme témoin de l'Epouse</label>
                                                <input id="bride_witness_two-profession" type="text" class="form-control serializable"
                                                       name="bride_witness_two-profession" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback72" required >
                                                <span class="feedback-new" id="invalid-feedback72" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-3">
                                                <label for="bride_witness_two-cin" class="required">C.I.N</label>
                                                <input id="bride_witness_two-cin" type="number" class="form-control serializable"
                                                       name="bride_witness_two-cin" tabindex="5"
                                                       data-parsley-errors-container="#invalid-feedback73" required >
                                                <span class="feedback-new" id="invalid-feedback73" role="alert"></span>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="row mb-4">
                                                <label for="bride_witness_two-address">Addresse Deuxieme témoin de l'Epouse</label>
                                                <input id="bride_witness_two-address" type="text" class="form-control
                                                 serializable" name="bride_witness_two-address" tabindex="6"
                                                       data-parsley-errors-container="#invalid-feedback74" required >
                                                <span class="feedback-new" id="invalid-feedback74" role="alert"></span>
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
