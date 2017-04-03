<?php
function index()
{
	head('Nodule Solide');
	?>
	<h1>Nodule Solide</h1>
	<p><a href="/nps">Retour</a></p>
	<p>Algorithmes de surveillance : selon la taille du nodule lors du diagnostic et les FDR ; puis mesure du volume par un logiciel dédié, seuil d’augmentation significative de volume : 30% = avis spécialisé.</p>
	<h2>Facteur De Risque (FDR) = </h2>
	<ul>
		<li>Tabagisme</li>
		<li>Age</li>
		<li>Antécédant de cancer</li>
		<li>Caractéristiques au scanner : contours irréguliers/spiculés, lobes supérieurs, bonchogramme aérique, cavitation à parois épais, calcifications irrégulières</li>
	</ul>
	<form>
		<select name="result" id="select">
			<option value="Pas de surveillance">&#60 4mm sans FDR</option>
			<option value="TDM à 12 mois">&#60 4mm avec FDR</option>
			<option value="TDM à 12 mois">entre 4 et 6 mm sans FDR</option>
			<option value="TDM à 9 mois puis à 24 mois">entre 4 et 6 mm avec FDR</option>
			<option value="TDM à 9 mois puis à 24 mois">entre 6 et 8 mm sans FDR</option>
			<option value="TDM à 4 mois puis à 9 mois">entre 6 et 8 mm avec FDR</option>
			<option value="Étude du réhaussement ou TEP">entre 8 et 10 mm sans FDR</option>
			<option value="Biopsie ou chirurgie">entre 8 et 10 mm avec FDR</option>
		</select>
		<p><input type="button" value="Conduite à tenir" onclick="testResult('select', 'result')" class="button"></p>
	</form>
	<script type="text/javascript"></script>
	<p id="result"></p>
	<div id="form"></div>
	<p id="result2"></p>
	<?php
	foot();
}