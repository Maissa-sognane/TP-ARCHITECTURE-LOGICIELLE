<?php

class Controller{

    public function view($view, $data=[]){
        if(file_exists('../vue/accounts/'.$view.'.php')){
            require_once '../vue/accounts/'.$view.'.php';
        }
    }
}
