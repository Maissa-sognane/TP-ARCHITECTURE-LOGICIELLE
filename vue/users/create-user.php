<div>
    <a href="dashbord?dashbord=compte">
        <button type="button" class="btn btn-outline-danger">Annuler</button>
    </a>
</div>
<div class="d-flex justify-content-center">
        <div>
            <h3>CREATION USER</h3>
        </div>
</div>
<form method="post" action="index.php">
    <?php flash('register'); ?>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
            </div>
            <div class="form-group col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group col-md-6">
                <label for="repeatpassword">Repeat Password</label>
                <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password">
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="superuser" value="1" id="superuser">
                <label class="custom-control-label" for="superuser">Super Utilisateur</label>
            </div>
        </div>
        <input type="submit" name="creation-user" class="btn btn-primary mt-2" value="Sauvegarder">
</form>

