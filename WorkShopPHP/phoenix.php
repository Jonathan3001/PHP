<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Phoenix</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <style>
        .carousel-item{
            max-height: 80vh;
        }

        .nav{
            margin-left: 30vh;
        }

        .text-center{
            padding: 3vh;
        }
    </style>
</head>

<body>

<!-- _-_-_-_-_-_-_-_- PAGE D'ACCUEIL -_-_-_-_-_-_-_-_ -->

<div class="container-fluid">

    <!--  NAV  -->

    <nav class="nav bg-muted fixed-top p-5">
        <div class="container">
            <i class="fab fa-phoenix-framework fa-2x ml-5" href="http://localhost/PHP/WorkShopPHP/phoenix.php"></i>
            <a class="nav-link active text-dark" href="#">Phoenix</a>
            <a class="nav-link text-dark" href="#">Choisir une destination</a>
            <a class="nav-link disabled text-dark" href="#">Payer</a>
        </div>
    </nav>

    <!-- CAROUSSEL -->

    <div id="carouselExampleControls" class="h-25 d-inline-block" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img class="d-block w-100" src="img/caraibes1.jpg" alt="caraibes1">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img/turkoise.jpg" alt="turkoise">
            </div>
            <div class="carousel-item">
            <img class="d-block w-100" src="img/maurice.jpg" alt="maurice">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <button type="button" class="btn btn-outline-info btn-lg btn-block mt-4">Choisir mon séjour tout de suite !</button>

</div> <!-- Fin .container-fluid -->

    <!-- Footer -->

    <div class="btn-lg mt-5">
        <div class="bg-info text-center text-black-50">
            <i class="fas fa-umbrella-beach ml-4">Vos Vacances de rêves...</i>
            <i class="fas fa-sun ml-4">Plage...</i>
            <i class="fas fa-city ml-4">Urbaine...</i>
            <i class="fas fa-ship ml-4">Croisière...</i>
            <i class="fas fa-image ml-4">Montagne...</i>
            <i class="fas fa-euro-sign ml-4">A prix tout doux</i>
            <i class="fas fa-umbrella-beach ml-4"></i>
        </div>
    </div>

<!-- _-_-_-_-_-_-_-_- PAGE CHOIX SEJOUR -_-_-_-_-_-_-_-_ -->

<div class="container">

    <!--  NAV  -->

    <!-- <nav class="nav bg-info fixed-top p-5">
        <i class="fab fa-phoenix-framework fa-2x ml-5" href="http://localhost/PHP/WorkShopPHP/phoenix.php"></i>
        <a class="nav-link active text-dark" href="#">Phoenix</a>
        <a class="nav-link text-dark" href="#">Choisir une destination</a>
        <a class="nav-link disabled text-dark" href="#">Payer</a>
    </nav> -->

    <section>
        <div class="row">
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="boucaniers">
                <div class="card-body">
                    <h5 class="card-title">Les Boucaniers</h5>
                    <p class="card-text">Après les eaux calmes, partez à la découverte des cascades de la Falaise, à Trinité.</p>
                    <a href="#" class="btn btn-outline-info">Réserver maintenant !</a>
                </div>
            </div>
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/sicile_kamarina.jpg" alt="kamarina">
                <div class="card-body">
                    <h5 class="card-title">Kamarina</h5>
                    <p class="card-text">Bienvenue au pays de l'Etna où ruelles escarpées et places en fleurs s'ouvrent sur la Méditerranées !</p>
                    <a href="#" class="btn btn-outline-info">Réserver maintenant !</a>
                </div>
            </div>
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/maldives_fino.jpg" alt="finohlu">
                <div class="card-body">
                    <h5 class="card-title">Finohlu</h5>
                    <p class="card-text">Instants inoubliables sur une île privative où luxe et charme naturel des Maldives s'équilibrent à merveille.</p>
                    <a href="#" class="btn btn-outline-info">Réserver maintenant !</a>
                </div>
            </div>       
        </div> <!-- Fin .row -->

        <div class="row">
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/maurice_albion.jpg" alt="albion">
                <div class="card-body">
                    <h5 class="card-title">Albion sauvage</h5>
                    <p class="card-text">Au coeur de l'île, un swing au golf, l'adrénaline du trapèze volant ou la beauté des fonds marins... que choisir?</p>
                    <a href="#" class="btn btn-outline-info">Réserver maintenant !</a>
                </div>
            </div>
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/maldives_kani.jpg" alt="kani">
                <div class="card-body">
                    <h5 class="card-title">Kani</h5>
                    <p class="card-text">Ile-jardin posées sur des eaux turquoises, découvrez le paradis au coeur de l'archipel des Maldives.</p>
                    <a href="#" class="btn btn-outline-info">Réserver maintenant !</a>
                </div>
            </div>
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/grece_gregolimano.jpg" alt="gregolimano">
                <div class="card-body">
                    <h5 class="card-title">Gregolimano</h5>
                    <p class="card-text">L'île d'Eubée est une oasis entre mer et oliviers... plongez dans les eaux azures de la mer Egée... en ski nautique</p>
                    <a href="#" class="btn btn-outline-info">Réserver maintenant !</a>
                </div>
            </div>        
        </div> <!-- Fin .row -->   
    </section>
</div> <!-- Fin .container -->

<!-- _-_-_-_-_-_-_-_- PAGE RESERVATION BOUCANIER -_-_-_-_-_-_-_-_ -->

<!-- <div class="container mt-4">
    <section> -->
        <!-- <div class="row col-md-4">
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Les Boucaniers</p>
                    <li class="list-group-item bg-info w-100">1 semaine / personne : 750 €</li>
                </div>
            </div> -->
            <!-- <form action="">
                <div class="card">
                    <div class="card-header bg-info">
                        Je complète mes informations
                        <i class="fab fa-phoenix-framework fa-2x ml-5" href=""></i>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email de confirmation"> 
                    </div> --> <!-- Fin .row -->
                    <!-- <div class="row col-md-8">
                        </div>
                            <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Je pars combien de semaines ?">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nombre de vacanciers">
                    </div> --> <!-- Fin .row -->
                    <!-- </div>
                        <button type="submit" class="btn btn-info">Confirmer ma réservation</button>
                    </div>
                </div> --> <!-- Fin .card            
            </form>
        </div> --> <!-- Fin .row col-md-4
        <div class="row">
        </div>
    </section>
</div> --> <!-- Fin .container -->

<div class="container mt-4">
    <div class="row">
        <div class="row col-md-4">
            <div class="card border border-info" style="width: 18rem;">
                <img class="card-img-top" src="img/caraibes_martinique_boucaniers.jpg" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Les Boucaniers</p>
                    <li class="list-group-item bg-info w-100">1 semaine / personne : 750 €</li>
                </div>
            </div>
        </div> <!-- Fin .row col-md-4 --> 

        <div class="card col-md-8 border border-info p-0">
            <form action="">
                <div class="card-header bg-info">
                        Je complète mes informations
                        <i class="fab fa-phoenix-framework fa-2x ml-5" href=""></i>
                </div>
                <div class="row">
                    <div class="card-body">
                        <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email de confirmation">
                </div> <!-- Fin .row -->

                <div class="col-md-6">
                    <div class="form-row">
                        <div class="col">
                        <input type="text" class="form-control" placeholder="Je pars combien de semaines ?">
                        </div>
                        <div class="col">
                        <input type="text" class="form-control" placeholder="Nombre de vacanciers">
                        </div>
                    </div> <!-- Fin form-row -->
                </div> <!-- Fin col-md-8 -->
                </div> <!-- Fin .card-header -->
                    <button type="submit" class="btn btn-info w-75 col-8 offset-2">Confirmer ma réservation</button>
            </form>
        </div> <!-- Fin .card col-md-8 -->   
    </div> <!-- Fin .row -->
</div> <!-- Fin .container mt-4 -->

<!-- <form>
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Je pars combien de semaines ?">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Nombre de vacanciers">
    </div>
  </div>
</form> -->


</body>
</html>