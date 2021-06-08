<?php
if(file_exists("BaseDonnees/connexion.inc.php")){
    $retour='';
}else{
    $retour='../';
}

if(isset($_GET['lang']) && $_GET['lang']=='en'){
    $lang='en';
}else{
    $lang='fr';
}
include($retour."BaseDonnees/connexion.inc.php");
$reqDP="SELECT COUNT(*) FROM `Paragraphes` NATURAL JOIN Type WHERE code='$lang' AND nomPage='navBar';";
$resultDP=$bd->query($reqDP);
$nbOnglet=$resultDP->fetch(PDO::FETCH_NUM);
$nbOnglet=$nbOnglet[0];
$req="SELECT * FROM `Paragraphes` NATURAL JOIN Type WHERE code='$lang' AND nomPage='navBar';";
$result=$bd->query($req);
$preligne=array('rien');
$firstP=0;

echo '<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <!--<meta name="viewport" content="width=device-width, user-scalable=no">-->
    <link rel="stylesheet" type="text/css" href="'.$retour.'Include/style.css">
    <title>Patrimoine d\'Avignon</title>
   <link rel="icon" href="Images/mcntitle.png">
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <div class="wrap">

        <nav>
            <div class="nav-logo">
                <a href="'.$retour.'index.php"><img src="'.$retour.'Images/mcn.png" class="logo" alt="MCN"></a>
            </div>
          <div class="burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
          </div>
          <ul class="nav-items">
';
while($ligne=$result->fetch(PDO::FETCH_NUM)){

    if($ligne[0]=="AH"){

        echo "<li> $ligne[6] ".$retour."$ligne[2]";
        if(isset($_GET['lang']) && $_GET['lang']=='en'){
            echo "?lang=en\">";
        }else{
            echo "\">";
        }
    }else{
        echo "$ligne[2]  $ligne[7] </li>";
    }
    $nbOnglet--;
     if($nbOnglet==0){
        echo "<li><a href=";

        if(isset($_GET['lang']) && $_GET['lang']=='en' ){
            echo "'?lang=fr'><img src='".$retour."Images/fr.png' class='img_lang' ></a></li>";
        }else{
            echo "'?lang=en'><img src='".$retour."Images/en.png' class='img_lang'></a></li>";
        }
    }


}
echo '</ul>
        </nav>
';
if(isset($_GET['lang']) && $_GET['lang']=='en'){
    $lang='en';
}else{
    $lang='fr';
}
$result->closeCursor();

?>
