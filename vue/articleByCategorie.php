<?php
include_once "./controller/Controller.php";
?>
<div class="container">
    <div class="posts">
        <?php foreach ($articles as $article){
            ?>
            <div class="post">
                <div class="post__image post__image--1"></div>
                <div class="post__content">
                    <a href="?id=<?php echo $article['id']; ?>">
                        <button class="btn--accent post__button" style="margin: 5px">Lire plus</button>
                    </a>
                    <i class="fa fa-chevron-right"></i>
                    <div class="post__inside">
                        <h3 class="post__title"> <?php echo $article['titre']; ?> </h3>
                        <p class="post__excerpt">
                            <?php echo $article['contenu']; ?>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
            if ($currentPage == 1){
                ?>
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précedent</a>
                </li>
                <?php
            }else{
                ?>
                <li class="page-item">
                    <a href="?categorie=<?=$variable_categorie?>&page=<?= $currentPage - 1 ?>" class="page-link">Précedent</a>
                </li>
                <?php
            }
            if($currentPage == $pages){
                ?><li class="page-item">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Suivant</a>
                </li>
                </li>
                <?php
            }else{
                ?>
                <li class="page-item">
                    <a href="?categorie=<?=$variable_categorie?>&page=<?= $currentPage + 1 ?>" class="page-link">Suivant</a>
                </li>
                <?php
            }
            ?>
        </ul>
    </nav>
</div>
