<?php
function index()
{
	head('TIRADS 2017');
	?>
<h1>TIRADS 2017</h1>
<form>
	<p>Composition : <select id="compo">
		<option value="0">kystique 0</option>
		<option value="0">spongiforme 0</option>
		<option value="1">mixte (kystique - solide) 1</option>
		<option value="2">solide 2</option>
	</select></p>
	<p>Echogénicité : <select id="echo">
		<option value="0">anéchogène 0</option>
		<option value="1">iso - hyper 1</option>
		<option value="2">modérément hypo 2</option>
		<option value="3">très hypo 3</option>
	</select></p>
	<p>Forme : <select id="forme">
		<option value="0">largeur &gt; épaisseur 0</option>
		<option value="3">épaisseur &gt; largeur 3</option>
	</select></p>
	<p>Contours : <select id="contours">
		<option value="0">lisses 0</option>
		<option value="0">bien définis 0</option>
		<option value="2">lobulés - irréguliers 2</option>
		<option value="3">extension extra thyroïdienne 3</option>
	</select></p>
	<p>Elements hyper échogènes : <select id="echogene">
		<option value="0">aucun 0</option>
		<option value="0">artefact en « queue de comète » 0</option>
		<option value="1">macro-calcifications 1</option>
		<option value="2">calcifications périphériques 2</option>
		<option value="3">micro calcifications éparses 3</option>
	</select></p>
	<p><input class="button" type="button" value="Résultat" onclick="tirads(1)"></p>
</form>
<div id="result"></div>
<div id="form"></div>
<div id="result2"></div>
<div id="form2"></div>
<div id="result3"></div>
<p><input type="button" value="Réinitialiser" onclick="document.location.href ='/nps/tirads'"></p>
<p><strong>Contexte à risque :</strong><br>
radiothérapie externe dans l’enfance<br>
ATCD au premier degré de carcinome papillaire<br>
Histoire familiale de CMT ou NEM2<br>
ATCD personnel ou familial de maladie de Cowden, polypose familiale, complexe de Carney, Mc<br>
Cune-Albright<br>
Calcitonine basale élevée à 2 reprises<br>
<p><strong>Etude doppler (hors TIRADS) :</strong><br>
Type 1 : non vascularisé<br>
Type 2 : vascularisation périphérique<br>
Type 3 : vascularisation périphérique et interne<br>
Type 4 : vascularisation interne prédominante</p>
	<?php
}