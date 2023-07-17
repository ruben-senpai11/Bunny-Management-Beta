<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
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
            color: white;
            background-image: url('lapin.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            min-height: 100vh;
            padding-bottom: 100px;
        }

        .container {
            padding-top: 100px;
            text-align: center;
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
    <div class="container" >
        <h1>Système de gestion de l'élevage des lapins</h1>
        <p>Notre système web vous permet de gérer efficacement votre élevage de lapins.</p>
        <div class="row">
            <div class="col-md-4">
                <h3>Gestion des données</h3>
                <p>Collectez et gérez facilement les informations relatives à vos lapins : poids, alimentation,
                    vaccinations, etc.</p>
            </div>
            <div class="col-md-4">
                <h3>Planification des tâches</h3>
                <p>Organisez et planifiez les différentes tâches liées à l'élevage des lapins, telles que
                    l'alimentation, le nettoyage des cages, etc.</p>
            </div>
            <div class="col-md-4">
                <h3>Analyse des performances</h3>
                <p>Obtenez des analyses détaillées sur les performances de votre élevage, y compris la croissance, la
                    reproduction, et plus encore.</p>
            </div>
        </div>
        <a class="btn" href="#">Se connecter</a>
    </div>

    <footer >
        <a href="#">Nous contacter</a>
        <a href="#">En savoir plus</a>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
</body>

</html>