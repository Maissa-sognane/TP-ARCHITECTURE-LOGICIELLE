<?php
require_once 'ConnexionManager.php';
class Users{
    private $db;

    public function __construct()
    {
        $this->db =  dbConnexion(); ;
    }

    public function authentificationUser($email, $password){
        $sql = "SELECT * FROM `users` WHERE `email`=:email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])){
            return $user;
        }
        return false;
    }

    public function readUser(){
        $sql = "SELECT * FROM `users`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findUserByEmail($email){
        $sql = "SELECT * FROM `users` WHERE email='$email'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function findUserById($id){
        $sql = "SELECT * FROM `users` WHERE id='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($data){
        $sql = 'INSERT INTO users (`prenom`, `nom`, `email`, `password`, `superuser`) VALUES (:prenom, :nom, :email, :password, :superuser)';
        $stmt = $this->db->prepare($sql);

        $stmt->bindValue(':prenom', $data['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':nom', $data['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $data['password'], PDO::PARAM_STR);
        $stmt->bindValue(':superuser', $data['superuser'], PDO::PARAM_BOOL );

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function resetPassword($data){
        $id = $data['id'];
        $password = $data['password'];
        $sql = "UPDATE `users` SET `password`='$password' WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            return true;
        }
    }

    public function resetUserSuperUser($id, $superuser){
        $sql = "UPDATE `users` SET `superuser`='$superuser' WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            return true;
        }
    }
    public function updateUser($data){
        $id = $data['id'];
        $nom = $data['nom'];
        $prenom = $data['prenom'];
        $email = $data['email'];
        $sql = "UPDATE `users` SET `prenom`='$prenom',`nom`='$nom', `email`='$email'  WHERE `id`='$id'";

        $stmt = $this->db->prepare($sql);
        if($stmt->execute()){
            return true;
        }
    }

    public function deleteUser($id){
        $sql = "DELETE FROM `users` WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute();
    }
}