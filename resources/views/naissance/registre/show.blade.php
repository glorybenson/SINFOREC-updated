@extends('layouts.app')

@section('content')
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Prénom</td>
                                            <td>{{ $add->get('first_name') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de Famille</td>
                                            <td>{{ $add->get('last_name') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance</td>
                                            <td>{{ $add->get('date_naissance') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom du Père</td>
                                            <td>{{ $add->get('name_of_father') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom de la mère</td>
                                            <td>{{ $add->get('name_of_mother') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de Famille de la Mère</td>
                                            <td>{{ $add->get('mother_maiden_name') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Creer par</td>
                                            <td>{{ $add->get('admin_first_name') . ' ' . $add->get('admin_last_name') }}
                                            </td>
                                        </tr>
                                        <td>Cree le</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($add->get('created_at'))->format('d-m-Y') }}
                                        </td>
                                    </table>

@endsection
