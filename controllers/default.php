<?php
function index()
{
	head('Accueil Algo Medecine');
	?>
	<h1>Choisissez une option</h1>
	<p><a href="/tnm">Classification TNM</a></p>
	<p><a href="/nps">Nodule Pulmonaire Solitaire</a></p>
	<?php
	foot();
}