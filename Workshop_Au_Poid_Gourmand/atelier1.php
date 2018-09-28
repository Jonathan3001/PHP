<?php

echo '<pre>';
var_dump($_GET);
echo '</pre>';

$choisir = '';

    // if (isset($_GET['clique']) && $_GET['clique'] == 'choisir'){
    //     echo $choisir = '?clique=choisir'; 
    // } else {
    //     echo 'atelier1.php';
    // }

    if (empty($_GET['clique']) && $_GET['clique'] == 'choisir'){
        echo $_GET;
    } else (!empty($_GET['clique']) && $_GET['clique'] == 'choisir'){
        
    }

    // condition : if $_GET is empty : afficher "accueil"(<div class="container">), sinon, afficher "le code html correspondant".

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Au Pois Gourmand</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Srisakdi" rel="stylesheet">
    <link href="lib/css/atelier1.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>
<body>

    
    <!-- Contenu -->
    <div class="container">
        <header>
            <i class="fas fa-kiwi-bird"></i>
            <h1 class="font-weight-bold">Au Pois Gourmand</h1>
        </header>

        <div class="row">
            <!-- Formule Rome -->
        
            <div class="card col-md-3 offset-md-2" style="width: 18rem;">
                <img class="card-img-top" src="lib/img/rome.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Formule Rome</h5>
                        <p class="card-text">Tomates buratina<br>Rizotto aux asperges<br>Panna cotta</p>
                    <a href="?clique=choisir" class="btn btn-info w-100">Choisir</a>
                </div>
            </div>
    
            <!-- Formule New-York -->
    
            <div class="card col-md-3 offset-md-2" style="width: 18rem;">
                <img class="card-img-top" src="lib/img/nyork.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Formule New-York</h5>
                        <p class="card-text">César salade<br>Cheese burger<br>Cheesecake</p>
                    <a href="?clique=choisir" class="btn btn-danger w-100">Choisir</a>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Formule Delhi -->

            <div class="card col-3 offset-2" style="width: 18rem;">
                <img class="card-img-top" src="lib/img/delhi.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Formule Delhi</h5>
                        <p class="card-text">Poppadoms<br>Agneau byriani<br>Lassi mangue</p>
                    <a href="?clique=choisirRome" class="btn btn-warning w-100">Choisir</a>
                </div>
            </div>
    
            <!-- Formule Hanoï -->
    
            <div class="card col-3 offset-2" style="width: 18rem;">
                <img class="card-img-top" src="lib/img/hanoi.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">Formule Hanoï</h5>
                        <p class="card-text">Nems aux crevettes<br>Poulet saté<br>Perles de coco</p>
                    <a href="?clique=choisir" class="btn btn-primary w-100">Choisir</a>
                </div>
            </div>            
        </div>

        <!-- Page Menu Rome -->
        
        <div class="row">
            <div class="card col-9 offset-2">
                <div class="card-header font-weight-bold">
                    Merci pour votre commande !
                </div>
                <div class="card-body">
                <img class="card-img-left col-3 offset-1" src="lib/img/rome.jpg" alt="Card image cap">

                <div class="row col-7 offset-1">
                    <h5 class="card-title">Votre formule Rome arrive dans quelques instants... <i class="fas fa-kiwi-bird"></i></h5>
                    <p class="card-text">Nous vous souhaitons une bonne dégustation.<br>Un café gourmand vous est proposé pour terminer votre pause gourmande en douceur.</p>
                    <p>Votre facture sera de 25€</p>
                    <a href="#" class="btn btn-success w-75">Choisir un autre menu</a>
                </div>
                </div>
            </div>
        </div>
            
        <!-- Page Menu New-York -->

        <div class="row">

        </div>

        <!-- Footer -->

        <div class="row">
            <footer class="col-4 offset-8">
                <i class="fas fa-kiwi-bird"></i>
                    <p>.....</p>
                <i class="fas fa-kiwi-bird"></i>
                    <p>....</p>
                <i class="fas fa-kiwi-bird"></i>
                    <p>...</p>
                <i class="fas fa-kiwi-bird"></i>
                    <p>..</p>
                <i class="fas fa-kiwi-bird"></i>
                    <p>.</p>
                <h5 class="font-weight-bold">Au Pois Gourmand</h5>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>