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
            <a class="navbar-brand" href="action?=display">LOL - Builder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="action?=display">Accueil</a>
                    </li>
                </ul>
                <form class="d-flex" action="index.php" method="get">
                    <input class="form-control me-2" type="text" placeholder="Recherche" name="search">
                    <button class="btn btn-outline-secondary mx-1" type="submit">Recherche</button>
                </form>
                <form action="index.php" method="POST">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <input class="form-control me-2" type="text" placeholder="nom" name="username">
                        </li>
                        <li class="nav-item">
                            <input class="form-control me-2" type="text" placeholder="mot de passe" name="password">
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-success " type="submit" href="login">Connexion</button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register" role="button">Inscription</a>
                        </li>
                    </ul>
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
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="text-center">Bienvenue invocateur !</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <form class="form-signin" method="POST" action="register">
                        <h2 class="form-signin-heading text-center">Inscription</h2>
                        <?php
                        if (isset($errorMsg)) {
                            echo "<div class='alert alert-warning' role='alert'>$errorMsg</div>";
                        }
                        ?>
                        <input type="text" class="form-control" name="username" placeholder="Nom (4 characters)" required="" autofocus="" />
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe (8 characters)" required="" />
                        <input type="password" class="form-control" name="passwordRetype" placeholder="Confirmation Mot de passe" required="" />
                        <button class="btn btn-lg btn-primary btn-block my-2" type="submit">Inscription</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>