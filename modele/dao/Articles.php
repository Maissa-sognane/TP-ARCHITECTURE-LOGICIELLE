<?php
require_once "ConnexionManager.php";

class Article{
    private $db;

    public function __construct()
    {
        $this->db = dbConnexion();
    }
//$premier=1, $parPage
    function readArticles(){
        $sql = "SELECT * FROM `Article` ORDER BY `dateCreation` DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function createArticle($titre, $contenu, $dateCreation, $dateModification, $categorie){
        $sql = "INSERT INTO `Article`(`titre`, `contenu`, `dateCreation`, `dateModification`, `categorie`) VALUES (:titre, :contenu, :dateCreation,:dateModification,:categorie)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $stmt->bindValue(':dateCreation', $dateCreation, PDO::PARAM_STR);
        $stmt->bindValue(':dateModification', $dateModification, PDO::PARAM_STR);
        $stmt->bindValue(':categorie', $categorie, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    }

    function articleById($id){
        $sql = "SELECT * FROM `Article` WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    function updateArticle($id, $titre, $contenu, $dateModification, $categorie){
        $sql = "UPDATE `Article` SET `titre`='$titre', `contenu`='$contenu',`dateModification`='$dateModification',`categorie`='$categorie' WHERE `id`='$id' ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }

    function deleteArticle($id){
        $sql = "DELETE FROM `Article` WHERE `id`='$id'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }
}