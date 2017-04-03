<?php
function index()
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
	<?php
	foot();
}