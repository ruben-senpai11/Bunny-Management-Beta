

<style>
    .container, .back-button{
        display: flex;
        justify-content: center;
        align-items: center;
        
    }
    h1{
        text-align: center;
        font-size: 2rem;
    }
    .back-button{
        width: 300px;
        margin: 0% auto;
        margin-top: 5%;
        gap: 5px;
        background-color: #333333;
        border-radius: 5px;
        color: white;
        text-decoration: none;
        height: 40px;
    }
    .back-button .icon{
        width: 20px;
        color: white;
    }
</style>


<section class="vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                <div>
                    <img class="img-fluid w-75" src="../../assets/img/illustrations/404.svg" alt="404 not found">
                    <h1 class="mt-5">Page non <span class="fw-bolder text-primary">trouvée</span></h1>
                    <p class="lead my-4">Oops! Il semble que vous ayez suivi un mauvais lien. S'il s'agit d'une erreur, veuillez nous contacter.</p>
                    <a href="/home" class="back-button">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Retourner à la page d'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
