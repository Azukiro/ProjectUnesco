<?php

    include("../BaseDonnees/connexion.inc.php");
    include("../Include/navBar.php");
    $req="SELECT * FROM `Paragraphes` NATURAL JOIN Type WHERE code='$lang' AND nomPage='GASTRO' ORDER BY id ;";
    $result=$bd->query($req);
    $right=0;
    while($ligne=$result->fetch(PDO::FETCH_NUM)){
      if($ligne[0]=="T3"){
        if($right%2==0){

          echo"<div id='info_droite'>";
        }else{

        echo"<div id='info_gauche'>";
        }
          $right++;
          echo "$ligne[6] $ligne[2]";
      }else{
        if($ligne[0]=="AH"){
          echo "$ligne[6] $ligne[2]";
        }else if($ligne[0]=="AT"){
          echo "$ligne[6] $ligne[2] </a></div></div>";

        }else{
          echo "$ligne[6] $ligne[2] $ligne[7]";
        }
      }
    }
    $result->closeCursor();

    include("../Include/footer.php");
?>
