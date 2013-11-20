function presMessage(etu){
	alert(etu.prenom+' '+etu.nom+' est présent');
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
<<<<<<< HEAD
function showEtu(etu){
	arrEtu.forEach(

		function(etu){
		document.write('<div class="etu">'+etu.prenom+' '+etu.nom+'</div>');

		

=======
function showEtu(arr){
	var i=0;
	arr.forEach(function(etu){
		var d=document.createElement("div");
		d.setAttribute('class', 'etu');
		d.innerHTML = etu.prenom+' '+etu.nom+' '+etu.diplome;
		document.body.appendChild(d);
		
>>>>>>> b23d082a2956430f5162a4d927398a45c3297289
		var presImg = document.createElement("img");
			presImg.setAttribute('src', 'present.jpg');
			presImg.setAttribute('alt', 'présent');
			presImg.setAttribute('title', 'présent');
<<<<<<< HEAD
			presImg.setAttribute('id', 'present');
			document.body.appendChild(presImg);

			
=======
			presImg.setAttribute('id', 'present'+i);
		presImg.addEventListener("click", function(){presMessage(etu)});
		d.appendChild(presImg);
>>>>>>> b23d082a2956430f5162a4d927398a45c3297289
		var absImg = document.createElement("img");
			absImg.setAttribute('src', 'absent.jpg');
			absImg.setAttribute('alt', 'absent');
			absImg.setAttribute('title', 'absent');
			absImg.setAttribute('id', 'absent');
			document.body.appendChild(absImg);
		i++;
	});
};