<div>
    <a href="dashbord?dashbord=compte">
        <button type="button" class="btn btn-outline-danger">Annuler</button>
    </a>
</div>
<div class="d-flex justify-content-center">
    <div>
        <h3>MODIFICATION DE MON PROFIL</h3>
    </div>
</div>
<form method="post" action="index.php">
    <?php flash('register');?>
    <input type="hidden" name="id" value=" <?php  echo $_SESSION['user_id']?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_SESSION['nom'] ?>">
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email'] ?>">
        </div>
    </div>
    <input type="submit" name="update-user" class="btn btn-primary mt-2" value="Sauvegarder">
</form>