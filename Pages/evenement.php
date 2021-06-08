<?php
include("../BaseDonnees/connexion.inc.php");
include("../Include/navBar.php");
$req="SELECT * FROM `Paragraphes` NATURAL JOIN Type WHERE code='$lang' AND nomPage='event' ORDER BY id ;";
$result=$bd->query($req);
$right=0;
$t3=0;
$a=0;
$im=0;
while($ligne=$result->fetch(PDO::FETCH_NUM)){
    if($ligne[0]=="T3"){
        if($t3==0){

        echo "<div style='margin-top: -5%; margin-bottom: 10%;'>";
        }
        echo "$ligne[6] $ligne[2]";

    }else if($ligne[0]=='IM'){
        if($im==0){
           echo" <div class='images_line'>";
        }
        echo "<div class='container'> $ligne[6] $ligne[2] $ligne[7]</div>";
        $im++;
        if($im==3){
            echo "</div><div class='stopfloat'></div>";
        }
    }else if($ligne[0]=='TB'){
        echo "$ligne[6] <div  style='text-align: justify;'> $ligne[2] $ligne[7]</div>";
    }
    else{
        if($t3==0){
            echo "$ligne[6] $ligne[2] $ligne[7] ";
            if($ligne[0]=="AT"){
                $a++;
            }
            if($a==2){
                $t3++;
                echo "</div></div>";
            }
        }else if($t3==1 && $ligne[0]=='AT'){
            echo "$ligne[6] $ligne[2] $ligne[7]</div>";
        }
        else{


            echo "$ligne[6] $ligne[2] $ligne[7]";
        }

    }


}
$result->closeCursor();

include("../Include/footer.php");



?>
