<?php
require_once 'modele/dao/ConnexionManager.php';
function getAllCategories()
{
    $pdo = dbConnexion();
    $categories = $pdo->prepare("SELECT * FROM `Categorie`");
    $categories->execute();
    return $categories->fetchAll();
}
