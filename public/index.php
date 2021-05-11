<?php

require "../vendor/autoload.php";

use Entity\User;
use Entity\Build;
use Entity\Champion;
use Entity\Item;

$item1 = new Item;

$data = [
    "build adc",
    "cesar",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/Ezreal.png",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerFlash.png",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerHeal.png",
    $item1->getImageById(3340),
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3006.png",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6671.png",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6676.png",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3031.png",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3026.png",
    "http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3035.png"
];

$build = new Build($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11]);

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
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <button class="btn btn-outline-success" type="submit">Login</button>
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

        <div class="shadow row mb-3 rounded-3" style="background-image: url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Ezreal_0.jpg'); background-position-y: 40%; background-size: 100%;">
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

        <div class="shadow row mb-3 rounded-3" style="background-image: url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Lucian_0.jpg'); background-position-y: 40%; background-size: 100%;">
            <div class="col-2">
                <div class="row">
                    <div class="col-8"><img class="img-fluid rounded" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/Lucian.png" alt="">
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-around">
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerFlash.png" alt="">
                        </div>
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerHeal.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 d-flex justify-content-around align-items-center bg-image">
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3340.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3006.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6671.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6676.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3031.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3026.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3035.png" alt="">
                </div>
            </div>
        </div>

        <div class="shadow row mb-3 rounded-3" style="background-image: url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Syndra_0.jpg'); background-position-y: 20%; background-size: 100%;">
            <div class=" col-2">
                <div class="row">
                    <div class="col-8"><img class="img-fluid rounded" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/Syndra.png" alt="">
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-around">
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerFlash.png" alt="">
                        </div>
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerDot.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 d-flex justify-content-around align-items-center bg-image">
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3340.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3020.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6655.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3089.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3135.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3157.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3109.png" alt="">
                </div>
            </div>
        </div>

        <div class="shadow row mb-3 rounded-3" style="background-image: url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Caitlyn_0.jpg'); background-position-y: 20%; background-size: 100%;">
            <div class="col-2">
                <div class="row">
                    <div class="col-8"><img class="img-fluid rounded" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/Caitlyn.png" alt="">
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-around">
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerFlash.png" alt="">
                        </div>
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerHeal.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 d-flex justify-content-around align-items-center bg-image">
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3340.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3006.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6671.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6676.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3031.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3026.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3035.png" alt="">
                </div>
            </div>
        </div>

        <div class="shadow row mb-3 rounded-3" style="background-image: url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Jinx_0.jpg'); background-position-y: 20%; background-size: 100%;">
            <div class="col-2">
                <div class="row">
                    <div class="col-8"><img class="img-fluid rounded" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/Jinx.png" alt="">
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-around">
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerFlash.png" alt="">
                        </div>
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerHeal.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 d-flex justify-content-around align-items-center bg-image">
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3340.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3006.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6671.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6676.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3031.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3026.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3035.png" alt="">
                </div>
            </div>
        </div>

        <div class="shadow row mb-3 rounded-3" style="background-image: url('http://ddragon.leagueoflegends.com/cdn/img/champion/splash/Draven_0.jpg'); background-position-y: 30%; background-size: 100%;">
            <div class="col-2">
                <div class="row">
                    <div class="col-8"><img class="img-fluid rounded" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/champion/Draven.png" alt="">
                    </div>
                    <div class="col-4 d-flex flex-column justify-content-around">
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerFlash.png" alt="">
                        </div>
                        <div class="row text-center"><img src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/spell/SummonerHeal.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 d-flex justify-content-around align-items-center bg-image">
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3340.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3006.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6671.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/6676.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3031.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3026.png" alt="">
                </div>
                <div class="col-1 d-flex justify-content-around align-items-center">
                    <img class="img-thumbnail" src="http://ddragon.leagueoflegends.com/cdn/11.9.1/img/item/3035.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>