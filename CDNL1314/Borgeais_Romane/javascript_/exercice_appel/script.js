function presMessage(etu)

	{
		alert(etu.prenom+' '+etu.nom+' est présent');
	};

function present()

	{
		document.getElementById("present").onclick=presMessage;
	};

function absMessage(etu)

	{
		alert(etu.prenom+' '+etu.nom+' est absent');
	};

function absent()

	{
		document.getElementById("absent").onclick=absMessage;
	};

function showEtu(arr)

	{
		arr.forEach(function(etu)

		{
			var d = document.createElement("div");
			d.setAttribute('class', 'etu');
			d.innerHTML = etu.prenom+' '+etu.nom+' '+etu.diplome;
			document.body.appendChild(d);
		
			var presImg = document.createElement("img");
				presImg.setAttribute('src', 'present.jpg');
				presImg.setAttribute('alt', 'présent');
				presImg.setAttribute('title', 'présent');
				presImg.setAttribute('class', 'present');
				presImg.addEventListener("click", function(){presMessage(etu)});
			d.appendChild(presImg);

			var absImg = document.createElement("img");
				absImg.setAttribute('src', 'absent.jpg');
				absImg.setAttribute('alt', 'absent');
				absImg.setAttribute('title', 'absent');
				absImg.setAttribute('class', 'absent');
				absImg.addEventListener("click", function(){absMessage(etu)});
			d.appendChild(absImg);
		});

};






