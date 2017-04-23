<?php
function index()
{
	head('Accueil Algo Medecine');
	?>
	<h1>Accueil</h1>
	<p><a href="/nps">Nodule Pulmonaire Solitaire</a></p>
	<p><a href="/tnm">Classification TNM</a></p>
	<p><a href="/recist">RECIST</a></p>
	<p><a href="/tirads">TIRADS 2017</a></p>
	<p><a href="/pirads">PIRADS</a></p>
	<?php
	foot();
}