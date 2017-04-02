<?php
function index()
{
	head('Classification TNM');
	?>
	<h1>Classification TNM 8ème édition</h1>
	<form action="/default/post" method="post">
	<h2>T</h1>
	<p>Taille : 
		<select name="T1">
			<option value="1.1">≤ 1cm</option>
			<option value="1.2">1cm et ≤ 2cm</option>
			<option value="1.3">2cm et ≤ 3cm</option>
			<option value="2.1">3cm et ≤ 4cm</option>
			<option value="2.2">4cm et ≤ 5cm</option>
			<option value="3.3">5cm et ≤ 7cm</option>
			<option value="4">7cm</option>
		</select>
	</p>
	<p>Trachée-Bronches : 
		<select name="T2">
			<option value="0">Pas d'atteinte</option>
			<option value="2">Pas d'atteinte carène/Atélectasie/Pneumonie obstructive</option>
			<option value="4">Atteinte de la carène</option>
		</select>
	</p>
	<p>Médiastin : 
		<select name="T3">
			<option value="0">Pas d'atteinte</option>
			<option value="3">Paralysie phrénique</option>
			<option value="4">Oesophage</option>
			<option value="4">Oreillette gauche/Vaisseaux</option>
			<option value="4">Vertèbre</option>
		</select>
	</p>
	<p>Plèvre : 
		<select name="T4">
			<option value="0">Pas d'atteinte</option>
			<option value="2">Franchissement scissural</option>
			<option value="3">Plèvre pariétale</option>
		</select>
	</p>
	<p>Paroi : 
		<select name="T5">
			<option value="0">Pas d'atteinte</option>
			<option value="3">Plèvre pariétale/Paroi</option>
			<option value="3">Apex</option>
			<option value="4">Diaphragme</option>
		</select>
	</p>
	<p>Nodules satellites : 
		<select name="T6">
			<option value="0">Aucun</option>
			<option value="3">Nodule(s) dans le même lobe</option>
			<option value="4">Nodule(s) dans un autre lobe homolatéral</option>
		</select>
	</p>

	<h2>Adénopathies</h1>
	<p>
		<select name="ntm_n">
			<option value="0">Absence de métastase dans les ganglions régionaux</option>
			<option value="1">Hilaire homolatérale</option>
			<option value="2">Médiastinale homolatérale et sous-carénaire</option>
			<option value="3">Hilaire controlatérale</option>
			<option value="3">Médiastinale controlatérale</option>
			<option value="3">Supra-claviculaire ou scalénique</option>
		</select>
	</p>

	<h2>Métastase(s)</h1>
	<p>
		<select name="ntm_m">
			<option value="0">Pas de métastase à distance</option>
			<option value="1.1">Nodule controlatéral</option>
			<option value="1.1">Carcinose pleurale ou péricardique</option>
			<option value="1.2">Surrénales/Foie/Os/Cerveau ou Autre Unique</option>
			<option value="1.3">Surrénales/Foie/Os/Cerveau ou Autre Multiple</option>
		</select>
	</p>

	<p><input type="submit" value="Calculer"></p>

	</form>
	<?php
}

function post()
{
	extract($_POST, EXTR_SKIP);
	if (!isset($T1) or !isset($T2) or !isset($T3) or !isset($T4) or !isset($T5) or !isset($T6) or !isset($ntm_n) or !isset($ntm_m)) {
		error('Formulaire incorrect');
	}
	$T = compact(array('T1', 'T2', 'T3', 'T4', 'T5', 'T6'));
	$t = 0;
	for ($i=0; $i <= 6; $i++) { 
		if ($T['T'.$i] > $t) {
			$t = $T['T'.$i];
		}
	}
	$t = str_replace('.1', 'a', $t);
	$t = str_replace('.2', 'b', $t);
	$t = str_replace('.3', 'c', $t);

	$m = str_replace('.1', 'a', $ntm_m);
	$m = str_replace('.2', 'b', $m);
	$m = str_replace('.3', 'c', $m);


	?>
	<p>T<?php echo $t;?></p>
	<p>N<?php echo $ntm_n;?></p>
	<p>M<?php echo $m;?></p>
	<?php
}