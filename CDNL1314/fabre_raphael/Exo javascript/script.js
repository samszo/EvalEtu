function presentliste(etu){
<<<<<<< HEAD
	var dl = document.getElementById("lst"); 

	var liste = document.createElement("div");
		liste.setAttribute('class', 'listeP');
		liste.innerHTML = etu.prenom+' '+etu.nom+' '+etu.diplome+' est présent';
	dl.appendChild(liste);
=======
	var dl = document.getElementById('lst');
	var liste = document.createElement("div");
		liste.setAttribute('class', 'listeP');
		liste.innerHTML = etu.prenom+' '+etu.nom+' '+etu.diplome+' est présent';
		dl.appendChild(liste);
>>>>>>> 4fa0a997df330bf8aae40f8f58665eca57e169ce
	
	
};

function absentliste(etu){
	var dl = document.getElementById('lst');

	var dl = document.getElementById("lst"); 
	var liste = document.createElement("div");
		liste.setAttribute('class', 'listeA');
		liste.innerHTML = etu.prenom+' '+etu.nom+' '+etu.diplome+' est absent';
<<<<<<< HEAD
	dl.appendChild(liste);
=======
		dl.appendChild(liste);
>>>>>>> 4fa0a997df330bf8aae40f8f58665eca57e169ce
	
	
};



function showEtu(arr){
	var i=0;
	arr.forEach(function(etu){

		var d=document.createElement("div");
		d.setAttribute('class', 'etu');
		d.innerHTML = etu.prenom+' '+etu.nom+' '+etu.diplome;
		document.body.appendChild(d);
		
		var presImg = document.createElement("img");
			presImg.setAttribute('src', 'present.jpg');
			presImg.setAttribute('alt', 'présent');
			presImg.setAttribute('title', 'présent');
			presImg.setAttribute('id', 'present'+i);
		presImg.addEventListener("click", function(){presentliste(etu)});
		d.appendChild(presImg);

		var absImg = document.createElement("img");
			absImg.setAttribute('src', 'absent.jpg');
			absImg.setAttribute('alt', 'absent');
			absImg.setAttribute('title', 'absent');
			absImg.setAttribute('id', 'absent');
			absImg.addEventListener("click", function(){absentliste(etu)});
		d.appendChild(absImg);

		i++;
	});
};