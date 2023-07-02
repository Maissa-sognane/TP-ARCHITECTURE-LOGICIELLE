<?php
session_start();
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/controller/ArticleController.php');
require_once '../include/home-user/slider.php';
?>
    <div class="col-9">
        <div class="container">
            <?php
                if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']){
                    if (isset($_GET)){
                        if(isset($_GET['dashbord']) && ($_GET['dashbord'] === 'articles')){
                            include_once '../../vue/articles/read-article.php';
                        }
                        if(isset($_GET['article']) && ($_GET['article'] === 'add')){
                            include_once '../../vue/articles/add-articles.php';
                        }if(isset($_GET['id_article'])){
                            include_once '../../vue/articles/update-article.php';
                        }
                        if(isset($_GET['id_article_delete'])){
                            include_once '../../vue/articles/delete-article.php';
                        }
                        if (isset($_GET['dashbord']) && ($_GET['dashbord'] === 'categorie')){
                            include_once '../../vue/categorie/read-categorie.php';
                        } if(isset($_GET['categorie']) && ($_GET['categorie'] === 'add')){
                            include_once '../../vue/categorie/add-categorie.php';
                        }
                        if(isset($_GET['categorie_id'])){
                            include_once '../../vue/categorie/update-categorie.php';
                        }
                        if(isset($_GET['categorie_delete_id'])){
                            include_once '../../vue/categorie/delete-categorie.php';
                        }
                        if(isset($_GET['dashbord']) && $_GET['dashbord'] === 'compte'){
                            include_once '../../vue/users/read-user.php';
                        }
                        if(isset($_GET['user']) && $_GET['user'] === 'add'){
                            include_once '../../vue/users/create-user.php';
                        }
                        if(isset($_GET['user_id'])){
                            include_once '../../vue/users/reset-password.php';
                        }
                        if(isset($_GET['user']) && $_GET['user'] === 'parametre'){
                            include_once '../../vue/users/setting-user.php';
                        }if (isset($_GET['user_delete_id'])){
                            include_once '../../vue/users/delete-user.php';
                        }
                    }
                }
                else{
                    redirect('login');
                }
            ?>
        </div>
    </div>
<?php
    require_once '../include/home-user/footer.php';
?>