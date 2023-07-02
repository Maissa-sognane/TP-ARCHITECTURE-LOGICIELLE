<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/modele/dao/UserDao.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/helpers/session_helpers.php');

class UtilisateurController{
    private $user;

    public function __construct()
    {
        $this->user = new Users();
    }

    public function listUser(){
        return $this->user->readUser();
    }
    public function login(){
        $data = [
            'email' => '',
            'password' => '',
        ];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password'=> trim($_POST['password']),
            ];
            if (empty($data['email']) || empty($data['password'])){
                flash('login','Entrer vos identifiants' );
                redirect('login');
            }else{
                $email = $data['email'];
                $password = $data['password'];
                $userlogging = $this->user->authentificationUser($email, $password);
                if($userlogging){
                    $_SESSION['superuser'] = $userlogging['superuser'];
                    $this->createUserSession($userlogging);
                }
                else{
                    flash('login','Votre email ou password est incorrect !' );
                    redirect('login');
                }
            }
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        redirect('login');
    }

    public function createUserSession($user){
        $_SESSION['authenticated'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];
        redirect('dashbord?dashbord=articles');
    }

    public function createUser(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array(
                'prenom'=> trim($_POST['prenom']),
                'nom'=> trim($_POST['nom']),
                'email'=> trim($_POST['email']),
                'password'=> trim($_POST['password']),
                'repeatpassword'=> trim($_POST['repeatpassword']),
                'superuser'=> 0
            );
            if(isset($_POST['superuser'])){
                $data['superuser'] = $_POST['superuser'];
            }
            $this->validationUser($data, 'dashbord?user=add');
            $this->validationPassword($data, 'dashbord?user=add');

            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            if($this->user->createUser($data)){
                alertSuccess('user', 'Utilisateur crée avec success');
                redirect('dashbord?dashbord=compte');
            }
        }
    }

    public function resetPassword(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array(
                'password'=> trim($_POST['password']),
                'repeatpassword'=>trim($_POST['repeatpassword']),
                'id'=> trim($_POST['id'])
            );
            $this->validationPassword($data, 'dashbord?user_id');
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $user = $this->user->resetPassword($data);
            if($user){
                alertSuccess('user', 'Mot de passe changer avec success');
                redirect('dashbord?dashbord=compte');
            }

        }
    }

    public function resetSuperUser(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $id = intval($_POST['id']);
            if (!isset($_POST['superuser'])){
                $superuser = 0;
            }else{
                if(!is_int($_POST['superuser'])){
                    $superuser = intval($_POST['superuser']);
                }else{
                    $superuser = $_POST['superuser'];
                }

            }
                $user = $this->user->resetUserSuperUser($id, $superuser);
                if($user){
                    alertSuccess('user', 'Status changer avec success');
                    redirect('dashbord?dashbord=compte');
            }
        }
    }

    public function updateUser(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $redirect_route = 'dashbord?user=parametre';
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = array(
                'prenom' => trim($_POST['prenom']),
                'nom' => trim($_POST['nom']),
                'id' => trim($_POST['id']),
                'email'=> trim($_POST['email'])
            );
            if(empty($data['prenom']) || empty($data['nom']) || empty($data['email'])){
                flash('register', 'Tous les champs doivent etre remplis!');
                redirect($redirect_route);
            }
            if(!preg_match("/^[a-zA-Z0-9]*$/", $data['prenom'])){
                flash("register", "Prenom Invalid");
                redirect($redirect_route);
            }
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                flash("register", "Email Invalid");
                redirect($redirect_route);
            }
            if($data['email'] !== $_SESSION['email']){
                if($this->user->findUserByEmail($data['email'])){
                    flash("register", "Cette adresse email existe déja !");
                    redirect($redirect_route);
                }else{
                    $user = $this->user->updateUser($data);
                    if($user){
                        redirect('login');
                    }
                }
            }else{
                $user = $this->user->updateUser($data);
                if($user){
                    alertSuccess('user', 'Votre profil est modifier avec success');
                    redirect('dashbord?dashbord=compte');
                }
            }

        }
    }

    public function deleteUser(){
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $redirect_route = 'dashbord?dashbord=compte';
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $id = intval($_POST['id']);
            if($_SESSION['user_id'] !== $id){
                $user = $this->user->deleteUser($id);
                if($user){
                    alertSuccess('user', 'Utilisateur supprimé avec success');
                    redirect($redirect_route);
                }
            }else{
                flash('user', 'Impossible de supprimer votre compte');
                redirect($redirect_route);
            }

        }
    }

    public function validationUser($data, $redirect_route){
        if(empty($data['prenom']) || empty($data['nom']) || empty($data['email'])){
            flash('register', 'Tous les champs doivent etre remplis!');
            redirect($redirect_route);
        }
        if(!preg_match("/^[a-zA-Z0-9]*$/", $data['prenom'])){
            flash("register", "Prenom Invalid");
            redirect($redirect_route);
        }
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            flash("register", "Email Invalid");
            redirect($redirect_route);
        }
        if($this->user->findUserByEmail($data['email'])){
            flash("register", "Cette adresse email existe déja !");
            redirect($redirect_route);
        }
    }

    public function validationPassword($data, $redirect_route){
        if(strlen($data['password']) < 6){
            flash("register", "le mot de pass doit dépasser 6 caractéres");
            redirect($redirect_route);
        }elseif ($data['password'] !== $data['repeatpassword']){
            flash("register", "les mots de pass ne correspondent pas");
            redirect($redirect_route);
        }
    }
}