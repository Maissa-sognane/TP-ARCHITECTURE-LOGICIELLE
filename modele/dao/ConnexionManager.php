<?php

function dbConnexion(){
    $dbHost = "localhost";
    $dbName = "news";
    $dbChar = "utf8";
    $dbUser = "root";
    $dbPass = "";
    try {
        return new PDO(
            "mysql:host=$dbHost;dbname=$dbName;charset=$dbChar",
            $dbUser, $dbPass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }catch (Exception $exception){
        exit($exception->getMessage());
    }
}
