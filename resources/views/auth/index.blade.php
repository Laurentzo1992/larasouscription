@extends('base')

@section('title', 'Portail | DGI')
@section('content')

<div class="content">
       {{--  <script>
            setTimeout(function() {
                document.querySelector('.alert.alert-success').style.display = 'none';
            }, 3000); // Le message flash disparaîtra après 5 secondes (5000 millisecondes)
        </script> --}}

        <div class="col-lg-6 offset-lg-5 animate__animated animate__fadeInUp">


            <br>
        </div>

        <div class="container">

                <div class="col">

                    <div class="row">


                        <div class="col-lg col-md mb20">
                            <div class="mb-4">
                                <div class="" style="width:14rem; border:none; text-align:left; display:inline">

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
        </div>

    <div id="accuiel" >
        <img src="{{ asset('img/static/armoirie_officielle.png') }}" alt="alt" width=100% height=100%/>
    </div>
    <div id="bienvenue_cadre" >
        <p class="bienvenue">BIENVENUE SUR LA PLATEFORME DE SOUSCRIPTION </p>
        <p class="slogan"> La Direction générale des impôts, au service du développement économique et social!</p>
    </div>
</div>

@endsection
