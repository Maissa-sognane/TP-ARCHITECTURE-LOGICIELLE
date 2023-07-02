<div class="mx-auto" style="width: 500px;">
    <h3>Voulez-vous supprimer cette article?</h3>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo  $_GET['id_article_delete'] ?>">
        <input type="submit" class="btn btn-danger" value="Oui" name="delete-article">
        <a href="dashbord?dashbord=articles">
            <button type="button" class="btn btn-success">Non</button>
        </a>
    </form>
</div>