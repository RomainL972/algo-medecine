$.notify.defaults({
	autoHide:false,
	globalPosition:'top center'
})
function testResult(id, id2) {
	var select = O(id).value;
	O(id2).innerHTML = select
	if (select == "Étude du réhaussement ou TEP") {
		O('form').innerHTML = '<form><select name="result" id="select2"><option value="TDM à 3, 9 et 24 mois">Étude du réhaussement ou TEP négatif</option><option value="Avis spécialisé(biopsie ou chirurgie)">Étude du réhaussement ou TEP positif</option></select><p><input type="button" class="button" value="Conduite à tenir" onclick="testResult(\'select2\', \'result2\')"></p>';
	}
	else if (id != 'select2') {
		O('form').innerHTML = ''
		O('result2').innerHTML = ''
	}
}

function calcul() {
	t = [O('t1').value, O('t2').value, O('t3').value, O('t4').value, O('t5').value, O('t6').value]
	levelt = 0
	for (var i = 0; i <= 6; i++) {
		if (t[i] > levelt) {
			levelt = t[i]
		}
	}
	m_num = O('m').value
	n = O('n').value

	t = levelt.toString()
	m = m_num.toString()

	t = t.replace(".1", "a")
	t = t.replace(".2", "b")
	t = t.replace(".3", "c")

	m = m.replace(".1", "a")
	m = m.replace(".2", "b")
	m = m.replace(".3", "c")

	O('result').innerHTML = "<fieldset>T"+t+" N"+n+" M"+m+"</fieldset>"
}

function recist() {
	result = O('somme')
	cibles = [O('cible1').value, O('cible2').value, O('cible3').value, O('cible4').value, O('cible5').value]
	ciblesb = [O('cible1b').value, O('cible2b').value, O('cible3b').value, O('cible4b').value, O('cible5b').value]
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
	result = O('result')
	select = O('select').value
	select2 = O('select2').value
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

function tirads(number) {
	if (number == 1) {
		somme = Number(O('compo').value) + Number(O('echo').value) + Number(O('forme').value) + Number(O('contours').value) + Number(O('echogene').value)
		result = O('result')
		form = O('form')
		clear('result2')
		clear('form2')
		clear('result3')
		clear(result)
		clear(form)
		switch (somme) {
			case 0:
			result.innerHTML = '<p><strong>TIRADS 1</strong> = constamment bénin ; pas de surveillance<br>Kyste simple<br>Nodule spongiforme</p>'
			break
			case 1:
			$.notify('Aucun résultat possible', 'error')
			break
			case 2:
			result.innerHTML = '<p><strong>TIRADS 2</strong> = constamment bénin ; pas de surveillance<br>« white knight »<br>macro calcification isolée<br>Thyroïdite sur aiguë typique<br>amas iso échogènes confluents</p>'
			break
			case 3:
			result.innerHTML = '<p><strong>TIRADS 3</strong> - très probablement bénin</p>'
			form.innerHTML = '<form><p>Taille : <select id="taille"><option value="1">&lt; 15 mm</option><option value="2">entre 15 et 25 mm</option><option value="3">&gt; 25 mm</option></select></p><p><input class="button" type="button" value="Résultat" onclick="tirads(2)"></p></form>'
			break
			case 4:
			case 5:
			case 6:
			result.innerHTML = '<p><strong>TIRADS 4</strong> - suspect</p>'
			form.innerHTML = '<form><p>Taille : <select id="taille"><option value="4">&lt; 10 mm</option><option value="5">entre 10 et 15 mm</option><option value="6">&gt; 15 mm</option></select></p><p><input class="button" type="button" value="Résultat" onclick="tirads(2)"></p></form>'
			break
			default:
			result.innerHTML = '<p><strong>TIRADS 5</strong> - Fortement suspect</p>'
			form.innerHTML = '<form><p>Taille : <select id="taille"><option value="7">&lt; 5 mm</option><option value="8">entre 5 et 10 mm</option><option value="9">&gt; 10 mm</option></select></p><p><input class="button" type="button" value="Résultat" onclick="tirads(2)"></p></form>'
		}
	}
	else if (number == 2) {
		result = O('result2')
		form = O('form2')
		select = Number(O('taille').value)
		clear(result)
		clear(form)
		clear('result3')
		preform = ''
		preresult = ''
		switch(select) {
			case 1:
			case 4:
			case 7:
			preresult = '<p>stop</p>'
			break
			case 2:
			case 5:
			case 8:
			preform = '<form><p><input type="checkbox" id="1"> augmentation de taille &gt; 20% et &gt; 2 mm sur 2 nodules au moins<br><input type="checkbox" id="2"> &gt; 50% en volume<br><input type="checkbox" id="3"> métastase à distance<br><input type="checkbox" id="4"> ganglion suspect<br><input type="checkbox" id="5"> contexte à risque<br><input type="checkbox" id="6"> fixation TEP'
			break
			case 3:
			case 6:
			case 9:
			preresult = '<p>cytoponction'
		}
		switch(select) {
			case 5:
			case 8:
			preform += '<br><input type="checkbox" id="7"> juxta capsulaire<br><input type="checkbox" id="8"> polaire supérieur<br><input type="checkbox" id="9"> multi focalisé suspectée<br><input type="checkbox" id="10"> âge &lt; 40 ans</p><p><input class="button" type="button" value="Résultat" onclick="tirads(3)"></p></form>'
			break
			case 2:
			preform += '<p><input class="button" type="button" value="Résultat" onclick="tirads(3)"></p></form>'
			break
			case 3:
			preresult += ' (sauf si compressif, fluide : kyste)</p>'
			break
			case 6:
			case 9:
			preresult += '</p>'
		}
		result.innerHTML = preresult
		form.innerHTML = preform
	}
	else if (number == 3) {
		result = O('result3')
		select = Number(O('taille').value)
		continuer = 0
		for (var i = 1; i <= 10 && !continuer; i++) {
			if (O(i)!=null && O(i).checked) {
				result.innerHTML = 'cytoponction'
				continuer = 1
			}
		}
		if (!continuer) {
			switch (select) {
				case 2:
				result.innerHTML = 'surveillance à 1, 3 et 5 ans'
				break
				case 5:
				result.innerHTML = 'surveillance à 1, 2, 3 et 5 ans'
				break
				case 8:
				result.innerHTML = 'surveillance annuelle pendant 5 ans'
			}
		}
	}
}

function clear(object) {
	O(object).innerHTML = ''
}