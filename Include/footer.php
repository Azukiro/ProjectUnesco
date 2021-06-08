<?php
if(file_exists("BaseDonnees/connexion.inc.php")){
    $retour='';
}else{
    $retour='../';
}
echo "
</body>

	<div class='footer-main'>
		<div class='footer-left'>
			<ul>
				<li><a href='http://www.u-pem.fr/' target='_blank'><img class='footer-img' src='".$retour."Images/upem.png' alt='Université de Paris-Est Marne-la-Valée'  target='_blank'></a></li>
				<li><a href='https://fr.unesco.org/' target='_blank'><img class='footer-img' src='".$retour."Images/unesco.png' alt='UNESCO' target='_blank'></a></li>
				<li><a href='http://idea.univ-paris-est.fr/fr/projets-lances/document-2783.html' target='_blank'><img class='footer-img' src='".$retour."Images/forum.png' alt='Forum'></a></li>
				<li><a href='http://idea.univ-paris-est.fr/fr'  target='_blank'><img class='footer-img' src='".$retour."Images/IDEA.png' alt='IDEA'></a></li>
				<li><a href='http://www.enseignementsup-recherche.gouv.fr/pid24578/investissements-d-avenir.html' target='_blank'><img class='footer-img' src='".$retour."Images/avenir.png' alt='Investissements de l\'avenir'></a></li>
				<li><a href='http://www.agence-nationale-recherche.fr/' target='_blank'><img class='footer-img' src='".$retour."Images/ANR.png' alt='ANR'></a></li>
			</ul>

		</div>

		<div class='footer-right'>
			<ul>
				<li><a href='apropos.php'><img class='footer-img' src='".$retour."Images/info.png' alt='A propos'></a></li>
			</ul>
		</div>
	</div>
    <script src='".$retour."Include/script.js'></script>
</html>
";
?>
