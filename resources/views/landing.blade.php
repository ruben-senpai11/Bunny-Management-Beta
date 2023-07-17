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
            background-color: var(--orange-fonce);
            background-image: url("asse");
            color: #fce65b;
            background-image: url('lapin.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            min-height: 100vh;
            padding-bottom: 100px;
        }

        .container.card {
            padding-top: 100px;
            text-align: center;
        border-radius: 10px;
        background: #37373784;
        backdrop-filter: blur(10px);
        }

        h1 {
            font-size: 3rem;
        }

        p {
            font-size: 1.5rem;
        }

        .btn {
            background-color: var(--orange-clair);
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: var(--orange-fonce);
            color: white;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color:#ff7f00;
            text-align: center;
            padding: 20px 0;
        }



        footer a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1.2rem;
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
                    <a class="btn btn-light" href="#">Se connecter</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container card mt-4 p-3" >
        <h1>Système de gestion de l'élevage des lapins </h1>
        <p>Notre système web vous permet de gérer efficacement votre élevage de lapins.</p>
        <div class="row">
            <div class="col-md-4">
                <h3>Gestion des données <i class="fas fa-database"></i></h3>
                <p>Collectez et gérez facilement les informations relatives à vos lapins : poids, alimentation,
                    vaccinations, etc.</p>
            </div>
            <div class="col-md-4">
                <h3>Planification des tâches <img src="{{ asset('assets/img/calendar.svg') }}" alt="" style="max-height: 35px;max-width: 35px;"></h3>
                <p>Organisez et planifiez les différentes tâches liées à l'élevage des lapins, telles que
                    l'alimentation, le nettoyage des cages, etc.</p>
            </div>
            <div class="col-md-4">
                <h3>Analyse des performances <img src="{{ asset('assets/img/chart-pie-solid.svg') }}" alt="" style="max-height: 35px;max-width: 35px;"></h3>
                <p>Obtenez des analyses détaillées sur les performances de votre élevage, y compris la croissance, la
                    reproduction, et plus encore.</p>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-lg" href="#">Se connecter</a>
        </div>
    </div>

    <footer >
        <a href="#">Nous contacter</a>
        <a href="#">En savoir plus</a>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>