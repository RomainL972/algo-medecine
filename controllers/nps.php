<?php
function index()
{
	head('Nodule Pulmonaire Solitaire');
	?>
	<h1>Nodule Pulmonaire Solitaire</h1>
	<p><a href="/nps/nodule_solide">Nodule Solide</a></p>
	<p><a href="/nps/nodule_verre_depoli">Nodule en verre dépoli</a></p>
	<p><a href="/nps/nodule_mixte">Nodule mixte (verre dépoli + composante tissulaire)</a></p>
	<?php
}

function nodule_mixte()
{
	head('Nodule mixte (verre dépoli + composante tissulaire)');
	?>
	<h1>Nodule mixte (verre dépoli + composante tissulaire)</h1>
	<a href="/nps">Retour</a>
	<ul>
		<li>Traitement antibiotique/anti inflammatoire mois puis contrôle à 3 mois</li>
	</ul>
	<form action="/nodule_mixte/#result" method="post">
		<select name="result" id="select">
			<option value="Stop">Disparition</option>
			<option value="Avis spécialisé pour exérèse">Persistance</option>
		</select>
		<p><input type="button" value="Conduite à tenir" onclick="testResult('select', 'result')" class="button"></p>
	</form>
	<p id="result"></p>
	<p><input type="button" value="Réinitialiser" onclick="document.location.href ='/nps/nodule_mixte'"></p>
	<?php
	foot();
}

function nodule_solide()
{
	head('Nodule Solide');
	?>
	<h1>Nodule Solide</h1>
	<p><a href="/nps">Retour</a></p>
	<p>Algorithmes de surveillance : selon la taille du nodule lors du diagnostic et les FDR ; puis mesure du volume par un logiciel dédié, seuil d’augmentation significative de volume : 30% = avis spécialisé.</p>
	<h3>Facteur De Risque (FDR) = </h3>
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
	<p id="result"></p>
	<div id="form"></div>
	<p id="result2"></p>
	<p><input type="button" value="Réinitialiser" onclick="document.location.href ='/nps/nodule_solide'"></p>
	<?php
	foot();
}

function nodule_verre_depoli()
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
		<p><input type="button" value="Conduite à tenir" onclick="testResult('select', 'result')" class="button"></p>
	</form>
	<p id="result"></p>
	<p><input type="button" value="Réinitialiser" onclick="document.location.href ='/nps/nodule_verre_depoli'"></p>
	<?php
	foot();
}