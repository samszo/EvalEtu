// JavaScript Document




d3.xml("maquette.svg", "image/svg+xml", function(xml) {
  document.body.appendChild(xml.documentElement);
heure();
ladate();


});
function heure()
{
	temps = new Date;	
	h = temps.getHours();
		if(h<10)
		{
		h = "0"+h;
		}
		m = temps.getMinutes();
		if(m<10)
		{
		m = "0"+m;
		}
	
	
	resultat =  h+':'+m;
	document.getElementById("heure").textContent = resultat;
	setTimeout("heure()",'1000');
}

function ladate()
{
 date = new Date;
annee = date.getFullYear();
moi = date.getMonth() + 1;
j = date.getDate();
jour = date.getDay();


resultat = j+'/'+moi+'/'+annee;
document.getElementById("date").textContent = resultat;
setTimeout("ladate()",'1000');

}
function f_deco()
{
confirm('Voulez-vous vraiment vous déconnecter ?','Deconnexion');

}

