@extends('base')

@section('title', 'Demande de Souscription')
@section('content')

<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-12 col-md-11 text-center p-0 mt-3 mb-2">
            <div class="cardd px-0 pt-4 pb-0 mt-3 mb-3">
                <h5><strong>Demande de souscription</strong></h5>
                <div class="col-6 offset-3">
                    <!-- Placeholder for steps (if needed) -->
                </div>
                <p style="color: red">Les champs suivis d'étoile rouge sont obligatoires</p>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="POST" action="{% url 'demande' %}" enctype="multipart/form-data">
                            <ul id="progressbar">
                                <li class="active" id="personal"><strong>Identité du souscripteur</strong></li>
                                <li id="caracteristik"><strong>Informations sur la souscription</strong></li>
                                <li id="documents"><strong>Pièce jointe</strong></li>
                                <li id="engagement"><strong>Engagement</strong></li>
                            </ul>
                            <!-- Step 1: Identité du souscripteur -->
                            <fieldset>
                                <div class="form-card">
                                    <h4 class="fs-title">Identité du demandeur</h4>
                                    <div class="row">
                                        <div class="col-12 fw-bold">Type de personne<span style="color:red">*</span></div>
                                        <div class="col-12 col-md-6">
                                            <input class="form-check-input" id="type_personne_pp" type="radio" value="PP" name="type_personne" required>
                                            <label class="form-check-label" for="type_personne_pp">Personne Physique</label>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <input class="form-check-input" id="type_personne_pm" type="radio" value="PM" name="type_personne" required>
                                            <label class="form-check-label" for="type_personne_pm">Personne Morale</label>
                                        </div>
                                    </div>

                                    <!-- Personne Physique Fields -->
                                    <div id="pp-fields" style="display: none;">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Nom<span style="color:red">*</span></label>
                                                <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Prenom<span style="color:red">*</span></label>
                                                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label for="" class="fw-bold">Sexe</label>
                                                <div class="col-12 col-md-6">
                                                    <input id="sexeM" type="radio" value="M" name="sexe">
                                                    <label for="sexeM">Masculin</label>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input id="sexeF" type="radio" value="F" name="sexe">
                                                    <label for="sexeF">Féminin</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Date de naissance</label>
                                                <input type="date" name="date_naissance" class="form-control" id="date_naissance" placeholder="Date de naissance" />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Lieu de naissance<span style="color:red">*</span></label>
                                                <input type="text" name="lieu_naisssance" class="form-control" id="lieu_naisssance" placeholder="Lieu de naissance" />
                                            </div>
                                        </div>
                                        <!-- Additional fields for Personne Physique -->
                                    </div>

                                    <!-- Personne Morale Fields (if any) -->
                                    <div id="pm-fields" style="display: none;">
                                        <!-- Add fields specific to Personne Morale here -->
                                    </div>
                                </div>
                                <input type="button" id="firstStepButton" class="next action-button btn btn-success" value="Suivant" />
                            </fieldset>

                            <!-- Step 2: Informations sur la souscription -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Informations sur la souscription</h2>
                                    <!-- Add your fields for subscription information here -->
                                </div>
                                <input type="button" class="previous action-button-previous" value="Retour" />
                                <input type="button" id="secondStepButton" class="next action-button btn btn-success" value="Suivant" />
                            </fieldset>

                            <!-- Step 3: Pièces jointes -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Pièces jointes</h2>
                                    <!-- Add your file upload fields here -->
                                </div>
                                <input type="button" class="previous action-button-previous" value="Retour" />
                                <input type="button" class="next action-button" value="Suivant" />
                            </fieldset>

                            <!-- Step 4: Engagement -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Confirmation de validation</h2>
                                    <div class="row">
                                        <input type="checkbox" id="confirmationBox" name="is_certified" class="required-checkbox checkbox" value="1" required>
                                        <label for="confirmationBox" class="checkbox-label">
                                            En cochant cette case, je certifie sur mon honneur que les informations renseignées sont correctes.
                                        </label>
                                    </div>
                                </div>
                                <input type="button" class="previous action-button-previous" value="Retour" />
                                <input type="submit" id="formValider" class="next action-button btn btn-success" value="Valider" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function() {
    var current_fs, next_fs, previous_fs; // fieldsets
    var opacity;

    $(".next").click(function(){
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        // Ajoute l'étape suivante au progress bar en tant qu'active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        // Montre le fieldset suivant
        next_fs.show();
        // Masque le fieldset actuel
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                opacity = 1 - now;
                current_fs.css({'display': 'none', 'position': 'relative'});
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $(".previous").click(function(){
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        // Retire l'étape actuelle du progress bar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        // Montre le fieldset précédent
        previous_fs.show();

        // Masque le fieldset actuel
        current_fs.animate({opacity: 0}, {
            step: function(now) {
                opacity = 1 - now;
                current_fs.css({'display': 'none', 'position': 'relative'});
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    // Valide si tous les champs requis sont remplis avant de passer à l'étape suivante
    $(".next").on('click', function(){
        var formIsValid = true;
        $(this).closest("fieldset").find("input[required], select[required]").each(function(){
            if ($(this).val() === "") {
                formIsValid = false;
                $(this).css("border", "2px solid red");
                $(".error-message").text("Veuillez remplir tous les champs obligatoires.");
            } else {
                $(this).css("border", "");
            }
        });
        if (formIsValid) {
            $(".error-message").text("");
        } else {
            return false;
        }
    });
});

</script>



<script>
    // Gestion du toogle personne phisique ou moral
</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const typePersonnePP = document.getElementById('type_personne_pp');
    const typePersonnePM = document.getElementById('type_personne_pm');
    const ppFields = document.getElementById('pp-fields');
    const pmFields = document.getElementById('pm-fields');

    function toggleFields() {
        if (typePersonnePP.checked) {
            ppFields.style.display = 'block';
            pmFields.style.display = 'none';
        } else if (typePersonnePM.checked) {
            ppFields.style.display = 'none';
            pmFields.style.display = 'block';
        }
    }
    typePersonnePP.addEventListener('change', toggleFields);
    typePersonnePM.addEventListener('change', toggleFields);
    // Initialize display based on pre-selected radio button (if any)
    toggleFields();
});

</script>

@endsection
