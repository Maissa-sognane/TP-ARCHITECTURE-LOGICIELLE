<?php
require_once 'include/header.php';
include_once "./controller/Controller.php";
?>
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
<div class="album py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($articles as $article){
                ?>
            <div class="col">
                <div class="card shadow-sm">
                    <!--
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2001/XInclude" role="img"
                         aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                    -->
                    <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                         src="./assets/images/eugene-chystiakov-vBZDqBPpVvI-unsplash.jpg" aria-label="Placeholder: Thumbnail"   />

                    <div class="card-body">
                        <h4 class="card-title text-truncate">
                            <?php echo $article['titre']; ?>
                        </h4>
                        <p class="card-text text-truncate">
                            <?php echo $article['contenu']; ?>
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="?id=<?php echo $article['id']; ?>">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Lire plus</button>
                                </a>
                            </div>
                            <small class="text-muted"> <?php echo $article['dateCreation']; ?></small>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

    </div>
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
<?php
require_once 'include/footer.php';
?>
