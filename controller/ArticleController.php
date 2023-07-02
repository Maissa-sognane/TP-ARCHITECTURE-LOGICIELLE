<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/modele/dao/Articles.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]).'/v2-tuto-crud/helpers/session_helpers.php');
class Articles{

    private $articles;
    private $champ;
    public function __construct()
    {
        $this->articles = new Article();
        $this->champ = '';
    }

    function listArticles()
    {
        return $this->articles->readArticles();
    }

    function createArticle()
    {
        $data = [
            'titre'=> '',
            'contenu'=> '',
            'categorie' => ''
        ];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'titre' => trim($_POST['titre']),
                'contenu'=> trim($_POST['contenu']),
                'categorie' => trim($_POST['categorie'])
            ];
            if($this->validationArticle($data['titre'], $data['contenu'], $data['categorie'])){
                echo "error";
            }
            else{
                $titre = $data['titre'];
                $contenu = $data['contenu'];
                $categorie = intval($data['categorie']);
                $dateCreation = date("Y-m-d H:i:s");
                $dateModification = $dateCreation;
                $articleCreate = $this->articles->createArticle($titre, $contenu, $dateModification, $dateModification, $categorie);
                if($articleCreate){
                    alertSuccess('article', 'Article ajouter avec success');
                    redirect('dashbord?dashbord=articles');
                }
            }
        }
    }

    function updateArticle()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $id = $_POST['id'];
            $data = [
                'titre' => trim($_POST['titre']),
                'contenu'=> trim($_POST['contenu']),
                'categorie' => trim($_POST['categorie'])
            ];
            if($this->validationArticle($data['titre'], $data['contenu'], $data['categorie'])){
                echo "error";
            }else{
                $titre = $data['titre'];
                $contenu = $data['contenu'];
                $categorie = intval($data['categorie']);
                $dateModification = date("Y-m-d H:i:s");
                $articleCreate = $this->articles->updateArticle($id, $titre, $contenu, $dateModification, $categorie);
                if($articleCreate){
                    alertSuccess('update-article', 'Article modifier avec success');
                    redirect('dashbord?dashbord=articles');
                }
            }
        }
    }

    function deleteArticle(){
        $id=$_POST['id'];
        $articledeleted = $this->articles->deleteArticle($id);
        if($articledeleted){
            alertSuccess('update-article', 'Article supprimer avec success');
            redirect('dashbord?dashbord=articles');
        }
    }
    function readArticleById(){
        $id = $_GET['id_article'];
        return $this->articles->articleById($id);
    }

    function validationArticle($titre, $contenu, $categorie)
    {
        if (empty($titre) && empty($contenu) && empty($categorie)){
            flash('article','les champs sont vide' );
            redirect('add-article');
        }else{
            if(empty($titre)){
                flash('article','Champ titre est vide' );
                redirect('add-article');
            }
            elseif (empty($contenu)){
                flash('article','Champ contenu est vide' );
                redirect('add-article');
            }
            elseif (empty($categorie)){
                flash('article','Choisir une catégorie pour cette article' );
                redirect('add-article');
            }elseif (strlen($titre) < 20){
                flash('article','le titre doit dépasser au minimum 20 caractères' );
                redirect('add-article');
            }elseif (strlen($contenu) < 100){
                flash('article','le titre doit dépasser au minimum 100 caractères' );
                redirect('add-article');
            }
        }
    }
    /**
     * @return string
     */
    public function getChamp()
    {
        return $this->champ;
    }

    /**
     * @param string $champ
     */
    public function setChamp($champ)
    {
        $this->champ = $champ;
    }

}
