<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/4c82faa72f.js" crossorigin="anonymous"></script>
    <title>Gestion de l'élevage des lapins</title>
    <style>
        /* Couleurs personnalisées */
        :root {
            --orange-fonce: #ff7f00;
            --orange-clair: #ffa500;
        }

        /* Styles personnalisés */
        body {
            /* background-color: var(--orange-fonce); */
            background-image: url("asse");
            /* color: #fce65b; */
            background-image: url('lapin.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            min-height: 100vh;
            /* padding-bottom: 100px; */
            display: grid;
            align-items: center;
        }

        .navbar{
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            color: #fce65b;
            z-index: 2;
        }

        .body{
            color: #fce65b;
            position: absolute;
            top: 8%;
            width: 100%;
            height: 80%;
            padding: 0 5%;
        }
        .container.card {
            /* padding-top: 100px; */
            position: relative;
            text-align: center;
            border-radius: 10px;
            background: #37373744;
            backdrop-filter: blur(5px);
            height: 100%;            
        }

        .row{
            position: relative;
            height: 50%;
        }

        .column-1, .column-2, .column-3{
            display: flex;
            justify-content: center;
            margin: 3% 0;
        }
        .column-1{
        }
        .column-2{
            align-items: center;    
        }        
        .column-3{
            align-items: flex-end;
        }

        h1 {
            font-size: 3rem;
            color: white;
            background: linear-gradient(to right, green, #ffa500, white);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h3
        {
            color: white;
            font-size: 1.7rem;
        }
        p {
            font-size: 1.2rem;
        }

        .btn {
            background-color: #fff;
            /* background-color: var(--orange-clair); */
            color: var(--orange-fonce);
            /* color: var(--orange-clair); */
            font-weight: normal;
            padding: 7px 10px;
            border-radius: 5px;
            text-decoration: none;
            border  : #1FD0FF;
        }

        .btn:hover {
            background-color: var(--orange-fonce);
            color: white;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #ff7f00;
            text-align: center;
            padding: 7px 0;
        }
        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1rem;
        }

        @media screen and (max-width: 750px) {
            .body{
                height: 110%;
            }
            .container.card {
                height: unset;
            }
        }
    </style>
</head>

<body style="background-image: url('{{ asset('assets/img/rabbit farm.jpg') }}');">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">À propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    @if (Route::has('login'))
                    <a class="btn btn-light m-1" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                    @endif
                    ou
                    @if (Route::has('register'))
                    <a class="btn btn-light m-1" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <div class="body">
        <div class="container card mt-4 p-3">
            <h1 class="">Gestion de ferme en ligne</h1>
            <p class="mt-2">Gérez efficacement votre élevage de lapins</p>
            <div class="row mt-4">
                <div class="col-md-4 column-1">
                    <h3>Gérez vos données 
                        <!-- <i class="fas fa-database"></i> -->
                </h3>
                    <!-- <p>Collectez et gérez facilement les informations relatives à vos lapins : poids, alimentation,
                        vaccinations, etc.</p> -->
                </div>
                <div class="col-md-4 column-2">
                    <h3>Planifiez vos tâches 
                        <!-- <img src="{{ asset('assets/img/calendar.svg') }}" alt=""
                            style="max-height: 35px;max-width: 35px;"> -->
                        </h3>
                    <!-- <p>Organisez et planifiez les différentes tâches liées à l'élevage des lapins, telles que
                        l'alimentation, le nettoyage des cages, etc.</p> -->
                </div>
                <div class="col-md-4 column-3">
                    <h3>Analysez vos performances <!--<img src="{{ asset('assets/img/chart-pie-solid.svg') }}" alt=""
                            style="max-height: 35px;max-width: 35px;">-->
                        </h3>
                    <!-- <p>Obtenez des analyses détaillées sur les performances de votre élevage, y compris la croissance, la
                        reproduction, et plus encore.</p> -->
                </div>
            </div>
            <div class="d-grid gap-2 d-md-block mt-5">
                @if (Route::has('login'))
                    <a class="btn btn-light m-1" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                @endif
                ou
                @if (Route::has('register'))
                    <a class="btn btn-light m-1" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                @endif
            </div>
        </div>
    </div>

    <footer>
        <a href="#">Nous contacter</a>
        <a href="#">En savoir plus</a>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>