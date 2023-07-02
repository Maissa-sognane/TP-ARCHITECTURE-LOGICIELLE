<?php
    require_once 'include/header.php';
?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap");
    .about-us {
        display: flex;
        align-items: center;
        height: 100vh;
        width: 100%;
        padding: 90px 0;
        background: #fff;
    }
    .pic {
        height: auto;
        width: 400px;
        border-radius: 12px;
    }
    .about {
        width: 1130px;
        max-width: 85%;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-around;
    }
    .text {
        width: 540px;
    }
    .text h2 {
        color: #333;
        font-size: 90px;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .text h5 {
        color: #333;
        font-size: 22px;
        font-weight: 500;
        margin-bottom: 20px;
    }
    span {
        color: #4070f4;
    }
    .text p {
        color: #333;
        font-size: 18px;
        line-height: 25px;
        letter-spacing: 1px;
    }
    .data {
        margin-top: 30px;
    }
    .hire {
        font-size: 18px;
        background: #4070f4;
        color: #fff;
        text-decoration: none;
        border: none;
        padding: 12px 25px;
        border-radius: 6px;
        transition: 0.5s;
    }
    .hire:hover {
        background: #000;
    }
</style>
<section class="about-us">
    <div class="about">
        <img src="./assets/images/eugene-chystiakov-vBZDqBPpVvI-unsplash.jpg" class="pic" />
        <div class="text">
            <h3><?php echo $article['titre'] ?></h3>
            <p><?php echo $article['contenu'] ?></p>
            <div class="data">
                <a href="?categorie=home" class="hire">Retour</a>
            </div>
        </div>
    </div>
</section>
