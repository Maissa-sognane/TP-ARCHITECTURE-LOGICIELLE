<div class="mx-auto" style="width: 500px;">
    <h3>Voulez-vous supprimer cette catégorie?</h3>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo  $_GET['categorie_delete_id'] ?>">
        <input type="submit" class="btn btn-danger" value="Oui" name="delete-categorie">
        <a href="dashbord?dashbord=categorie">
            <button type="button" class="btn btn-success">Non</button>
        </a>
    </form>
</div>