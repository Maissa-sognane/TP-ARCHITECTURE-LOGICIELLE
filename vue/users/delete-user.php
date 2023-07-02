<div class="mx-auto" style="width: 500px;">
<h3>Voulez-vous supprimer cette utilisateur?</h3>
<form action="index.php" method="post">
    <input type="hidden" name="id" value="<?php echo  $_GET['user_delete_id'] ?>">
    <input type="submit" class="btn btn-danger" value="Oui" name="delete-user">
    <a href="dashbord?dashbord=compte">
        <button type="button" class="btn btn-success">Non</button>
    </a>
</form>
</div>