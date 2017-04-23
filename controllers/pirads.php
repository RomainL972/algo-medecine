<?php
function index()
{
	head('PIRADS');
	?>
<h1>PIRADS</h1>
<h2>Zone périphérique</h2>
<form>
	<p>Diffusion interprétable :<br>
	<select id="select">
		<option value="1">ADC et diffusion normaux</option>
		<option value="2">Hyposignal imprécis sur la cartographie ADC / Absence de lésion focale en dehors d’anomalies de forme linéaire, triangulaire ou géométrique</option>
		<option value="3">Hyposignal léger/modéré en ADC et isointense ou discret hypersignal en diffusion b élevé</option>
		<option value="4">Hyposignal focal franc en ADC et hypersignal franc en diffusion à b élevé</option>
		<option value="5">Hyposignal focal franc en ADC et hypersignal franc en diffusion à b élevé avec masse &gt; 1,5 cm ou avec extension extra capsulaire ou caractère invasif</option>
	</select></p>
	<p><input type="button" value="Résultat" onclick="pirads(1, 'select', 'result')" class="button"></p>
	<div id="result"></div>
	<div id="result2"></div>
	<p>Diffusion ininterprétable ; analyse de la séquence T2<br>
	<select id="2select">
		<option value="1">Hypersignal uniforme</option>
		<option value="2">Hyposignal linéaire, triangulaire ou géographique mal défini, ou hyposignal modéré diffus</option>
		<option value="3">Signal hétérogène ou hyposignal modéré mal circonscrit ou arrondi</option>
		<option value="4">Masse ou hyposignal focal circonscrit, modéré, homogène de plus grande dimension &lt; 1,5 cm</option>
		<option value="5">Masse ou hyposignal focal circonscrit, modéré, homogène de plus grande dimension &gt; 1,5 cm ou extension extra capsulaire ou caractère invasif</option>
	</select></p>
	<p><input type="button" value="Résultat" onclick="pirads(1, '2select', '2result')" class="button"></p>
	<div id="2result"></div>
	<div id="2result2"></div>
</form>
<h2>Zone de transition et stroma fibromusculaire antérieur</h2>
<form>
	<p><select id="3select">
		<option value="1">Signal intermédiaire uniforme</option>
		<option value="2">Nodule d’HBP bien circonscrit, encapsulé, hypointense ou hétérogène (dont aspect de chaos organisé)</option>
		<option value="3">Plage de contours mal définis de signal hétérogène</option>
		<option value="4">Masse lenticulaire non circonscrite en hyposignal modéré homogène (« comme effacée au fusain) de plus grande dimension &lt; 1,5 cm</option>
		<option value="5">Masse lenticulaire non circonscrite en hyposignal modéré homogène (« comme effacée au fusain) &gt; 1,5 cm ou extension extra capsulaire ou caractère invasif</option>
	</select></p>
	<p><input type="button" value="Résultat" onclick="pirads(1, '3select', '3result')" class="button"></p>
	<div id="3result"></div>
	<div id="3result2"></div>
</form>

<p>PIRADS « capsule »<br>
Aucun contact capsulaire : extension très peu probable<br>
Contact capsulaire : extension peu probable<br>
Irrégularité capsulaire : extension incertaine<br>
Épaississement des pédicules neuro-vasculaires - bombement capsulaire - effacement capsulaire : extension probable<br>
Lésion extra capsulaire mesurable : extension certaine</p>

<p>TNM<br>
T1 : maladie infra-clinique<br>
T1a = &lt;5% des copeaux T1b = &gt;5% des copeaux T1c = TR normal PBP+<br>
T2 : maladie intra-prostatique<br>
T2a : &lt;50% d’un lobe T2b = &gt; 50% d’un lobe T2c = atteinte bilatérale<br>
T3 : maladie extra-prostatique<br>
T3a = EEC<br>
T3b = Vésicules séminales<br>
T4 : atteinte organes pelviens (hors VS)</p>
	<?php
	foot();
}