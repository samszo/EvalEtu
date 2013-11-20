function presMessage(etu){
	arrEtu.forEach(function(etu){
		alert(etu.prenom+' '+etu.nom+' est présent');
	});
};
function present(){
	document.getElementById("present").onclick=presMessage;
};
function absMessage(etu){
	arrEtu.forEach(function(etu){
		alert(etu.prenom+' '+etu.nom+' est absent');
	});
};
function absent(){
	document.getElementById("absent").onclick=absMessage;
};
function showEtu(etu){
	arrEtu.forEach(function(etu){
		document.write('<div class="etu">'+etu.prenom+' '+etu.nom+'</div>');
		function absMessage(etu){
			alert(etu.prenom+' '+etu.nom+' est absent');
		};
		var presImg = document.createElement("img");
			presImg.setAttribute('src', 'present.jpg');
			presImg.setAttribute('alt', 'présent');
			presImg.setAttribute('title', 'présent');
			presImg.setAttribute('id', 'present');
			document.body.appendChild(presImg);
		var absImg = document.createElement("img");
			absImg.setAttribute('src', 'absent.jpg');
			absImg.setAttribute('alt', 'absent');
			absImg.setAttribute('title', 'absent');
			absImg.setAttribute('id', 'absent');
			document.body.appendChild(absImg);
		/*méthode boutons de présence :
		affiche la boîte correcte au chargement de la page
		et le message correct dans la console mais
		une boîte lorsqu'on click sur l'objet
		var prenom = etu.prenom;
		var nom =  etu.nom;
		var text = 'est present';
		var message = prenom+' '+nom+' '+text;
		console.log(prenom+' '+nom+' '+text);
		document.write('<img class="pres" onclick=alert() src="present.jpg">');
		document.getElementsByName(etu).onclick = alert(message);
		méthode boutons d'absence :
		affiche postion y lorsqu'on click sur l'objet
		mais le message correct dans la console
		var y = etu.prenom+' '+etu.nom+' est absent';
		console.log(y);
		document.write('<img class="abs" onclick="alert(y)" src="absent.jpg"></div><br>');*/
	});
};