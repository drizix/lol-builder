<?php

use Entity\User;

$userInfo = new User();
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
            <a class="navbar-brand" href="#">LOL - Builder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><?php if (isset($_SESSION['userId'])) {
                                                                                    echo "Bienvenue " . $userInfo->getNicknameById($_SESSION['userId']);
                                                                                } ?> </a>
                    </li>
                </ul>
                <form class="d-flex" action="index.php" method="get">
                    <input class="form-control me-2" type="text" placeholder="Recherche" name="search">
                    <button class="btn btn-outline-secondary mx-1" type="submit">Recherche</button>
                </form>
                <form action="?action=login" method="POST">
                    <?php
                    if (isset($_SESSION['userId'])) {
                    ?>
                        <a href="?action=logout" class="btn btn-danger active" role="button" aria-pressed="true" id="logout-btn">Deconnexion</a>
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
                                <a class="nav-link" href="?action=register" role="button">Inscription</a>
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
        <div class="row mb-5">
            <button type=button class="btn btn-primary">Ajouter un nouveau build</button>
        </div>
        <?php foreach ($items as $build) { ?>
            <div class="card mb-5">
                <div class="shadow card-header">
                    <div class="row">
                        <div class="col-2">
                            <h2><?php echo $build->user->nickname ?></h2>
                        </div>
                        <div class="col-10">
                            <h3 class="text-center"><?php echo $build->name ?></h3>
                        </div>
                    </div>

                </div>
                <div class="shadow card-body" style="background-image: url('<?php echo $build->splash ?>'); background-position-y: 30%; background-size: 100%;">
                    <div class="row">
                        <div class="col-2">
                            <div class="row">
                                <div class="col-8"><img class="img-fluid rounded" src=<?php echo $build->champion ?> alt="">
                                </div>
                                <div class="col-4 d-flex flex-column justify-content-around">
                                    <div class="row text-center"><img src=<?php echo $build->summonerSpell1 ?> alt="">
                                    </div>
                                    <div class="row text-center"><img src=<?php echo $build->summonerSpell2 ?> alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-10 d-flex justify-content-around align-items-center bg-image">
                            <div class="col-1 d-flex justify-content-around align-items-center">
                                <img class="img-thumbnail" src=<?php echo $build->item1 ?> alt="">
                            </div>
                            <div class="col-1 d-flex justify-content-around align-items-center">
                                <img class="img-thumbnail" src=<?php echo $build->item2 ?> alt="">
                            </div>
                            <div class="col-1 d-flex justify-content-around align-items-center">
                                <img class="img-thumbnail" src=<?php echo $build->item3 ?> alt="">
                            </div>
                            <div class="col-1 d-flex justify-content-around align-items-center">
                                <img class="img-thumbnail" src=<?php echo $build->item4 ?> alt="">
                            </div>
                            <div class="col-1 d-flex justify-content-around align-items-center">
                                <img class="img-thumbnail" src=<?php echo $build->item5 ?> alt="">
                            </div>
                            <div class="col-1 d-flex justify-content-around align-items-center">
                                <img class="img-thumbnail" src=<?php echo $build->item6 ?> alt="">
                            </div>
                            <div class="col-1 d-flex justify-content-around align-items-center">
                                <img class="img-thumbnail" src=<?php echo $build->item7 ?> alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>