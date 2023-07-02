<?php
require_once "ConnexionManager.php";


function readById($id){
    $pdo = dbConnexion();
    $article = $pdo->prepare("SELECT * FROM `Article` WHERE `id`='$id'");
    $article->execute();
    return $article->fetch();
}


function numberArticles(){
    $pdo = dbConnexion();
    $number = $pdo->prepare("SELECT COUNT(*) AS number_article FROM `Article`");
    $number->execute();
    $nbArticle = $number->fetch();
    return (int)$nbArticle['number_article'];
}
function readArticlesByPage($premier, $parPage){
    $pdo = dbConnexion();
    $articles = $pdo->prepare("SELECT * FROM `Article` ORDER BY `dateCreation` DESC LIMIT :premier, :parpage");
    $articles->bindValue(':premier', $premier, PDO::PARAM_INT);
    $articles->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $articles->execute();
    return $articles->fetchAll(PDO::FETCH_ASSOC);
}

function readArcticleByCategoriePage($id, $premier, $parPage){
    $pdo = dbConnexion();
    $articles = $pdo->prepare("SELECT * FROM `Categorie`  INNER JOIN `Article` 
    ON Categorie.id = Article.categorie WHERE Categorie.id ='$id'ORDER BY `dateCreation` DESC LIMIT :premier, :parpage");
    $articles->bindValue(':premier', $premier, PDO::PARAM_INT);
    $articles->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $articles->execute();
    return $articles->fetchAll(PDO::FETCH_ASSOC);
}

function nombrePage(){
    $parPage = 10;
    $nbArticle = numberArticles();
    return ceil($nbArticle/$parPage);
}

function getArticles($currentPage){
    $parPage = 10;
    $premier = ($currentPage * $parPage) - $parPage;
    return readArticlesByPage($premier, $parPage);
}

function readArticleByCategorie($id, $currentPage){
    $parPage = 10;
    $premier = ($currentPage * $parPage) - $parPage;
    return readArcticleByCategoriePage($id,$premier,$parPage);
}


