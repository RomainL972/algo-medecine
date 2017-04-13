$.notify.defaults({
	autoHide:false,
	globalPosition:'top center'
})
function testResult(id, id2) {
	var select = document.getElementById(id).value;
	document.getElementById(id2).innerHTML = select
	if (select == "Étude du réhaussement ou TEP") {
		document.getElementById('form').innerHTML = '<form><select name="result" id="select2"><option value="TDM à 3, 9 et 24 mois">Étude du réhaussement ou TEP négatif</option><option value="Avis spécialisé(biopsie ou chirurgie)">Étude du réhaussement ou TEP positif</option></select><p><input type="button" class="button" value="Conduite à tenir" onclick="testResult(\'select2\', \'result2\')"></p>';
	}
	else if (id != 'select2') {
		document.getElementById('form').innerHTML = ''
		document.getElementById('result2').innerHTML = ''
	}
}

function calcul() {
	t = [document.getElementById('t1').value, document.getElementById('t2').value, document.getElementById('t3').value, document.getElementById('t4').value, document.getElementById('t5').value, document.getElementById('t6').value]
	levelt = 0
	for (var i = 0; i <= 6; i++) {
		if (t[i] > levelt) {
			levelt = t[i]
		}
	}
	m_num = document.getElementById('m').value
	n = document.getElementById('n').value

	t = levelt.toString()
	m = m_num.toString()

	t = t.replace(".1", "a")
	t = t.replace(".2", "b")
	t = t.replace(".3", "c")

	m = m.replace(".1", "a")
	m = m.replace(".2", "b")
	m = m.replace(".3", "c")

	document.getElementById('result').innerHTML = "<fieldset>T"+t+" N"+n+" M"+m+"</fieldset>"
}

function recist() {
	result = document.getElementById('somme')
	cibles = [document.getElementById('cible1').value, document.getElementById('cible2').value, document.getElementById('cible3').value, document.getElementById('cible4').value, document.getElementById('cible5').value]
	ciblesb = [document.getElementById('cible1b').value, document.getElementById('cible2b').value, document.getElementById('cible3b').value, document.getElementById('cible4b').value, document.getElementById('cible5b').value]
	somme1 = somme2 = 0
	for (var i = 0; i < cibles.length; i++) {
		cibles[i] = cibles[i].replace('', 0)
		cibles[i] = cibles[i].replace(',', '.')
		ciblesb[i] = ciblesb[i].replace('', 0)
		ciblesb[i] = ciblesb[i].replace(',', '.')
		somme1 += Number(cibles[i])
		somme2 += Number(ciblesb[i])
	}
	if (somme1 == 0) {
		somme1 = 0
		result.innerHTML = "<p>Résultat pour les lésions cibles : Réponse complète</p>"
	}
	else {
		result.innerHTML = "<p>Somme : "+somme1+" cm. "+somme2+" cm lors de la précédente exploration</p>"
		somme1 = (somme1 - somme2)/somme2*100
		result.innerHTML += "<p>Evolution : "+Math.round(somme1)+"%</p>"
		if (somme1<-30) {
			somme1 = 1
			result.innerHTML += "<p>Résultat pour les lésions cibles : Réponse partielle</p>"
		}
		else if (somme1>20) {
			somme1 = 2
			result.innerHTML += "<p>Résultat pour les lésions cibles : Progression</p>"
		}
		else {
			somme1 = 3
			result.innerHTML += "<p>Résultat pour les lésions cibles : Stabilité entre les deux</p>"
		}
	}
	result = document.getElementById('result')
	select = document.getElementById('select').value
	select2 = document.getElementById('select2').value
	if (somme1 == 0 && select == 1 && select2 == 2) {
		result.innerHTML = "<p>Résultat global : Réponse complète"
	}
	else if ((somme1 == 0 || somme1 == 1) && select == 2 && select2 == 2) {
		result.innerHTML = "<p>Résultat global : Réponse partielle"
	}
	else if (somme1 == 3 && select == 2 && select2 == 2) {
		result.innerHTML = "<p>Résultat global : Maladie stable"
	}
	else if (somme1 == 2 || select == 3 || select2 == 1) {
		result.innerHTML = "<p>Résultat global : Progression"
	}
	else {
		$.notify('Aucun résultat possible', 'error')
	}
}