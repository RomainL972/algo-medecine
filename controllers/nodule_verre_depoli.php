<?php
function index()
{
	head('Nodule en verre dépoli');
	?>
	<h1>Nodule en verre dépoli</h1>
	<a href="/nps">Retour</a>
	<ul>
		<li>Traitement antibiotique/anti inflammatoire puis contrôle à 3 mois : stop si disparition</li>
	</ul>
	<form action="/nodule_verre_depoli/#result" method="post">
		<select name="result" id="select">
			<option value="Stop">&#60 5mm</option>
			<option value="Surveillance annuelle pendant cinq ans">Entre 5 et 10 mm</option>
			<option value="Avis spécialisé pour exérèse">&#62 10mm, augmentation en taille ou apparition d’une composante tissulaire</option>
		</select>
		<input type="button" value="Conduite à tenir" onclick="testResult('select', 'result')">
	</form>
	<p id="result"></p>
	<?php
	foot();
}