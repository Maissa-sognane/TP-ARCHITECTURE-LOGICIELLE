<?php
require_once 'controller/Controller.php';
require_once 'controller/UsersController.php';
require_once 'controller/ArticleController.php';
require_once 'controller/CategorieController.php';
require_once 'config/url.php';

if(!empty($_SERVER)){
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if ((empty($_GET))){
            listAllArticles();
        }else{
            if (isset($_GET['categorie'])){
                $categorie = $_GET['categorie'];
                if(!(int)($categorie)){
                    if(($_GET['categorie'] == 'home')){
                        listAllArticles();
                    }else{
                        articleError();
                    }
                }
                else{
                    $id = $_GET['categorie'];
                    listArticleByCategorie($id);
                }
            }elseif(isset($_GET['id'])){
                $id = $_GET['id'];
                detailArticle($id);
            }
        }
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if((isset($_POST['connexion'])) && ($_POST['connexion'])){
            $userauthentification = new UtilisateurController();
            $userauthentification->login();
        }
        if((isset($_POST['create-article'])) && ($_POST['create-article'])){
            $article = new Articles();
            $article->createArticle();
        }

        if((isset($_POST['update-article'])) && ($_POST['update-article'])){
            $article = new Articles();
            $article->updateArticle();
        }
        if((isset($_POST['delete-article'])) && ($_POST['delete-article'])){
            $article = new Articles();
            $article->deleteArticle();
        }
        if((isset($_POST['create-categorie'])) && ($_POST['create-categorie'])){
            $categorie = new Categories();
            $categorie->createCategorie();
        }
        if((isset($_POST['update-categorie'])) && ($_POST['update-categorie'])){
            $categorie = new Categories();
            $categorie->updateCategorie();
        }
        if((isset($_POST['delete-categorie'])) && ($_POST['delete-categorie'])){
            $categorie = new Categories();
            $categorie->deleteCategorieById();
        }
        if (isset($_POST['logout']) && $_POST['logout']){
            $user = new UtilisateurController();
            $user->logout();
        }
        if(isset($_POST['creation-user']) && $_POST['creation-user']){
            $user = new UtilisateurController();
            $user->createUser();
        }
        if(isset($_POST['reset-password']) && $_POST['reset-password']){
            $user = new UtilisateurController();
            $user->resetPassword();
        }
        if(isset($_POST['update-user'])){
            $user = new UtilisateurController();
            $user->updateUser();
        }
        if(isset($_POST['change-superuser'])){
            $user = new UtilisateurController();
            $user->resetSuperUser();
        }
        if (isset($_POST['delete-user'])){
            $user = new UtilisateurController();
            $user->deleteUser();
        }
    }
}
