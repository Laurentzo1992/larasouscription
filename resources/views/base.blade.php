<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="https://etitre2.dgi.bf/img/armoirie.png" rel="icon">
    <link href="https://etitre2.dgi.bf/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="https://etitre2.dgi.bf/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="https://etitre2.dgi.bf/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://etitre2.dgi.bf/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://etitre2.dgi.bf/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://etitre2.dgi.bf/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="https://etitre2.dgi.bf/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="https://etitre2.dgi.bf/css/style.css" rel="stylesheet">

    <link href="https://etitre2.dgi.bf/css/main.css" rel="stylesheet" />


    <script src="https://etitre2.dgi.bf/js/jquery.min.js"></script>


    <script src="https://etitre2.dgi.bf/js/bootstrap.min.js"></script>
    <!-- Livewire Styles --><style >[wire\:loading][wire\:loading], [wire\:loading\.delay][wire\:loading\.delay], [wire\:loading\.inline-block][wire\:loading\.inline-block], [wire\:loading\.inline][wire\:loading\.inline], [wire\:loading\.block][wire\:loading\.block], [wire\:loading\.flex][wire\:loading\.flex], [wire\:loading\.table][wire\:loading\.table], [wire\:loading\.grid][wire\:loading\.grid], [wire\:loading\.inline-flex][wire\:loading\.inline-flex] {display: none;}[wire\:loading\.delay\.none][wire\:loading\.delay\.none], [wire\:loading\.delay\.shortest][wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter][wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short][wire\:loading\.delay\.short], [wire\:loading\.delay\.default][wire\:loading\.delay\.default], [wire\:loading\.delay\.long][wire\:loading\.delay\.long], [wire\:loading\.delay\.longer][wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest][wire\:loading\.delay\.longest] {display: none;}[wire\:offline][wire\:offline] {display: none;}[wire\:dirty]:not(textarea):not(input):not(select) {display: none;}:root {--livewire-progress-bar-color: #2299dd;}[x-cloak] {display: none !important;}</style>
</head>

<body>

    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center"></div>
            <div class="contact-info d-flex align-items-center">
                <i class=" d-flex align-items-center ms-4"><span>Pour toutes informations complémentaires, veuillez contacter : </span></i>
                <a href="tel:+22625316005"><i class="bi bi-phone d-flex align-items-center ms-4"><span>(226) 77505873/25393920/55338866</span></i></a>
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="container  d-flex float-start logo">

        <a href="{{ route('souscription.index') }}"><img src="{{ asset('img/static/dgi.png') }}" width="50px" height="50px" /></a>
            <h1>
                <!--a href="/">Plateforme de demandes d'attestation et de PUH</a-->
                Plateforme de demande de souscription
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="">FAQ</a></li>
                <li><a class="active" href="{{ route('souscription.create') }}">Effectuer une souscription</a></li>
                <li><a href="{{ route('souscription.connexion') }}">Se connecter</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->
    </div>
</header>

<div wire:snapshot="{&quot;data&quot;:{&quot;libelle_court&quot;:null,&quot;libelle_long&quot;:null,&quot;cnib&quot;:null,&quot;adresse&quot;:null,&quot;newDemande&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;editDemande&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}],&quot;document1&quot;:null,&quot;document2&quot;:null,&quot;search&quot;:null,&quot;updateMode&quot;:false,&quot;currentPage&quot;:&quot;create&quot;,&quot;paginators&quot;:[[],{&quot;s&quot;:&quot;arr&quot;}]},&quot;memo&quot;:{&quot;id&quot;:&quot;ejLvMrYwWFeM9RqDOU0d&quot;,&quot;name&quot;:&quot;demande-comp&quot;,&quot;path&quot;:&quot;Demande&quot;,&quot;method&quot;:&quot;GET&quot;,&quot;children&quot;:[],&quot;scripts&quot;:[],&quot;assets&quot;:[],&quot;errors&quot;:[],&quot;locale&quot;:&quot;fr&quot;},&quot;checksum&quot;:&quot;fce265a564ccd9819fc8b76f925833f3bd4ad31bdf48f282d323e8313004f860&quot;}" wire:effects="[]" wire:id="ejLvMrYwWFeM9RqDOU0d">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .select2-container--default .select2-results__options {
        z-index: 9999;
        /* Définir un z-index élevé pour le menu déroulant */
    }

    .select2-container--default .select2-selection--single {
        z-index: 1000;
        /* Définir un z-index pour l'élément sélectionné */
    }
</style>

<section>

    @yield('content')

</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" ;></script>


<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <span>DGI</span>  @ 2024
        </div>
    </div>
</footer>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://etitre2.dgi.bf/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="https://etitre2.dgi.bf/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://etitre2.dgi.bf/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="https://etitre2.dgi.bf/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="https://etitre2.dgi.bf/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="https://etitre2.dgi.bf/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="https://etitre2.dgi.bf/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="https://etitre2.dgi.bf/js/main.js"></script>
    <script src="/livewire/livewire.js?id=f121a5df"   data-csrf="14HspUTIjNdADzD4FX1MrrgN42JnqlCaGHvaUiPk" data-update-uri="/livewire/update" data-navigate-once="true"></script>
    <script>
        new TomSelect('select[multiple]', { plugins: { remove_button: { title: 'Supprimer' } } });
    </script>

</body>

</html>
