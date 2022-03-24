@extends('layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="d-flex align-items-center">
                        <h5 class="page-title">Dashboard</h5>
                        <ul class="breadcrumb ml-2">
                        <li class="breadcrumb-item"><a href="{{ route('marriage.registre') }}">Des détails</a>

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
                        Régistre de Mariage</h4>
                        <div class="text-right">
                            <a href="{{ route('marriage.registre.create') }}" class="btn btn-dark px-3">Ajout</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-striped border-0 data-table" id="datatable">
                                <thead class="thead-light">
                                <th>Prénom du Père de l'Epoux</th>
                                <th>Nom de famille du Père de l'Epoux</th>
                                <th>Prénom de l'Epouse</th>
                                <th>Nom de famille  de l'Epouse</th>
                                <th>Date du Mariage</th>
                                <th>Numéro de déclaration</th>
                                <th>Officier d'ETAT CIVIL</th>
                                <th>Creer par</th>
                                <th>Cree le</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                @foreach ($add as $item)
                                    @php
                                        if(isset($item))
                                            $item->values = json_decode( $item->values);
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $item->values->{'groom_father-first_name'} }}
                                        </td>
                                        <td>
                                            {{ $item->values->{'groom_father-family_name'} }}
                                        </td>
                                        <td>
                                            {{ $item->values->{'bride-first_name'} }}</td>
                                        <td>
                                            {{ $item->values->{'bride-family_name'} }}</td>
                                        <td>
                                            {{ $item->values->{'certificate-date_of_marriage'} }}
                                        </td>
                                        <td>
                                            {{ $item->values->{'certificate-decl_number'} }}
                                        </td>
                                        <td>
                                            {{ $item->civilServantName }}
                                        </td>
                                        <td>
                                            {{ \App\Models\User::find($item->created_by)->first_name }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}
                                        </td>
                                        <td>
                                            <a class="text-dark" href="{{ route('marriage.registre.show', ['id' => $item->id, 'rt' => time()]) }}">
                                                <i class="feather-eye"></i></a>
                                            <a href="{{ route('marriage.registre.edit', ['id' => $item->id]) }}"
                                               class="mx-2 text-dark"><i class="feather-edit"></i></a>
                                            <a class="text-dark"
                                               onclick="return confirm('Êtes-vous sûr de bien vouloir supprimer cet élément?');"
                                               href="{{ route('marriage.registre.delete', ['id' => $item->id]) }}"><i
                                                    class="feather-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
