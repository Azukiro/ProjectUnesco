<?php
include("../Include/navBar.php");

$nbT3=0;
$reqDP="SELECT COUNT(*) FROM `Paragraphes` NATURAL JOIN Type WHERE code='$lang' AND nomPage='apropos' AND Type.format='DP' ";
$resultDP=$bd->query($reqDP);
$nbMembers=$resultDP->fetch(PDO::FETCH_NUM);
$nbMembers=$nbMembers[0];
$req="SELECT * FROM `Paragraphes` NATURAL JOIN Type WHERE code='$lang' AND nomPage='apropos' ORDER BY id ;";
$result=$bd->query($req);
$preligne=array('rien');
$firstP=0;
while($ligne=$result->fetch(PDO::FETCH_NUM)){

    if($ligne[0]=='T3'){
        if($nbT3==0){
            echo "$ligne[6] $ligne[2]";
            echo "<div class='us'>";
        }else if($nbT3==2 && $preligne[0] == 'AT'){
            echo "</ul></div>";
            echo "$ligne[6] $ligne[2]";
            $nbT3++;

        }else if($nbT3==2){
            echo "$ligne[6] $ligne[2] <ul>";
        }else{
            echo "$ligne[6] $ligne[2]";
        }
        $preligne=$ligne;
        continue;
    }
    if($preligne[0]=='DP'){
        if($ligne[0]=='AH'){
            echo "$preligne[6] $ligne[6] $ligne[2] $ligne[7]";
        }else if($ligne[0]=='AT'){
            echo "$ligne[6] $ligne[2] $ligne[7] </div> $preligne[2] $preligne[7]";
            $preligne=$ligne;
            if($nbMembers==0){
                $nbMembers--;
                $nbT3++;
                echo "</div><div class='stopfloat'></div></div>";
            }
        }
        continue;
    }
    if($ligne[0]=='DP'){
        $nbMembers--;
        $preligne=$ligne;
        continue;
    }
    if($ligne[0]=='TB' && $nbT3==1){
        echo "$ligne[6] $ligne[2] $ligne[7] </div>";
        $nbT3++;
        $preligne=$ligne;
        continue;
    }

    if($nbT3==2){

        if($ligne[0]=='AH'){
            echo "<li> $ligne[6] $ligne[2] $ligne[7]";
            $preligne=$ligne;
            continue;
        }else if($ligne[0]=='AT'){
            echo "$ligne[6] $ligne[2] $ligne[7]</li>";
            $preligne=$ligne;
            continue;
        }else{

        }
    }
    if($ligne[0]=='PA'){
        if($firstP==0){
            $firstP++;
        }else{
            echo "</p>";
        }
        echo "$ligne[2]";

        echo "<p style='font-size:20px;'>";

        $preligne=$ligne;
        continue;
    }
    echo "$ligne[6] $ligne[2]  $ligne[7]";
    $preligne=$ligne;

}
echo "</p></div>";

$result->closeCursor();

include("../Include/footer.php");
?>
