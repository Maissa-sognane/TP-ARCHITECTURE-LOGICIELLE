<?php

?>
<div>
    <a href="dashbord?dashbord=categorie">
        <button type="button" class="btn btn-outline-danger">Annuler</button>
    </a>
</div>
<div class="container">
    <?php flash('categorie');  ?>
    <h3>AJOUTER UNE CATÉGORIE</h3>
    <form class="row g-3" method="post" action="index.php">
        <div class="col-md-6">
            <label for="libelle" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Donner le libelle de la catégorie">
        </div>
        <div class="col-12">

            <input type="submit" name="create-categorie" class="btn btn-primary" value="Enrégistrer">
        </div>
    </form>
</div>
