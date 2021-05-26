<?php

use Entity\Champion;
use Entity\Item;
use Entity\Summoner;
use Entity\User;

$userInfo = new User();
$championInfo = new Champion();
$itemInfo = new Item();
$summonerInfo = new Summoner();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="css/style.css">

    <title>LOL-Builder</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">LOL - Builder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link active" aria-current="page"><?php if (isset($_SESSION['userId'])) {
                                                                                echo "Bienvenue " . $userInfo->getNicknameById($_SESSION['userId']);
                                                                            } ?> </div>
                    </li>
                </ul>
                <form class="d-flex" action="/" method="get">
                    <input class="form-control me-2" type="text" placeholder="Recherche" name="search">
                    <button class="btn btn-outline-secondary mx-1" type="submit">Recherche</button>
                </form>
                <form action="login" method="POST">
                    <?php
                    if (isset($_SESSION['userId'])) {
                    ?>
                        <a href="logout" class="btn btn-danger active" role="button" aria-pressed="true" id="logout-btn">Deconnexion</a>
                    <?php
                    } else {
                    ?>

                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <input class="form-control me-2" type="text" placeholder="nom" name="username">
                            </li>
                            <li class="nav-item">
                                <input class="form-control me-2" type="text" placeholder="mot de passe" name="password">
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-outline-success " type="submit">Connexion</button>
                                <?php
                                if (isset($errorMsg)) {
                                    echo "<script>alert(\"$errorMsg\")</script>";
                                }
                                ?>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register" role="button">Inscription</a>
                            </li>
                        </ul>
                    <?php
                    }
                    ?>
                </form>

            </div>
        </div>
    </nav>
    <header>
        <div class="container-fluid bg-image d-flex justify-content-center align-items-center" style="background-image: url('images/bg-lol.jpg');
            height: 1080px; background-repeat: no-repeat; background-position: center;">
        </div>
    </header>
    <main class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-4 justify-content-center">
                <div class="row justify-content-center">
                    <form action="new" method="POST">
                        <input type="text" class="form-control" placeholder="Votre nom de build" name="nameBuild">
                        <?php
                        echo $championInfo->createMenuChampion();
                        for ($i = 1; $i < 3; $i++) {
                            echo $summonerInfo->createMenuSummoner($i);
                        }
                        for ($i = 1; $i < 8; $i++) {
                            echo $itemInfo->createMenuItem($i);
                        }
                        ?>
                        <button type="submit" class="btn btn-primary my-2">Ajouter mon build</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>