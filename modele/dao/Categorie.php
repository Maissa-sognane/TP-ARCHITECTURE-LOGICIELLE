<?php
require_once "ConnexionManager.php";
class Categorie{
    private $db;

    public function __construct()
    {
        $this->db = dbConnexion();
    }
    function readCategorie(){
        $sql = "SELECT * FROM `Categorie`";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function readCategorieNameById($id){
        $sql = "SELECT `libelle` FROM `Categorie` WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    function createCategorie($libelle){
        $sql = "INSERT INTO  `Categorie` (`libelle`) VALUES (:libelle)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':libelle', $libelle, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    }

    function updateCatgorie($id, $libelle){
        $sql = "UPDATE `Categorie` SET `libelle`='$libelle' WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }

    function deleteCategorie($id){
        $sql = "DELETE FROM `Categorie` WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }
}

