@extends('layouts.app')

@section('content')

    <div class="row">
    <!--<p class="hidden">@json ($registre) </p>-->
        <div class="col-md-10 mx-auto">
            <div class= "mt-3">
                <div class="content container-fluid">
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="d-flex align-items-center">
                                    <h5 class="page-title">Dashboard</h5>
                                    <ul class="breadcrumb ml-2">
                                        <li class="breadcrumb-item"><a href="{{ route('celibat.index') }}">Celibat</a>
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

                                    <div>
                                        <h4 class="card-title ml-0 p-2 pr-3 pl-0 float-left">Certificat De Célibat
                                        </h4>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div>
                                        <h4 class="card-title float-left"></h4>
                                    </div>
                                    <table class="table table-bordered table-striped">
                                       
                                        <tr>
                                            <td>Prénom</td>
                                            <td>{{ $values->{'first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille</td>
                                            <td>{{ $values->{'last_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance</td>
                                            <td>{{ $values->{'dob'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Addresse</td>
                                            <td>{{ $values->{'address'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>C.I.N</td>
                                            <td>{{ $values->{'cin'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de la demande</td>
                                            <td>{{ $values->{'demande'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de déclaration</td>
                                            <td>{{ $values->{'declaration_number'} }}</td>
                                        </tr>
                                    </table>
                                    <div class="mb-5">
                                    </div>
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
                            var appendTable = '<div class="card-header"><h5 class="mb-0">Other family Members</h5><table id="otherFamilyMembersTable" class="table table-bordered table-striped"><tbody><tr><th>First name</th><th>Last name</th> </tr> </tbody> </table> </div>';
                    
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
