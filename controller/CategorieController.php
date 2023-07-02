<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/modele/dao/Categorie.php');

class Categories{
    private $categorie;

    public function __construct()
    {
        $this->categorie  =new Categorie();
    }

    function listCategorie(){
        return $this->categorie->readCategorie();
    }

    function listCategorieNameById($id){
        return $this->categorie->readCategorieNameById($id);
    }

    public function createCategorie(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $libelle = trim($_POST['libelle']);
                if(empty($libelle)){
                    flash('categorie', 'Champ libelle est vide');
                    redirect('add-categorie');
                }elseif (strlen($libelle) < 4){
                    flash('categorie', 'le libelle doit dépasser 4 caractères');
                    redirect('add-categorie');
                }else{
                    $this->categorie->createCategorie($libelle);
                    alertSuccess('categorie', "Catégorie enrégistrer avec success");
                    redirect('dashbord?dashbord=categorie');
                }
            }
    }
    public function updateCategorie(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $id = $_POST['id'];
            $libelle = trim($_POST['libelle']);
            if(empty($libelle)){
                flash('categorie', 'Champ libelle est vide');
                redirect('add-categorie');
            }elseif (strlen($libelle) < 4){
                flash('categorie', 'le libelle doit dépasser 4 caractères');
                redirect('add-categorie');
            }else{
                $this->categorie->updateCatgorie($id, $libelle);
                alertSuccess('categorie', "Catégorie modifier avec success");
                redirect('dashbord?dashbord=categorie');
            }
        }
    }
    public function deleteCategorieById(){
        $id = $_POST['id'];
        $categorie = $this->categorie->deleteCategorie($id);
        if($categorie){
            alertSuccess('categorie', "Catégorie supprimer avec success");
            redirect('dashbord?dashbord=categorie');
        }
    }
    public function readCategorieById(){
        $id = $_GET['categorie_id'];
        return $this->categorie->readCategorieNameById($id);
    }
}
