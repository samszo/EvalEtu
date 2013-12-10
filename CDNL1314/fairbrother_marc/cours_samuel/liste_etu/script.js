function showEtu(etu){
	var arrEtu = [{prenom:'Marc',nom:'Fairbrother',diplome:'CDNL'},{prenom:'Olivier',nom:'Chapelet',diplome:'CDNL'}];
	arrEtu.forEach(function(etu){
		document.write('<div class="etu">'+etu.prenom+' '+etu.nom+'</div>');
		function presMessage(){
			alert(etu.prenom+' '+etu.nom+' est présent');
		};
		var presImg = document.createElement("img");
			presImg.setAttribute('src', 'present.jpg');
			presImg.setAttribute('alt', 'présent');
			presImg.setAttribute('title', 'présent');
			presImg.setAttribute('class', 'present');
			presImg.addEventListener('click', presMessage);
		document.body.appendChild(presImg);
		function absMessage(){
			alert(etu.prenom+' '+etu.nom+' est absent');
		};
		var absImg = document.createElement("img");
			absImg.setAttribute('src', 'absent.jpg');
			absImg.setAttribute('alt', 'absent');
			absImg.setAttribute('title', 'absent');
			absImg.setAttribute('class', 'absent');
			absImg.addEventListener('click', absMessage);
		document.body.appendChild(absImg);
	});
};