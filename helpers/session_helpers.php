<?php
if (!isset($_SESSION)){
    session_start();
}
//Message des erreurs
function flash($name='', $message='')
{
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
            $_SESSION[$name] = $message;
        }elseif (empty($message) && !empty($_SESSION[$name])){
            echo '<div class="alert alert-danger" role="alert">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$message]);
        }
    }
}
function alertSuccess($namesuccess='', $messagesuccess=''){
    if(!empty($namesuccess)){
        if(!empty($messagesuccess) && empty($_SESSION[$namesuccess])){
            $_SESSION[$namesuccess] = $messagesuccess;
        }elseif (empty($messagesuccess) && !empty($_SESSION[$namesuccess])){
            echo '<div class="alert alert-success" role="alert">'.$_SESSION[$namesuccess].'</div>';
            unset($_SESSION[$namesuccess]);
            unset($_SESSION[$messagesuccess]);
        }
    }
}

//Redirection des pages
function redirect($location){
    header("location: ".$location);
    exit();
}
