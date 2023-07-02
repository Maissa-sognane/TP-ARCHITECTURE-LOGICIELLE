<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/controller/CategorieController.php');

$categorieObject = new Categories();
$categorie = $categorieObject->readCategorieById();

?>
<div>
    <a href="dashbord?dashbord=categorie">
        <button type="button" class="btn btn-outline-danger">Annuler</button>
    </a>
</div>
<div class="container">
    <?php flash('categorie');  ?>
    <h3>MODIFIER UNE CATÉGORIE</h3>
    <form class="row g-3" method="post" action="index.php">
        <div class="col-md-6">
            <label for="libelle" class="form-label">Catégorie</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="<?php echo $categorie; ?>">
            <input type="hidden" value="<?php echo $_GET['categorie_id'] ?>" name="id">
        </div>
        <div class="col-12">
            <input type="submit" name="update-categorie" class="btn btn-primary" value="Enrégistrer">
        </div>
    </form>
</div>