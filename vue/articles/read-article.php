<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/controller/ArticleController.php');
$articles = new Articles();
$tab_articles = $articles->listArticles();
?>
<?php alertSuccess('update-article');?>
<?php alertSuccess('article');?>
    <a href="?article=add">
        <button type="button" class="btn btn-outline-primary">
            Ajouter article
        </button>
    </a>
<div style="height: 550px;overflow: scroll;">
    <div class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($tab_articles as $article){
                    ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                 src="./assets/images/eugene-chystiakov-vBZDqBPpVvI-unsplash.jpg"
                                 aria-label="Placeholder: Thumbnail"   />
                            <div class="card-body">
                                <h4 class="card-title text-truncate">
                                    <?php echo $article['titre']; ?>
                                </h4>
                                <p class="card-text text-truncate">
                                    <?php echo $article['contenu']; ?>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="?id_article=<?php echo $article['id']; ?>">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">Modifier</button>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="?id_article_delete=<?php echo $article['id']; ?>">
                                            <button type="button" class="btn btn-sm btn-outline-danger">Supprimer</button>
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
</div>

