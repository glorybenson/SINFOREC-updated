@extends('layouts.app')

@section('content')

    <div class="row"
    data-tool='{{ $fields->values}}'>
        <div class="col-md-10 mx-auto">
            <div class= "mt-3">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="page-title">Dashboard</h5>
                                    <ul class="breadcrumb ml-2">
                                        <li class="breadcrumb-item"><a href="{{ route('collectif.index') }}">Vie Collectif</a>
                                        </li>
                                        <li class="breadcrumb-item active">View</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="text-right">
                                        <h5 class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Generer le Certificat de Vie Collectif
                                        </h5>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div>
                                        <h4 class="card-title float-left"></h4>
                                    </div>
                                    <!--{{ $fields->values }}-->

                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Prénom du demandeur</td>
                                            <td>{{ $values->{'first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de déclaration</td>
                                            <td>{{ $values->{'last_name'} }}</td>

                                </tr>
                                <tr>
                                    <td>Prénom du Père</td>
                                    <td>{{ $values->{'pere_first-name'} }}</td>
                                </tr>
                                <tr>
                                    <td>Nom de famille du Père</td>
                                    <td>{{ $values->{'pere_last-name'} }}</td>
                                </tr>
                                <tr>
                                    <td>Prénom de la Mère</td>
                                    <td>{{ $values->{'mere_first-name'} }}</td>
                                </tr>
                                <tr>
                                    <td>Nom de famille de la Mère</td>
                                    <td>{{ $values->{'mere_last-name'} }}</td>
                                </tr>
                                
                            </table>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                            <div class="card" id="otherFamilyMembers"></div>
                                    <input type="hidden" id="btn" value=""/>

                                    <h4 class="mb-5">
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        const data = JSON.parse($('[data-tool]').attr('data-tool'));
                        function appendFields(data) {
                            var arr = [];
                            var big
                            var tableParent = document.getElementById('otherFamilyMembers');
                            var appendTable = '<div class="card-header"><div><h5 class="mb-0">D\'autres membres de la famille</h5><table id="otherFamilyMembersTable" class="table table-bordered table-striped"><tbody><tr><th>Prénom</th><th>Nom de famille</th> </tr> </tbody> </table> </div></div>';
                    
                            var i;
                            var keys = Object.keys(data);
                            for (i = 0; i < 6; i++) {
                                delete data[keys[i]];
                            }
                    
                            if (Object.keys(data).length > 0) {
                                tableParent.insertAdjacentHTML('beforeend', appendTable);
                                Object.entries(data).forEach(([key, value], index) => {
                                    arr.push(value);
                                });
                            }
                    
                            console.log(arr)
                            for (var i = 0; i < arr.length; i += 2) {
                                console.log(arr[i])
                                const otherFamilyMembersTable = document.getElementById('otherFamilyMembersTable');
                                let content = otherFamilyMembersTable.innerHTML;
                                content += '<tr><td>' + arr[i] + '</td><td>' + arr[i + 1] + '</td></tr>';
                                otherFamilyMembersTable.innerHTML = content;
                            }
                        }
                        window.addEventListener('load', appendFields(data))
                    </script>
@endsection
