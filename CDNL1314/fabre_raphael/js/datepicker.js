
function () {
	$( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/y' }).val();
	alert('youhou');
};

 function traiterdate () {

$( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/y' }).val();



alert('youhou');


jour = dateddmmyy.substr(0,2)
mois = dateddmmyy.substr(3,2)
annee = dateddmmyy.substr(6,2)

/* alert(jour);
alert(mois);
alert(annee);
alert(dateddmmyy); */

if (annee < 14) {

jourstotal= mois*29,5 + jour - 6;
semaine = jourstotal / 7 ;
// alert(jourstotal);
semainechaine = '"'+semaine+'"';
// alert(semainechaine);
semaineronde = semainechaine.substr(1,2);
// alert(semaineronde);
semainescrollto = "'" + "#" + "sem" + annee + '_' + semaineronde + "'";
alert(semainesscrollto);
};


 






/* var el = $('body');
var search = aujourdhui;
var replace = '<p id="bleu">' + search + '</p>';
var text = el.html();

text = text.split(search).join(replace);

$('body').html(text);
*/






// .offset().top 