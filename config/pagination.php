<?php
include_once "modele/dao/ArticleDao.php";
function paginationPage()
{
    if(isset($_GET['page'])){
        return (int) strip_tags($_GET['page']);
    }else{
        return 1;
    }
}
