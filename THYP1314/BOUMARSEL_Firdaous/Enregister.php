<script src="jquery.min.js" ></script>
<script>
	function presentliste(etu){
		var dl = document.getElementById("lst"); 

		//AJOUTE DANS LA BASE
		$.get("ecrire.php"
				, {nom:etu.nom,cours:'LangagesWeb',raison:1},
				 function(message){
					var liste = document.createElement("div");
					liste.setAttribute('class', 'listeP');
					liste.innerHTML = message;
					dl.appendChild(liste);
				});
		
	};

	function absentliste(etu){

		var dl = document.getElementById("lst"); 
		var liste = document.createElement("div");
			liste.setAttribute('class', 'listeA');
			liste.innerHTML = etu.nom+' est abscent.';//etu.prenom+' '+etu.nom+' '+etu.diplome+' est absent';
		dl.appendChild(liste);
		
		
	};	
		function showRSS(url)
		{
			//merci à http://stackoverflow.com/questions/10943544/how-to-parse-a-rss-feed-using-javascript
			$.ajax({
				  url      : document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=100&callback=?&q=' + encodeURIComponent(url),
				  dataType : 'json',
				  success  : function (data) {
				    if (data.responseData.feed && data.responseData.feed.entries) {
				      $.each(data.responseData.feed.entries, function (i, e) {
				        console.log("------------------------");
				        console.log("image      : " + e.mediaGroups[0].contents[0].url);
				        console.log("title      : " + e.title);
				        console.log("author     : " + e.author);
				        console.log("description: " + e.description);
				        var oEtu = {nom:e.title,url:e.mediaGroups[0].contents[0].url};
				        showEtu(oEtu);
				        
				      });
				    }
				  }
				});
			console.log('FIN showRSS');
		}
		
		function showEtu(etu){
			var d=document.createElement("div");
			d.setAttribute('class', 'etu');
			d.innerHTML = etu.nom;
			document.body.appendChild(d);
			
			var tof = document.createElement("img");
			tof.setAttribute('src', etu.url);
			tof.setAttribute('class','photo');
			tof.setAttribute('width','150');
			tof.setAttribute('height','150');
			tof.setAttribute('alt', etu.nom);
			tof.setAttribute('title', etu.nom);
			tof.addEventListener("click", function(){presentliste(etu)});
			d.appendChild(tof);
		
			var presImg = document.createElement("img");
				presImg.setAttribute('src', 'img/present.jpg');
				presImg.setAttribute('alt', 'présent');
				presImg.setAttribute('title', 'présent');
			presImg.addEventListener("click", function(){presentliste(etu)});
			d.appendChild(presImg);
		
			var absImg = document.createElement("img");
				absImg.setAttribute('src', 'img/absent.jpg');
				absImg.setAttribute('alt', 'absent');
				absImg.setAttribute('title', 'absent');
				absImg.addEventListener("click", function(){absentliste(etu)});
			d.appendChild(absImg);

			
		};		
	</script>
	<form>
			<select onchange="showRSS(this.value)">
				<option value="">Selectioner un diplôme</option>
				<option value="https://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr">THYP 1314</option>
				<option value="https://picasaweb.google.com/data/feed/base/user/102961656570003949802/albumid/5931541532695278433?alt=rss&kind=photo&authkey=Gv1sRgCIvvqZ33v-voFA&hl=fr">CDNL 1314</option>
			</select>
		</form>
		<div id="rssOutput"></div>
		<div id="lst" ></div>
		<!-- Merci Mr.Samuel  -->