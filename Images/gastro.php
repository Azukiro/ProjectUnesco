<?php

    include("../BaseDonnees/connexion.inc.php");
    include("../Include/navBar.php");
    $req="SELECT * FROM `Paragraphes` NATURAL JOIN Type WHERE code='fr' AND nomPage='GASTRO' ;";
    $result=$bd->query($req);
    while($ligne=$result->fetch(PDO::FETCH_NUM)){
      if($ligne[0]=="T3"){
        echo "T3";
        echo"<div id='info_droite'>
          $ligne[6] $ligne[2]";
      }else{
        if($ligne[0]=="AH"){
          echo "$ligne[6] $ligne[2]";
        }
        if($ligne[0]=="AT"){
          echo "$ligne[6] $ligne[2] </a></div></div>";
        
        }else{

          echo "$ligne[6] $ligne[2] $ligne[7]";
        }
      }
    }
    $result->closeCursor();

    include("../Include/navBar.php");
?>