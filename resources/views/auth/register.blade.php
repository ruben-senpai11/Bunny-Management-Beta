<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription en 3 étapes</title>
    <!-- CSS Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/country-select-js-master/build/css/countrySelect.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/intl-tel-input-master/build/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/virtual-select-master/dist/virtual-select.min.css') }}" />
    <!-- Votre CSS personnalisé -->
    <style>
        html, body{
            height: max-content;
        }
        *,
        *:after,
        *:before {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            background-color: #FFFFDB;  
            /* background: radial-gradient(rgb(255, 255, 255) 13%, rgb(205, 205, 205) 95%); */
            /* background: linear-gradient(to top, transparent, rgba(221, 255, 207, 1)) rgba(214, 219, 220, 1); */
        }

        .form-step {
            display: none;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-step.active {
            display: block;
            animation: fadeIn 2s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .btn-primary {
            background-color: rgba(60,70,255);
            float: right;
            /* background-color: #FE7600; */
            border-color: rgba(60,70,255);
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #FE7600;
            border-color: #FE7600;
        }

        .btn-secondary{
            background-color: #FE7600;
            border-color: #FE7600;
        }

        #rabbitRaces {
            max-width: 100%;
        }

        #rabbitCount {
            max-width: 100%;
        }

        /* Multi-Select Fields CSS  */
        .vscomp-wrapper {
            display: block!important;
            width: 100%!important;
            padding: .5rem 1rem!important;
            font-size: .875rem!important;
            font-weight: 400!important;
            line-height: 1.5!important;
            color: #6b7280!important;
            background-color: #fff!important;
            background-clip: padding-box!important;
            border: .0625rem solid #d1d5db!important;
            -webkit-appearance: none!important;
            appearance: none!important;
            border-radius: .5rem!important;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,.07)!important;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out!important;
        }
        .vscomp-wrapper:not(.has-value) .vscomp-value {
            opacity: 1!important;
        }
        .vscomp-ele {
            max-width: none!important;
        }
        .vscomp-toggle-button {
            align-items: center;
            background-color: #fff;
            border: none!important;
            cursor: pointer;
            padding: 0!important;
            position: relative;
            width: 100%;
        }

        .vscomp-wrapper.focused .vscomp-toggle-button, .vscomp-wrapper:focus .vscomp-toggle-button {
            box-shadow: none!important;
        }
        .vscomp-dropbox{
            background-color: #fff!important;
            background-clip: padding-box!important;
            border: .0625rem solid #d1d5db!important;
            border-radius: .5rem!important;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,.07)!important;
            color: #6b7280!important; 
        }

        .vscomp-arrow::after{
            border-bottom-color: #6b7280!important;
            border-right-color: #6b7280!important;
        }
        .vscomp-wrapper .checkbox-icon::after{
            border-radius: .2rem;
        }
    </style>
</head>

<body @if (session('authGoogle')) data-google="{{ session('authGoogle') }}" data-user="{{session('User')}}" @endif class="d-flex align-items-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form id="multiStepForm" method="POST" action="{{ route('register') }}">
                    @csrf


                    <!-- Étape 1 -->
                    <div class="form-step active" id="step1">
                        <h4>Étape 1 : Informations personnelles</h4>
                        <div class="row g-3 pt-2">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">Prénom(s)</label>
                                <input type="text" class="form-control" id="inputFirstName" name="inputFirstName">

                            </div>

                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="inputLastName" name="inputLastName">

                            </div>
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Adresse </label>
                                <input type="text" class="form-control" id="inputAddress" name="inputAddress"
                                    placeholder="Apartment, studio, or floor">

                            </div>

                            <input type="text" id="dialCode" style="display: none; width:0; height:0" name="dialCode" value="229">

                            <div class="col-12">
                                <label for="inputPhoneNumber" class="form-label">Numéro de téléphone </label>
                                <br>
                                <input type="tel" class="form-control" id="inputPhoneNumber" name="inputPhoneNumber">

                            </div>
                            <div class="col-md-6">
                                <label for="inputCity" class="form-label">Cité</label>
                                <input type="text" class="form-control" id="inputCity" name="inputCity">

                            </div>
                            <div class="col-md-4">
                                <label for="country" class="form-label">Pays</label>
                                <input type="text" id="country" name="country" class="form-control">

                            </div>
                            <div class="col-md-2">
                                <label for="inputZip" class="form-label">Zip</label>
                                <input type="text" class="form-control" id="inputZip" name="inputZip">

                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary" id="next1" type="button">Suivant</button>
                            </div>
                        </div>

                        <div class="col-12 text-center ">
                            <span>-ou s'inscrire avec-</span>
                            <p class="pt-2">
                                <!-- Lien de redirection vers Google -->
                                <a href="{{ url('auth/google') }}" class="btn btn-outline-primary">
                                    <svg class="fill-current w-4 h-4 mr-2" viewBox="0 0 533.5 544.3"
                                        xmlns="http://www.w3.org/2000/svg" style="max-height: 15px;max-width: 15px;">
                                        <path
                                            d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z"
                                            fill="#4285f4" />
                                        <path
                                            d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z"
                                            fill="#34a853" />
                                        <path
                                            d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z"
                                            fill="#fbbc04" />
                                        <path
                                            d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z"
                                            fill="#ea4335" />
                                    </svg>
                                    <span class="">Google</span>
                                </a>

                            </p>
                        </div>

                    </div>


                    <!-- Étape 2 -->
                    <div class="form-step" id="step2">
                        <h3>Étape 2 : Informations sur la ferme</h3>
                        <div class="mb-3">
                            <label for="farmName">Nom de la ferme</label>
                            <input type="text" class="form-control" id="farmName" name="farmName" required>

                        </div>
                        <div class="mb-3">
                            <label for="farm_ifu">Numéro IFU</label>
                            <input type="text" class="form-control" id="farm_ifu" name="farm_ifu" required>

                        </div>
                        <div class="mb-3">
                            <label for="rabbitRaces">Catégories de races élevées</label>
                            <select id="rabbitRaces" name="rabbitRaces" required multiple>
                                <option value="locales">Locales</option>
                                <option value="nouvelle-zel blanc">Nouvelle-Zélande blanc</option>
                                <option value="chinchilla">Chinchilla</option>
                                <option value="californien">Californien</option>
                                <option value="rex">Rex</option>
                                <option value="autre">Autre</option>
                            </select>

                            <div><span class="text-danger" id="rabbitRacesError"></span></div>
                        </div>
                        <div class="mb-3">
                            <label for="rabbitCount">Effectif de lapins à élever</label>
                            <select id="rabbitCount" name="rabbitCount" required>
                                <option value="tiny_farm">0 à 50</option>
                                <option value="small_farm">51 à 200</option>
                                <option value="middle_farm">200 à 500</option>
                                <option value="big_farm">501 à 1000</option>
                                <option value="very_big_farm">Plus de 1000</option>
                            </select>

                            <div><span class="text-danger" id="rabbitCountError"></span></div>
                        </div>
                        <button class="btn btn-primary" type="button" id="next2" >Suivant</button>
                        <button class="btn btn-primary d-none" type="submit" id="submit1">Créer le compte</button>
                        <button class="btn btn-secondary" type="button" onclick="prevStep(2)">Précédent</button>
                    </div>

                    <!-- Étape 3 -->
                    <div class="form-step" id="step3">
                        <h3>Étape 3 : Mot de passe</h3>
                        <div class="mb-3">
                            <label for="password">Mot de passe</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <input type="text" class="form-control d-none" id="type" name="type" value='farmer' required>

                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword">Confirmez le mot de passe</label>
                            <input type="password" class="form-control" id="confirmPassword"
                                name="password_confirmation" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Créer le compte</button>
                        <button class="btn btn-secondary" type="button" onclick="prevStep(3)">Précédent</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Bootstrap 5 et jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('vendor/country-select-js-master/build/js/countrySelect.min.js') }}"></script>
    <!-- Use as a Vanilla JS plugin -->
    <script src="{{ asset('vendor/intl-tel-input-master/build/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('vendor/intl-tel-input-master/build/js/intlTelInput-jquery.min.js') }}"></script>

    <script src="{{ asset('vendor/virtual-select-master/dist/virtual-select.min.js') }}"></script>

    <script>
        var googleData = $('body').data('google');
        var userData = $('body').data('user');
        console.log(userData);
        if (googleData) {
            //etape 1
            $('#inputFirstName').val(userData.given_name);
            $('#inputLastName').val(userData.family_name);
            $('#email').val(userData.email);
            $('#password').val(userData.sub);
            $('#confirmPassword').val(userData.sub);
            //afficher le formulaire de creation de ferme
            $('#submit1').removeClass('d-none');
            $('#next2').addClass('d-none');
            nextStep(1)
        }
        $("#country").countrySelect();
       

        var input = document.querySelector("#inputPhoneNumber");
        var iti = window.intlTelInput(input, {
            separateDialCode: true,
            formatOnDisplay: false,
        });
        $("#inputPhoneNumber").on("input ", function () {
            var countryData = iti.getSelectedCountryData();
            console.log(countryData.dialCode)
            $('#dialCode').val(countryData.dialCode);
            console.log(countryData.iso2)
            $("#country").countrySelect("setCountry", countryData.name);
        })



        VirtualSelect.init({
            ele: 'select',
            additionalClasses: 'raduis'
        });


        $(document).ready(function () {
            var allFieldsEmpty = true;

            $("#next1").click(function () {
                // Code à exécuter lorsqu'on appuie sur le bouton
                // Parcourir tous les champs d'entrée et de sélection

                $("#step1 input, #step1 select").each(function () {
                     if ($(this).val() !== "") {
 
                         $(this).removeClass("is-invalid");
                         $(this).addClass("is-valid");
                         console.log($(this).val())
                         allFieldsEmpty = true;
 
                     } else {
                         $(this).addClass("is-invalid");
                         $(this).removeClass("is-valid");
                         allFieldsEmpty = false;
                         return allFieldsEmpty; // Sortir de la boucle each()
                     }
                 });
                console.log(allFieldsEmpty)
                if (allFieldsEmpty) {
                    nextStep(1)
                }
            });

            $("#next2").click(function () {
                allFieldsEmpty = true;

                // Code à exécuter lorsqu'on appuie sur le bouton
                // Parcourir tous les champs d'entrée et de sélection
                if ($("#farmName").val() !== "") {
                    $("#farmName").removeClass("is-invalid");
                    $("#farmName").addClass("is-valid");
                    allFieldsEmpty = true;

                } else {
                    $("#farmName").addClass("is-invalid");
                    $("#farmName").removeClass("is-valid");
                    allFieldsEmpty = false;
                    return allFieldsEmpty; // Sortir de la boucle each()
                }

                if ($("#farm_ifu").val() !== "") {
                    $("#farm_ifu").removeClass("is-invalid");
                    $("#farm_ifu").addClass("is-valid");
                    allFieldsEmpty = true;

                } else {
                    $("#farm_ifu").addClass("is-invalid");
                    $("#farm_ifu").removeClass("is-valid");
                    allFieldsEmpty = false;
                    return allFieldsEmpty; // Sortir de la boucle each()
                }

                //verification specifique
                if ($("#rabbitRaces").val() == 0) {
                    $("#rabbitRaces").addClass("is-invalid");
                    $("#rabbitRaces").removeClass("is-valid");
                    var errorMessage = "Le champ doit être renseigné.";
                    allFieldsEmpty = false;
                    $("#rabbitRacesError").text(errorMessage);
                    return allFieldsEmpty;
                } else {
                    $("#rabbitRaces").removeClass("is-invalid");
                    $("#rabbitRaces").addClass("is-valid");
                    allFieldsEmpty = true;
                    $("#rabbitRacesError").empty();
                }

                //verification specifique
                if ($("#rabbitCount").val() == 0) {
                    $("#rabbitCount").addClass("is-invalid");
                    $("#rabbitCount").removeClass("is-valid");
                    var errorMessage = "Le champ doit être renseigné.";
                    allFieldsEmpty = false;
                    $("#rabbitCountError").text(errorMessage);
                    return allFieldsEmpty; 
                } else {
                    $("#rabbitCount").removeClass("is-invalid");
                    $("#rabbitCount").addClass("is-valid");
                    allFieldsEmpty = true;
                    $("#rabbitCountError").empty();
                }
                console.log(allFieldsEmpty)
                if (allFieldsEmpty) {
                    nextStep(2)
                }
            });

            $("#submit1").click(function () {w
                allFieldsEmpty = true;

                // Code à exécuter lorsqu'on appuie sur le bouton
                // Parcourir tous les champs d'entrée et de sélection
                if ($("#farmName").val() !== "") {
                    $("#farmName").removeClass("is-invalid");
                    $("#farmName").addClass("is-valid");
                    allFieldsEmpty = true;

                } else {
                    $("#farmName").addClass("is-invalid");
                    $("#farmName").removeClass("is-valid");
                    allFieldsEmpty = false;
                    return allFieldsEmpty; // Sortir de la boucle each()
                }

                if ($("#farm_ifu").val() !== "") {
                    $("#farm_ifu").removeClass("is-invalid");
                    $("#farm_ifu").addClass("is-valid");
                    allFieldsEmpty = true;

                } else {
                    $("#farm_ifu").addClass("is-invalid");
                    $("#farm_ifu").removeClass("is-valid");
                    allFieldsEmpty = false;
                    return allFieldsEmpty; // Sortir de la boucle each()
                }

                //verification specifique
                if ($("#rabbitRaces").val() == 0) {
                    $("#rabbitRaces").addClass("is-invalid");
                    $("#rabbitRaces").removeClass("is-valid");
                    var errorMessage = "Le champ doit être renseigné.";
                    allFieldsEmpty = false;
                    $("#rabbitRacesError").text(errorMessage);
                    return allFieldsEmpty;
                } else {
                    $("#rabbitRaces").removeClass("is-invalid");
                    $("#rabbitRaces").addClass("is-valid");
                    allFieldsEmpty = true;
                    $("#rabbitRacesError").empty();
                }

                //verification specifique
                if ($("#rabbitCount").val() == 0) {
                    $("#rabbitCount").addClass("is-invalid");
                    $("#rabbitCount").removeClass("is-valid");
                    var errorMessage = "Le champ doit être renseigné.";
                    allFieldsEmpty = false;
                    $("#rabbitCountError").text(errorMessage);
                    return allFieldsEmpty; 
                } else {
                    $("#rabbitCount").removeClass("is-invalid");
                    $("#rabbitCount").addClass("is-valid");
                    allFieldsEmpty = true;
                    $("#rabbitCountError").empty();
                }
               
            });

        });

        function nextStep(currentStep) {
            $("#step" + currentStep).removeClass("active");
            $("#step" + (currentStep + 1)).addClass("active");
        }

        function prevStep(currentStep) {
            $("#step" + currentStep).removeClass("active");
            $("#step" + (currentStep - 1)).addClass("active");
        }
    </script>
</body>

</html>