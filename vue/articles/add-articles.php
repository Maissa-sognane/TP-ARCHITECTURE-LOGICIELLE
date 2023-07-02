<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/controller/CategorieController.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/controller/ArticleController.php');
    $categoriesObject = new Categories();
    $categories = $categoriesObject->listCategorie();

    $article = new Articles();
$article->setChamp('is-invalid')
?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="dashbord?dashbord=articles">
                <button type="button" class="btn btn-outline-danger">Annuler</button>
            </a>
        </div>
    </div>
    <form class="row g-3 mt-2" method="post" action="index.php">
        <?php flash('article');?>
        <div class="col-12">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" placeholder="Donner une titre minimum 20 caracteres" name="titre">
        </div>
        <div class="col-12">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea class="form-control " id="contenu" placeholder="Ecrire le contenu minimum 100 caractères" name="contenu"></textarea>
        </div>
        <div class="col-12">
            <label for="categorie" class="form-label">Categorie</label>
            <select id="categorie" class="form-select" name="categorie">
                <option value="0" selected>Choisir une catégorie.</option>
                <?php foreach ($categories as $categorie) { ?>
                <option value="<?php echo $categorie['id'] ?>"><?php echo $categorie['libelle'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-3">
            <input type="submit" name="create-article" class="btn  px-5 mb-5 w-100" value="Sauvegarder"
                    style="background-color: #212529; color: white">
        </div>
    </form>
</div>