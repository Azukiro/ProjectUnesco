<?php include("Include/navBar.php")?>
<img class="home_picture" src="Images/photo_accueil.jpg" alt="Palais des Papes">

<?php
echo '<div class="images_line_index">
    <!-- 3 images en ligne avec 3 redirections -->
    <div class="container">
        <a href="Pages/pont.php?lang='.$lang.'"><img class="index_image" src="Images/img1.jpg" alt="Pont d\'Avignon">
        <h3> Pont Saint Bénézet</h3></a>
    </div>
    <div class="container">
        <a href="Pages/PalaisdesPapes.php?lang='.$lang.'"><img class="index_image" src="Images/img2.jpg" alt="Palais des Papes">
        <h3>Palais des Papes</h3></a>
    </div>
    <div class="container">
        <a href="Pages/sejour.php?lang='.$lang.'"><img class="index_image" src="Images/img3.jpg" alt="Séjour">
        <h3>Mon Séjour</h3></a>
    </div>
</div>';
?>
<div class="stopfloat"></div>



<div class="title_bar">
    <h2>Frise chronologique</h2>
</div>

<div class="chrono">

     <div class="dropdown-chrono">
       <div class="date">1177</div>
       <div class="frise"></div>
       <div class="cercle"></div>
            <div class="text">
            Construction <br> du Pont<br>Saint Bénézet
        </div>

    </div>
    <div class="dropdown-chrono">
       <div class="date">1309</div>
       <div class="frise"></div>
       <div class="cercle"></div>
            <div class="text">
            Premier <br> Pape à<br>Avignon
        </div>

    </div>

    <div class="dropdown-chrono">
        <div class="date">1335</div>
        <div class="frise"></div>
        <div class="cercle"></div>
            <div class="text">
            Construction du<br> Palais des papes
        </div>
    </div>
    <div class="dropdown-chrono">
        <div class="date">1342</div>
        <div class="frise"></div>
        <div class="cercle"></div>
        <div class="text">
        Construction<br> du Palais-Neuf
    </div>
    </div>

    <div class="dropdown-chrono">
        <div class="date">1995</div>
        <div class="frise"></div>
        <div class="cercle"></div>
        <div class="text">
            Inscription<br> d\'Avignon <br>à l\'Unesco
        </div>
    </div>
    <div class="stopfloat"></div>
</div>

<div class="stopfloat"></div>
</div>
<?php include("Include/footer.php")?>
