<?php
require_once '../../controller/UsersController.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Connexion</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">Connexion</h2>
            <div class="text-center mb-5 text-dark">Xiibar PolytecK</div>
            <div class="card my-5">

                <form class="card-body cardbody-color p-lg-5" action="index.php" method="post">
                    <?php flash('login') ?>
                    <div class="text-center">
                        <img src="https://media.istockphoto.com/id/1368872054/vector/online-news-search-and-reading-news-updates-news-websites-information-on-newspapers-public.jpg?s=1024x1024&w=is&k=20&c=AGKGlAYstwOyPvu29qI1Ji3ULSudJD76QiC8hgv2CtA="
                             class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                             width="200px" alt="profile">
                    </div>
                    <div class="mb-3">
                        <label for="email"></label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                                                             placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="password">
                        </label><input type="password" class="form-control" id="email"  name="password" placeholder="password">
                    </div>
                    <div class="text-center">
                        <input type="submit" name="connexion" class="btn btn-color px-5 mb-5 w-100" value="Connexion">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
</body>
</html>