<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <title>Ma ferme en ligne</title>
    <style>
        :root {
            --foreground-rgb: 0, 0, 0;
            --background-start-rgb: 214, 219, 220;
            --background-end-rgb: 221, 255, 207, 1;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'open sans', sans-serif;
        }

        .page {
            width: 100%;
            height: 100%;
            max-height: 100%;
            display: flex;
        }

        .left-side {
            padding: 2% 0px 70px 25px;
            width: 60%;
            height: 100%;
            color: #333;
            display: grid;

            background: linear-gradient(to top, transparent, rgb(var(--background-end-rgb))) rgb(var(--background-start-rgb));
        }

        .header {
            display: flex;
            color: #FE7600;
        }

        .header img {
            margin: 0 10px;
            margin-top: 2px;
        }

        #wave-text {
            width: 95%;
            font-size: 30px;
            line-height: normal;
        }

        .background {
            width: 45%;
            display: grid;
            background: url('{{ asset("assets/img/rabbit01.jpg") }}') no-repeat;
            background-size: cover;
        }

        .right-side {
            padding: 20px;
            backdrop-filter: blur(10px);
            background-attachment: #FFFFFF;
            display: grid;
            align-content: space-between;
            justify-items: center;
            position: relative;
        }

        .login-buttons {
            padding-top: 2%;
            height: 100%;
            position: absolute;
            display: grid;
            align-items: center;
        }

        .login-text {
            padding-top: 1%;
            font-weight: bold;
            text-align: center;
            color: #333;
        }

        .buttons {
            padding-top: 2%;
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
        }

        .buttons .button {
            padding: 7% 25%;
            margin: 2% 7%;
            font-size: 15px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background-color: #0001ff;
            border: white;
            border-radius: 0.4rem;
        }

        .buttons button:hover {
            background-color: #3C46FF;
        }

        .footer {
            color: #ddd;
            text-align: center;
        }

        .logo {
            font-size: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .info {
            display: inline-block;
            font-size: 15px;
        }

        .info a {
            text-decoration: inherit;
            color: inherit;
        }

        @media screen and (max-width:900px) {
            .page {
                flex-direction: column;

                color: rgb(var(--foreground-rgb));
                background: linear-gradient(to top,
                        transparent,
                        rgb(var(--background-end-rgb))) rgb(var(--background-start-rgb));
            }

            .left-side,
            .right-side {
                width: 100%;
                height: 100%;
            }

            .landing-text {
                margin-top: 15px;
            }

            .left-side {
                padding: 5%;
                padding-top: 34;
                background: none;
                max-height: 50%;
                overflow: hidden;
            }

            .header {
                justify-content: space-between;
            }

            .header img,
            .login-text {
                display: none;
            }

            .right-side {
                gap: 0;
                padding: 35px 0;
            }

            .background {
                background: none;
            }

            .login-buttons {
                position: relative;
                width: 100%;
            }

            .buttons {
                flex-direction: column;
                padding: 0;
                margin: auto;
                gap: 20px
            }

            .buttons .button {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0;
                margin: auto;
                width: 80%;
                height: 50px;
                font-size: 17px;
            }

            #wave-text {
                font-size: 18px;
                line-height: normal;
            }

            .logo {
                font-size: 16px;
            }

            .info {
                font-size: 11px;
            }

            .background {
                width: 100%;
            }

            .footer {
                position: absolute;
                bottom: -30%;
                color: #777;
            }
        }
    </style>
</head>

<body>

    <div class="page">
        <div class="left-side">
            <div class="header">
                <h3 class="fw-bold">Ma ferme en ligne</h3>
                <img type="image/png" width="26px" height="26px" src="{{ asset('assets/img/favicon/rabbit.svg') }}">
            </div>
            <div class="landing-text">
                <span id="wave-text"></span>
            </div>
        </div>
        <div class="background">
            <div class="right-side">
                <div class="empty"></div>
                <div class="login-buttons">
                    <div>
                        <h2 class="login-text">Commencer</h2>
                        <div class="buttons">
                            <a class="button" href="{{ route('login') }}"> {{ __('Connexion') }}</a>
                            <a class="button" href="{{ route('register') }}">{{ __('Inscription')}}</a>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="logo">
                        <span>
                            <!-- <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M381-132q-53 0-91-36.5T252-256q0-27 12.5-50.5T302-350q22-18 37.5-38t32.5-38q-43-66-65-136.5T285-703q0-40 8-58.5t25-18.5q26 0 59.5 37.5T437-647q19 42 29.5 88t13.5 91q3-45 14-91t29-88q25-58 59-95.5t60-37.5q17 0 25 18.5t8 58.5q0 70-22 140.5T588-426q17 18 32.5 38t37.5 38q25 20 37.5 43.5T708-256q0 51-38 87.5T579-132q-35 0-67-13l-32-13-32 13q-32 13-67 13Zm4-28q20 0 43-6t43-17q-9-5-16.5-14.5T447-214q0-8 9.5-12.5T480-231q13 0 22 5t9 12q0 7-7.5 16.5T487-183q20 11 43 17t43 6q44 0 74.5-28t30.5-68q0-22-11.5-40T631-334q-12-10-18-17t-13-16q-36-48-58-60.5T479-440q-41 0-63 12.5T358-367q-7 9-13 16t-18 17q-24 20-35.5 38T280-256q0 40 30.5 68t74.5 28Zm35-130q-8 0-14-9t-6-21q0-12 6-21t14-9q8 0 14 9t6 21q0 12-6 21t-14 9Zm120 0q-8 0-14-9t-6-21q0-12 6-21t14-9q8 0 14 9t6 21q0 12-6 21t-14 9ZM393-446q13-10 27.5-15t31.5-6q-2-42-12.5-85.5T411-637q-20-46-45-76t-48-38q-2 8-3.5 19t-1.5 26q0 63 21 131t59 129Zm174 0q38-61 59-129t21-131q0-15-1.5-26t-3.5-19q-23 8-48 38t-45 76q-18 41-28.5 84.5T508-467q17 1 31.5 6t27.5 15Z"/></svg> -->
                        </span>
                        Bunny Management
                    </div>
                    <div class="info">
                        <span><a href="#">Conditions d'utilisation</a></span>
                        <span> | </span>
                        <span><a href="#">Politique de Confidentialité</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>

    <script>
        if (window.innerWidth < 800) {

            var typed = new Typed('#wave-text', {
                strings: [
                    '<h1 class="fw-bold">Bienvenue</h1> sur votre ferme en ligne ',
                    '<h1 class="fw-bold">Gérez</h1> efficacement votre élevage de lapins ',
                    '<h1 class="fw-bold">Collectez</h1> facilement les informations relatives au poids, à l\'alimentation, la santé etc ',
                    '<h1 class="fw-bold">Organisez</h1> et planifiez vos tâches : nourir les lapins, nettoyer les cages, vacciner etc ',
                    '<h1 class="fw-bold">Obtenez</h1> des analyses détaillées sur les performances de votre élevage : le taux de mortalité, le rendement '
                ],
                typeSpeed: 20,
                backSpeed: 10,
                backDelay: 2000,
                startDelay: 0,
                cursorChar: ' <img type="image/png" width="20px" height="16px" style="" src="{{ asset("assets/img/favicon/rabbit1.svg") }}">',
                
                // cursorChar: '<span style="font-size: 2rem; font-weight:bold"> _</span>',
                smartBackspace: true,
                loop: true
            });

        } else {
            var typed = new Typed('#wave-text', {
                strings: [
                    '<h1 class="fw-bold">Bienvenue</h1> sur votre ferme en ligne ',
                    '<h1 class="fw-bold">Gérez</h1> efficacement votre élevage de lapins ',
                    '<h1 class="fw-bold">Collectez</h1> facilement les informations relatives au poids, à l\'alimentation, la santé etc ',
                    '<h1 class="fw-bold">Organisez</h1> et planifiez vos tâches : nourir les lapins, nettoyer les cages, vacciner etc ',
                    '<h1 class="fw-bold">Obtenez</h1> des analyses détaillées sur les performances de votre élevage : le taux de mortalité, le rendement '
                ],
                typeSpeed: 20,
                backSpeed: 10,
                backDelay: 2000,
                startDelay: 0,
               // cursorChar: ' <img type="image/png" width="20px" height="16px" style="" src="{{ asset("assets/img/favicon/rabbit1.svg") }}">',
                cursorChar: '<span style="font-size: 2.5rem; font-weight:bold"> _</span>',
                smartBackspace: true,
                loop: true
            });

        }
    </script>
</body>

</html>