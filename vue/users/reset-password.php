<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/controller/UsersController.php');

    $id = $_GET['user_id'];
    $userObject = new Users();
    $user = $userObject->findUserById($id);

?>
<div>
    <a href="dashbord?dashbord=compte">
        <button type="button" class="btn btn-outline-danger">Annuler</button>
    </a>
</div>
<h2>RESET PASSWORD</h2>
<?php  flash('register'); ?>
<form action="index.php" method="post">
    <input type="hidden" name="id" value="<?php echo $_GET['user_id']; ?>">
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">New Password</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
        </div>
    </div>
    <div class="form-group row">
        <label for="repeatpassword" class="col-sm-2 col-form-label">Repeat Password</label>
        <div class="col-sm-6">
            <input type="password" class="form-control" id="repeatpassword" name="repeatpassword" placeholder="Repeat Password">
        </div>
    </div>
    <input type="submit" class="btn btn-primary" name="reset-password">
</form>

<div class="container">
    <h2>CHANGER LE STATUS</h2>
    <form action="index.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_GET['user_id'] ;?>">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input"
                   value="1" <?php if(isset($user['superuser']) && $user['superuser'] === 1){ ?>  checked <?php ;} ?>
                   id="superuser" name="superuser">
            <label class="custom-control-label" for="superuser">Super Utilisateur</label>
        </div>
        <div class="col-sm-6 mt-2">
            <input type="submit" class="btn btn-primary" name="change-superuser">
        </div>
    </form>
</div>