<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous" />
    -->
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body style="background-color: whitesmoke; margin: 0; padding: 0">
<div class="row" style="width: 100%; height: 100%">
    <div class="col-3">
        <main>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
                <a href="?dashbord=home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                    <span class="fs-4">WEBSITE</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li>
                        <a href="?dashbord=articles" class="nav-link text-white active">
                            Gestion des Articles
                        </a>
                    </li>
                    <li>
                        <a href="?dashbord=categorie" class="nav-link text-white">
                            Gestion des catégories
                        </a>
                    </li>
                    <li>
                        <a href="?dashbord=compte" class="nav-link text-white">
                            Gestion des comptes
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong><?php if (isset($_SESSION) && $_SESSION){echo $_SESSION['prenom']." ".$_SESSION['nom'];} ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                       <!-- <li><a class="dropdown-item" href="#">Nouvelle ligne</a></li>-->
                        <li><a class="dropdown-item" href="?user=parametre">Paramétre</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="index.php" method="post">
                                <input class="dropdown-item" type="submit" name="logout" value="Déconnexion">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>






