@extends('base')

@section('title', 'Connexion')

@section('content')
<div class="content">
    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container">

            <div class="row no-gutters">
                <style>
                    .single {
                        background: rgba(0, 99, 207, .08);
                        padding: 10px 25px;
                        border-radius: 5px;
                        margin: 0 25px 32px 0;
                        width: -moz-fit-content;
                        width: fit-content;
                        color: #0063cf !important;
                    }
                </style>

                <div id="login" style="margin-top:30px">
                    <div class="login_title">
                            <h1>DEMANDE DE SOUSCRIPTION</h1>
                    </div>
                <form method="POST" action="{{ route('auth.login') }}" name="login">
                    @csrf
                    <p>
                    <input  name="email" id="email" type="text" size="15" placeholder="Email" autofocus autocomplete="off" :value="old('email')" value="">
                    @error('email')
                        {{ $message }}
                    @enderror
                    </p>
                    <p>
                    <input name="password"  type="password" id="password" size="15" placeholder="Mot de passe">
                    @error('password')
                        {{ $message }}
                    @enderror
                    </p>
                    <p style="">
                    <button type="submit" class="btn btn-warning">Se connecter</button>
                    </p>
                </form>
                <!--a style="font-size:11px; color:#43a047;" href="pwd-reinitialisation"> Mot de passe oubli&eacute; ?</a-->
                </div>
            </div>
            </div>
        </div>
    </section><!-- End Pricing Section -->
</div>
@endsection
