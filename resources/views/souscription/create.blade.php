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
                        <form id="msform" method="post" action="{{ route('souscription.store') }}" enctype="multipart/form-data">
                            @csrf
                            <ul id="progressbar">
                                <li class="active" id="personal"><strong>Identité du souscripteur</strong></li>
                                <li id="caracteristik"><strong>Informations sur la souscription</strong></li>
                                <li id="personal"><strong>Pièce jointe</strong></li>
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

                                    <!-- Champs Personne Physique  -->

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
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Nationalité<span style="color:red">*</span></label>
                                                <input type="text" name="nationalite" class="form-control" id="nationalite" placeholder="Nationalité"  />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold" for="">Type de pièce<span style="color:red">*</span></label>
                                                <div class="input-group mb-3">
                                                    <select name="type_piece" id="type_piece" class="form-control" required aria-label="type_piece" aria-describedby="basic-addon1">
                                                        <option value="">Choisir</option>
                                                        <option value="CNIB">CNIB</option>
                                                        <option value="PASSEPORT">Passeport</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Référence de la Pièce<span style="color:red">*</span></label>
                                                <input type="text" name="reference_piece" class="form-control" id="cnib" placeholder="reference piece" required  />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Date de délivrance<span style="color:red">*</span></label>
                                                <input type="date" name="date_delivrance" class="form-control" id="date_piece" required placeholder="date de délivrance"  />
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="fw-bold">Profession</label>
                                                <input type="text" name="profession" class="form-control" id="profession" placeholder="Profession"  />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <label class="fw-bold">Situation matrimoniale<span style="color:red">*</span></label>
                                                <div class="input-group mb-3">
                                                    <select name="situation_matrimoniale" id="situation_matrimoniale" class="form-control" aria-label="Situation_matrimoniale" aria-describedby="basic-addon1" required>
                                                        <option value="">Situation Matrimoniale</option>
                                                        <option value="celibataire">Celibataire</option>
                                                        <option value="marie(e)">Marié(e)</option>
                                                        <option value="divorce(e)">Divorcé(e)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <label class="adresse fw-bold">Photo<span style="color:red">*</span></label>
                                                <input type="file" class="form-control" name="photo" required  placeholder="Photo" id="photo" />
                                            </div>
                                        </div>
                                    </div>

                                    <!--  Champs personne morale  --->
                                    <div id="pm-fields" style="display: none;">
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <label class="adresse fw-bold">Raison Social<span style="color: red">*</span></label>
                                                <input type="text" class="form-control" name="raison_social"  placeholder="raison_social" id="raison_social"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="adresse fw-bold">Téléphone<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" name="contact" required  placeholder="Télephone" id="telephone" />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="adresse fw-bold">Téléphone 2</label>
                                            <input type="text" class="form-control" name="contact2" placeholder="Télephone" id="telephone" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <label class="adresse fw-bold">Adresse<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="residence"  placeholder="Adresse" id="adresse" required />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Email<span style="color: red">*</span></label>
                                            <input type="email" class="form-control" name="email"  placeholder="Email" id="email" required />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Mot de passe<span style="color: red">*</span></label>
                                            <input type="password" class="form-control" name="password"  placeholder="Mot de passe" id="password" required />
                                        </div>
                                    </div>
                                </div>
                                <input type="button" id="firstStepButton" class="next action-button btn btn-success" value="Suivant" />
                            </fieldset>

                            <!-- Step 2: Informations sur la souscription -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Informations sur la souscription</h2>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Numero de la souscription<span style="color:red">*</span></label>
                                            <input type="text" name="ref_attestation_prom" class="form-control" id="ref_attestation_prom" placeholder="Numero de la souscription"  />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold" for="">Projet à souscrire<span style="color:red">*</span></label>
                                            <div class="input-group mb-3">
                                                <select name="projet_a_souscrire" id="projet_a_souscrire" class="form-control" style="width: 100%;" aria-label="projet_a_souscrire" aria-describedby="basic-addon1" required>
                                                    <option value="">Choisir</option>
                                                    @foreach($projets as $projet)
                                                    <option value="{{ $projet->id }}">{{ $projet->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Date de la souscription<span style="color:red">*</span></label>
                                            <input type="date" name="date_souscription" class="form-control" id="date_souscription" placeholder="Date de la souscription"  />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Nombre de part à souscrire<span style="color:red">*</span></label>
                                            <input type="date" name="nbre_part_souscrit" class="form-control" id="nbre_part_souscrit" placeholder="Nombre de part souscris"  />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Montant Total<span style="color:red">*</span></label>
                                            <input type="number" name="montant_total" class="form-control" id="montant_total" placeholder="Montant total"  />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Montant versé<span style="color:red">*</span></label>
                                            <input type="number" name="montant_verse" class="form-control" id="montant_verse" placeholder="Montant versé"  />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Montant restant<span style="color:red">*</span></label>
                                            <input type="number" name="montant_restant" class="form-control" id="montant_restant" placeholder="Montant Restant"  />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Lieu de souscription<span style="color:red">*</span></label>
                                            <input type="text" name="lieu_souscription" class="form-control" id="lieu_souscription" placeholder="Lieu de souscription"  />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold" for="">Moyen de paiement<span style="color:red">*</span></label>
                                            <div class="input-group mb-3">
                                                <select name="moyen_paiement" id="moyen_paiement" class="form-control" style="width: 100%;" aria-label="moyen_paiement" aria-describedby="basic-addon1" required>
                                                    <option value="">Choisir</option>
                                                    <option value="orange">Orange Money</option>
                                                    <option value="moov">Moov Money</option>
                                                    <option value="wave">Wave</option>
                                                    <option value="espece">Espèce</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Réference du paiment<span style="color:red">*</span></label>
                                            <input type="text" name="ref_paiement" class="form-control" id="ref_paiement" placeholder="Référence du paiement"  />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold" for="">Mode de sousciption<span style="color:red">*</span></label>
                                            <div class="input-group mb-3">
                                                <select name="mode_souscription" id="mode_souscription" class="form-control" style="width: 100%;" aria-label="mode_souscription" aria-describedby="basic-addon1" required>
                                                    <option value="">Choisir</option>
                                                    <option value="1">Mode 1</option>
                                                    <option value="2">Mode 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Echéance<span style="color:red">*</span></label>
                                            <input type="date" name="echeance" class="form-control" id="echeance" placeholder="Echéance"  />
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label class="fw-bold">Observation</label>
                                            <input type="text" name="observation" class="form-control" id="observation" placeholder="observation"  />
                                        </div>
                                    </div>
                                </div>
                                <input type="button" class="previous action-button-previous" value="Retour" />
                                <input type="button" id="secondStepButton" class="next action-button btn btn-success" value="Suivant" />
                            </fieldset>

                            <!-- Step 3: Pièces jointes -->
                            <fieldset>
                                <div class="form-card">
                                    <h2 class="fs-title">Pièces jointes (<span style="color: red">Taille max de fichiers à 3Mo</span>)</h2>
                                    <div class="row">
                                        <div class="col-12 col-md-12 form-group">
                                            <label class="col-form-label fw-bold">Pièce jointe 1 (pdf)<span style="color: red">*</span></label>
                                            <input type="file" name="pj1" id="quittance" placeholder="Quittance" class="form-control" required=true accept=".pdf" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div id="pieceType" class="col-12 col-md-6 form-group">
                                            <label class="col-form-label fw-bold">Pièce jointe 2 (pdf)<span style="color: red">*</span></label>
                                            <input type="file" name="pj2" id="cnib_piece" placeholder="cnib_piece" class="form-control" accept=".pdf" />
                                        </div>

                                        <div class="col-12 col-md-6 form-group">
                                            <label class="col-form-label fw-bold">Pièce jointe 3 (pdf) (pdf)<span style="color: red">*</span></label>
                                            <input type="file" name="pj3" id="attestation" placeholder="Attestation d'attribution du promoteur" class="form-control" required=true accept=".pdf" />
                                        </div>
                                    </div>
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
                                            En cochant cette case, je certifie sur mon honneur que les informations
                                            renseignées sont correctes.
                                        </label>
                                    </div>
                                </div>
                                <input type="button" class="previous action-button-previous" value="Retour" />
                                <input type="submit" id="formValider" class="action-button btn btn-success" value="Valider" />
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
    var current_fs, next_fs, previous_fs;
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


<script>
    $(document).ready(function() {
        $('input[name="type_personne"]').change(function() {
            if (this.value == 'PP') {

                // Désactiver les champs dans PM et supprimer l'attribut required
                $('#pm input, #pm select, #pm textarea').prop('disabled', true).each(function() {
                    if ($(this).attr('required')) {
                        $(this).removeAttr('required').data('required', true);
                    }
                });

                // Activer les champs dans PP et ajouter l'attribut required si nécessaire
                $('#pp input, #pp select, #pp textarea').prop('disabled', false).each(function() {
                    if ($(this).data('required')) {
                        $(this).attr('required', true);
                    }
                });
            } else if (this.value == 'PM') {

                // Désactiver les champs dans PP et supprimer l'attribut required
                $('#pp input, #pp select, #pp textarea').prop('disabled', true).each(function() {
                    if ($(this).attr('required')) {
                        $(this).removeAttr('required').data('required', true);
                    }
                });

                // Activer les champs dans PM et ajouter l'attribut required si nécessaire
                $('#pm input, #pm select, #pm textarea').prop('disabled', false).each(function() {
                    if ($(this).data('required')) {
                        $(this).attr('required', true);
                    }
                });
            }
        });

        // Initialize the form by disabling the inputs in the hidden sections and removing required attribute
        $('#pp input, #pm input, #pp select, #pm select, #pp textarea, #pm textarea').prop('disabled', true).each(function() {
            if ($(this).attr('required')) {
                $(this).removeAttr('required').data('required', true);
            }
        });

        $('#pieceType').prop('disabled', true);
    });
</script>


<script type="text/javascript">
    const quittance = document.getElementById('quittance')

    quittance.addEventListener('change', (event) => {
        const target = event.target
        if (target.files && target.files[0]) {

            /*Maximum allowed size in bytes
              5MB Example
              Change first operand(multiplier) for your needs*/
            const maxAllowedSize = 3 * 1024 * 1024;
            if (target.files[0].size > maxAllowedSize) {
                // Here you can ask your users to load correct file
                target.value = ''
            }
        }
    })

    const cnib_piece = document.getElementById('cnib_piece')

    cnib_piece.addEventListener('change', (event) => {
        const target = event.target
        if (target.files && target.files[0]) {

            /*Maximum allowed size in bytes
              5MB Example
              Change first operand(multiplier) for your needs*/
            const maxAllowedSize = 3 * 1024 * 1024;
            if (target.files[0].size > maxAllowedSize) {
                // Here you can ask your users to load correct file
                target.value = ''
            }
        }
    })


    const attestation = document.getElementById('attestation')

    attestation.addEventListener('change', (event) => {
        const target = event.target
        if (target.files && target.files[0]) {

            /*Maximum allowed size in bytes
              5MB Example
              Change first operand(multiplier) for your needs*/

            const maxAllowedSize = 3 * 1024 * 1024;
            if (target.files[0].size > maxAllowedSize) {
                // Here you can ask your users to load correct file
                target.value = ''
            }
        }
    })
</script>

@endsection
