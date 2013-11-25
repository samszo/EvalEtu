function showEtu(liste){
	arrEtu.forEach(function(etu){
		document.write(etu.diplome+' '+etu.nom+'<br><img onclick="pre" src="present.jpg"><img onclick="abs" src="absent.jpg"><br>');
		});
	};
var abs = function absent(etu){
	alert(etu.nom+' est absent');
	};
function present(prenom){
	alert(prenom+' est présent');	
	};
			