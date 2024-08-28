@extends('base')

@section('title', 'creation projet')
@section('content')


<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-md-11 text-center p-0 mt-3 mb-2">
            <div class="cardd px-0 pt-4 pb-0 mt-3 mb-3">
                <h5><strong>Ajout de projet</strong></h5>
                <div class="col-6 offset-3">
                    <!-- Placeholder for steps (if needed) -->
                </div>
                <p style="color: red">Les champs suivis d'étoile rouge sont obligatoires</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST" action="{{ route('projet.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Step 1: Identité du souscripteur -->
                            <fieldset>
                                <div class="form-card">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="form-check-label" for="libelle">Nom du projet<span style="color:red"> * </span></label>
                                            <input class="form-check-input" id="libelle" type="text" name="libelle" required>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="form-check-label" for="amount">Montant<span style="color:red"> * </span></label>
                                            <input class="form-check-input" id="amount" type="text" name="amount" required>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                                <input type="submit" class="action-button btn btn-success" value="Valider" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
