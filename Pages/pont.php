<?php
include("../BaseDonnees/connexion.inc.php");
include("../Include/navBar.php");

$req="SELECT * FROM `Paragraphes` NATURAL JOIN Type WHERE code='$lang' AND nomPage='pont' ORDER BY id ;";
$result=$bd->query($req);
$preligne=array('rien');
while($ligne=$result->fetch(PDO::FETCH_NUM)){
    if($ligne[0]=='TM'){
        echo "$ligne[6] $ligne[2]";
        $preligne=$ligne;
        continue;
    }
    if($ligne[0]!=$preligne[0] && $preligne[0]=='MP'){
        echo "</ul></div>";
        $preligne=$ligne;
    }
    echo "$ligne[6] $ligne[2] $ligne[7]";
    $preligne=$ligne;

}

echo "</div>";

$result->closeCursor();

include("../Include/footer.php");
?>
