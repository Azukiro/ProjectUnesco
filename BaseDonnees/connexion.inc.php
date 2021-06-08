<?php
include("parametre.inc.php");
try{
    $connexion="mysql:host=$host;dbname=$db;charset=utf8";
    $bd = new PDO($connexion, $user, $pwd,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
}catch(Exception $e){
    die('Connexion impossible à la base de données !'.$e->getMessage());
}

?>
