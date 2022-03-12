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
                                    <li class="breadcrumb-item"><a href="{{ route('naissance.registre') }}">Naissance</a>
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
                                <ul>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Extrait de Naissance</li>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Bulletin de Naissance</li>
                                    <li class="btn btn-primary ml-2 p-2 pr-3 pl-3 pull-right">Acte de Naissance</li>
                                </ul>
                            </div>
                            </div>

                            <div class="card-body">
                                <div>
                                <h4 class="card-title float-left">Renseignement sur l’enfant</h4>
                                </div>
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <td>Date de Déclaration</td>
                                            <td>{{ $values->{'child_info-date_of_decl'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de déclaration</td>
                                            <td>{{ $values->{'child_info-decl_number'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom de l'enfant</td>
                                            <td>{{ $values->{'child_info-first_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom de famille de l'enfant</td>
                                            <td>{{ $values->{'child_info-last_name'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de Naissance de l'enfant</td>
                                            <td>{{ $values->{'child_info-dob'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Heure de Naissance</td>
                                            <td>{{ $values->{'child_info-birth_time'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de Naissance</td>
                                            <td>{{ $values->{'child_info-place_of_birth'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sexe</td>
                                            <td>{{ $values->{'child_info-gender'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Formation sanitaire</td>
                                            <td>{{ $values->{'child_info-health_training'} }}</td>
                                        </tr>
                                    </table>
                                    <div class="mb-5">
                                    </div>
                                </div>
                            </div>
                            
                          <!--  <div class="card-body">
                                <div class="row pr-3 pl-3">
                                <div class="col-3">
                                        <p>Date de Déclaration</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-date_of_decl'} }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Numéro de déclaration</p>
                                    </div>
                                    <div class="col-9">
                                       {{ $values->{'child_info-decl_number'} }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Prénom de l'enfant </p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-first_name'} }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Nom de famille de l'enfant</p>
                                    </div>
                                    <div class="col-9">
                                        {{ $values->{'child_info-last_name'} }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Date de Naissance de l'enfant</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-dob'} }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Heure de Naissance</p>
                                    </div>
                                    <div class="col-9">
                                        <p>
                                        {{ $values->{'child_info-birth_time'} }}
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Lieu de Naissance</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-place_of_birth'} }}  
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Sexe</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-gender'} }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row pr-3 pl-3">
                                    <div class="col-3">
                                        <p>Formation sanitaire</p>
                                    </div>
                                    <div class="col-9">
                                        <p>{{ $values->{'child_info-health_training'} }}</p>
                                    </div>
                                </div>   
                        </div>                      
                    </div>      
                </div> -->

            <style>
                .beefup-head {
                cursor: pointer;
                position: relative;
                }
                .beefup-head:after {
                    border-style: solid;
                    border-width: 12px 12px 0 12px;
                    border-color: #ddd transparent transparent transparent;
                    content: '';
                    position: absolute;
                    right: 0;
                    height: 0;
                    margin-top: -6px;
                    top: 50%;
                    width: 0;
                }

                .open > .beefup-head:after {
                    border-width: 0 12px 12px 12px;
                    border-color: transparent transparent #ddd transparent;
                }
            </style>
            
                <article class="demo"> <li>
                <h2 class="beefup-head"><a href="#"></a> Zone Gérographique </h2> 
                <div class="beefup-body">  
                  
                <p>
                                 <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                            <td>Pays</td>
                                            <td>{{ $values->{'geographical_zone-pays'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Arrondissement</td>
                                            <td>{{ $values->{'geographical_zone-arrondissements'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Région</td>
                                            <td>{{ $values->{'geographical_zone-regions'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Département</td>
                                            <td>{{ $values->{'geographical_zone-departments'} }}</td>
                                        </tr>
                                        <tr>
                                            <td>Commune</td>
                                            <td>{{ $values->{'geographical_zone-communes'} }} </td>
                                        </tr>
                                    </table>
                                    <div class="mb-5">
                                    </div>
                </p> 
             </div>
            </article>

           

                <ol>
                    <li>
                    <div id="formControl">
                    <a>Zone Gérographique 
                                    <i id="open-menu"></i>
                                </a> 
                            </div>
                            </li>
                    <li>Renseignement sur le Père </li>
                    <li>Renseignement de la Mère </li>
                    <li>Renseignement sur le Déclarant </li>
                    <li>Jugement </li>
                </ol>

                <article role="article" class="beefup4" id="beefup4-2">
    <h2 class="beefup-head">Open via JS</h2>
    <div class="beefup-body">
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
    </div>
  </article>

                <article role="article" class="beefup5">
    <h2 class="beefup-head">Scroll 1</h2>
    <div class="beefup-body">
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
    </div>
  </article>
              <script src="/path/to/cdn/jquery.min.js"></script>
                <script src="jquery.beefup.js"></script>
                <script>
        $(function() {
            $('.beefup1').beefup();

            $('.beefup2').beefup({
                openSingle: true
            });

            $('.beefup3').beefup({
                animation: 'fade',
                showSpeed: 1000
            });

            $('.beefup4').beefup('.beefup4');
            $('.beefup4').beefup().open($('#beefup4-2'));

            $('.beefup5').beefup({
                scroll: true
            });

            $('.beefup6').beefup({
                onOpen: function ($this) {
                    $this.css('background', 'yellow');
                },
                onClose: function ($this) {
                    $this.css('background', '');
                }
            });
        });
    </script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

@endsection                              