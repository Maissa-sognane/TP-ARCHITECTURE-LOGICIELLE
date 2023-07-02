<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
          integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
          crossorigin="anonymous" />
    <!--<link rel="stylesheet" href="./assets/css/style.css">-->

</head>
<style>
    .carousel-item {
        height: 90vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="articles">Xiibar PolyteK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?categorie=home">Home</a>
                </li>
                <li class="nav-item">
                    <?php
                    $categories = listCategorie();
                    foreach ($categories as $category){
                    ?>
                <li><a class="nav-link" href="?categorie=<?= $category['id'] ?>"><?= $category['libelle'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<header>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('https://source.unsplash.com/LAaSoL0LrYs/1920x1080')">
                <div class="carousel-caption">
                    <h5>L'importance de l'information dans le monde moderne : les clés pour rester informé et éclairé</h5>
                    <p>
                        Dans le monde moderne, l'information joue un rôle essentiel dans notre quotidien. Que ce soit pour prendre des
                        décisions personnelles, rester au courant des événements mondiaux ou approfondir nos connaissances, l'accès à une
                        information fiable et pertinente est primordial. Cependant, avec la prolifération des médias, des réseaux sociaux et
                        des sources d'information en ligne, il devient de plus en plus difficile de
                        distinguer les faits des opinions et de naviguer dans l'océan d'informations disponibles.
                    </p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://source.unsplash.com/bF2vsubyHcQ/1920x1080')">
                <div class="carousel-caption">
                    <h5>Les dangers de la désinformation : comment repérer et combattre les fausses informations</h5>
                    <p>
                        Avec la montée en puissance des médias sociaux et la facilité d'accès à l'information en ligne,
                        la propagation de fausses informations est devenue un problème majeur dans notre société.
                        La désinformation peut avoir des conséquences graves, en influençant
                        les opinions publiques, en semant la confusion et en compromettant la prise de décision éclairée.
                    </p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://source.unsplash.com/szFUQoyvrxM/1920x1080')">
                <div class="carousel-caption">
                    <h5>L'impact des nouvelles technologies sur la confidentialité des informations personnelles</h5>
                    <p>À l'ère numérique, nos informations personnelles sont de plus en plus exposées et vulnérables.
                        Les nouvelles technologies ont apporté de nombreux avantages, mais elles ont également soulevé des
                        préoccupations croissantes en matière de confidentialité des données. Il est essentiel de comprendre l'impact
                        de ces technologies sur notre vie privée et de prendre des mesures pour
                        protéger nos informations personnelles.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</header>
<body class="bg-light">
<div class="container">
