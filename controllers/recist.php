<?php
function index()
{
	head('Critères RECIST 1.1');
	?>
	<h1>Critères RECIST 1.1</h1>
	<p><a href="/">Retour à l'accueil</a></p>
	<p><strong>Lésions cibles</strong></p>
	<p>&gt; 1 cm, maximum 2 par organe et 5 en tout, mesure des lésions dans le plus grand axe :</p>
	<form>
		<p>Cible 1 : <input type="number" id="cible1" min="1"> cm. <input type="number" id="cible1b" min="1"> cm lors de la précédente exploration</p>
		<p>Cible 2 : <input type="number" id="cible2" min="1"> cm. <input type="number" id="cible2b" min="1"> cm lors de la précédente exploration</p>
		<p>Cible 3 : <input type="number" id="cible3" min="1"> cm. <input type="number" id="cible3b" min="1"> cm lors de la précédente exploration</p>
		<p>Cible 4 : <input type="number" id="cible4" min="1"> cm. <input type="number" id="cible4b" min="1"> cm lors de la précédente exploration</p>
		<p>Cible 5 : <input type="number" id="cible5" min="1"> cm. <input type="number" id="cible5b" min="1"> cm lors de la précédente exploration</p>
		<div id="somme"></div>
		<p><strong>Lésions non cible :</strong> 
		<select id="select">
			<option value="1">Réponse complète</option>
			<option value="2">Pas de progression</option>
			<option value="3">Progression non équivoque</option>
		</select></p>
		<p><strong>Apparition de nouvelles lésions : </strong><select id="select2">
			<option value="1">Oui</option>
			<option value="2" selected>Non</option>
		</select></p>
		<div id="result"></div>
		<p><input type="button" value="Résultat" onclick="recist()" class="button"></p>
	</form>
	<?php
}