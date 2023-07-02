<?php
require_once 'modele/dao/CategorieDao.php';
require_once "modele/dao/ArticleDao.php";
require_once "config/pagination.php";
function listAllArticles()
{
    $variable_categorie = 'home';
    $pages = nombrePage();
    $currentPage = paginationPage();
    $articles = getArticles($currentPage);
    require 'vue/home.php';
}

function listCategorie()
{
    return getAllCategories();
}

function listArticleByCategorie($id)
{
    $pages = nombrePage();
    $currentPage = paginationPage();
    $articles = readArticleByCategorie($id, $currentPage);
    require 'vue/home.php';
}

function detailArticle($id)
{
    $article = readById($id);
    require 'vue/article.php';
}

function articleError()
{
    require 'vue/error.php';
}


