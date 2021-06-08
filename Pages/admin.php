<?php
session_start();
include("../Include/navBar.php");
echo "<div><div>";
echo "<h1>Filtrer</h1>";
$reqPage="SELECT * FROM `Page`;";
$reqLang="SELECT * FROM `Langue`;";
$reqType="SELECT * FROM `Type`;";
$reqOrdre="SELECT `Text`, `code` AS 'Langue' , `format` AS 'Balise' FROM `Paragraphes` ;";
echo " <form action='admin.php' method='post'>
Page : <select name='page'>";

$resultPage=$bd->query($reqPage);
while($ligne=$resultPage->fetch(PDO::FETCH_NUM)){
    if(isset($_POST['page']) && $_POST['page']==$ligne[0]){
        echo "<option selected value='$ligne[0]' >- $ligne[0] -</option>";
    }else{
        echo "<option  value='$ligne[0]' >- $ligne[0] -</option>";
    }
    
}
$resultPage->closeCursor();
echo "</select><br>Langue : <select name='langue'>";

$resultLang=$bd->query($reqLang);
while($ligne=$resultLang->fetch(PDO::FETCH_NUM)){
    if(isset($_POST['langue']) && $_POST['langue']==$ligne[0]){
        echo "<option selected value='$ligne[0]' >- $ligne[0] -</option>";
    }else{
        echo "<option  value='$ligne[0]' >- $ligne[0] -</option>";
    }
}
$resultLang->closeCursor();

echo "</select><br>Balise :<br>";

$resultType=$bd->query($reqType);
while($ligne=$resultType->fetch(PDO::FETCH_NUM)){
    
    echo "<input  type='checkbox' name='type[]' value='$ligne[0]'>- $ligne[1] -";
}
$resultType->closeCursor();
echo "</select><input type='submit' name='submit'></form>";
$tri=array('id'=>'Ordre id Croissant','id DESC'=>'Ordre id Décroissant', 'format'=>'Balise');
echo "<form name='ordre' action='admin.php' method='post'>
Ordre de tri<select onchange='ordre.submit()' name='typeTri'>
<option value=''></option>";
foreach ($tri as $key => $value){
    
    if(isset($_POST['typeTri']) && $_POST['typeTri']==$key ){
        echo "<option selected value='$key'>$value</option>";
    }else{
        echo "<option  value='$key'>$value</option>";
    }
}            
echo "</select>
</form>";
if(isset($_POST['submit']) || isset($_POST['typeTri']) ){
    if(isset($_POST['typeTri'])){
    
        if(isset($_SESSION['reqAdmin'])){
            $reqAdmin=$_SESSION['reqAdmin'];
            $order=$_POST['typeTri'];
            $reqOrder=$reqAdmin." ORDER BY ".$order.";";
            $result=$bd->query($reqOrder);
        }
    }else{
        $page=$_POST['page'];
        $lang=$_POST['langue'];
        
        if(!isset($_POST['type'])){
            $typeReq="format LIKE '%'";
        }else{
            $type=$_POST['type'];
            $typeReq='';
            $code="format LIKE";
            for($i=0; $i<count($type);$i++){
                $typeReq=$typeReq." ".$code." '".$type[$i]."'";
                if($i!=count($type)-1){
                    $typeReq=$typeReq." OR";
                }
            }
        }

        $_SESSION['reqAdmin']="SELECT * FROM `Paragraphes` WHERE nomPage='$page' AND code='$lang' AND ($typeReq)";
        $reqResult=$_SESSION['reqAdmin'].";";
        $result=$bd->query($reqResult);
    }
    $_SESSION['id']=array();
    echo "</div><div style='margin:auto 25%;'><form action='admin.php' method='post'>";
    while($ligne=$result->fetch(PDO::FETCH_NUM)){
        echo "<textarea class='textarea' onclick='adapteRow(this)' rows='1' cols='100' style='border:1px solid #f7af3e; background-color:grey; color:white;  height:5%;  margin :2% 0; text-align:center; vertical-alig,:middle; resize:none; box-sizing: border-box;
        word-wrap: break-word;' name='$ligne[0]'>$ligne[1]</textarea><br>";

        array_push($_SESSION['id'],$ligne[0]);
    }

    echo "<input type='submit' name='submitInsert'></form></div></div>";

}

if(isset($_POST['submitInsert'])){
    $id=$_SESSION['id'];
    for($i=0;$i<count($id);$i++){
        $text=$_POST[$id[$i]];
        $id2=$id[$i];
        $reqUp='UPDATE Paragraphes SET Text="'.$text.'" WHERE id='.$id2.';';
        $bd->exec($reqUp);
    }
}


echo "<h1>Mettre une traduction en ligne</h1>";
echo " <form action='admin.php' method='post'>
Page : <select name='page'>";

$resultPage=$bd->query($reqPage);
while($ligne=$resultPage->fetch(PDO::FETCH_NUM)){
    if(isset($_POST['page']) && $_POST['page']==$ligne[0]){
        echo "<option selected value='$ligne[0]' >- $ligne[0] -</option>";
    }else{
        echo "<option  value='$ligne[0]' >- $ligne[0] -</option>";
    }
    
}
$resultPage->closeCursor();
echo "</select><br>Langue original: <select name='langueOr'>";

$resultLang=$bd->query($reqLang);
while($ligne=$resultLang->fetch(PDO::FETCH_NUM)){
    if(isset($_POST['langue']) && $_POST['langue']==$ligne[0]){
        echo "<option selected value='$ligne[0]' >- $ligne[0] -</option>";
    }else{
        echo "<option  value='$ligne[0]' >- $ligne[0] -</option>";
    }
}
echo "</select><br>Langue pour traduction: <select name='langueTrad'>";
$resultPage->closeCursor();
$resultLang=$bd->query($reqLang);
while($ligne=$resultLang->fetch(PDO::FETCH_NUM)){
    if(isset($_POST['langue']) && $_POST['langue']==$ligne[0]){
        echo "<option selected value='$ligne[0]' >- $ligne[0] -</option>";
    }else{
        echo "<option  value='$ligne[0]' >- $ligne[0] -</option>";
    }
}
$resultPage->closeCursor();

echo "<input type='submit' value='TradSubmit'></form>";




if(isset($_POST['TradSubmit'])){


    
}
?>


<script>
function hideTextarea(){
    
    var x =document.getElementsByClassName('textarea');
    var i;
    for (i = 0; i < x.length; i++) {
        if(x[i].rows>1){x[i].rows = 1;}
    } 
}


function adapteRow(textarea){
    hideTextarea();
    var txt = textarea.value;
	var line = txt.length;
	var nbr_lines = 1;
    console.log(txt.length+" "+textarea.cols);
	textarea.rows = line/textarea.cols;
    
}
</script>
