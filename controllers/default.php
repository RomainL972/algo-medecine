<?php
function index()
{
	head('Accueil Algo Medecine');
	?>
	<p>Accueil</p>
	<p><a href="/nps">Nodule Pulmonaire Solitaire</a></p>
	<p><a href="/tnm">Classification TNM</a></p>
	<p><a href="/recist">RECIST</a></p>
	<?php
	foot();
}