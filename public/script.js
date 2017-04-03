function testResult($id, $id2) {
	var select = document.getElementById($id).value;
	document.getElementById($id2).innerHTML = select
	if (select == "Étude du réhaussement ou TEP") {
		document.getElementById('form').innerHTML = '<form><select name="result" id="select2"><option value="TDM à 3, 9 et 24 mois">Étude du réhaussement ou TEP négatif</option><option value="Avis spécialisé(biopsie ou chirurgie)">Étude du réhaussement ou TEP positif</option></select><input type="button" value="Conduite à tenir" onclick="testResult(\'select2\', \'result2\')">';
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