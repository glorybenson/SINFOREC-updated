@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <h5 class="page-title">Dashboard</h5>
                        <ul class="breadcrumb ml-2">
                        <li class="breadcrumb-item"><a href="{{ route('deces.registre') }}">Des détails</a>

                            <li class="breadcrumb-item active">Registre</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title float-left">
                        Deces data table</h4>
                        <div class="text-right">
                            <a href="{{ route('deces.registre') }}" class="btn btn-dark px-3">Ajout</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped border-0 data-table" id="datatable">
                                <thead class="thead-light">
                                <th>Prénom de la personne Décèdée</th>
                                <th>Nom de famille de la personne Décèdée</th>
                                <th>Date de Naissance de la personne Décèdée</th>
                                <th>Lieu de Naissance de la personne Décèdée</th>
                                <th>Date du Décès</th>
                                <th>Numéro de déclaration</th>
                                <th>Date de déclaration</th>
                                <th>Créé par</th>
                                <th>Créé le</th>

                                <th>Action</th>
                                </thead>
                                <tbody>
                               @if(isset($add))
                                @foreach ($add as $item)
                                    @php
                                        if(isset($item))
                                            $item->values = json_decode( $item->values);
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $item->firstname_of_the_deceased }}
                                        </td>
                                        <td>
                                            {{ $item->lasttname_of_the_deceased }}
                                        </td>
                                        <td>
                                            {{ $item->dob_of_deceased }}
                                        </td>
                                        <td>
                                            {{ $item->birthplace_of_deceased }}</td>
                                        <td>
                                            {{ $item->Date_du_Décès }}</td>
                                        <td>
                                            {{ $item->declarant_cin }}
                                        </td>
                                        <td>
                                            {{ $item->judgement_date }}
                                        </td>
                                         <td>
                                            {{ $item->created_by }}
                                        </td>
                                         <td>
                                            {{ $item->created_at }}
                                        </td>

                                       
                                       
                                        <td>
                                            <a class="text-dark" href="">
                                                <i class="feather-eye"></i></a>
                                            <a href=""
                                               class="mx-2 text-dark"><i class="feather-edit"></i></a>   
                                            <a class="text-dark"
                                               onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet élément?');"
                                               href=""><i
                                                    class="feather-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
