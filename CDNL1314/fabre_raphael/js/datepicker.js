
 $(function() {



 	
var dateddmmyy = $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/y'  }).val();




});




function traiterdate () {




var dateddmmyy = $( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/y' }).val();

jour = dateddmmyy.substr(0,2)
mois = dateddmmyy.substr(3,2)
annee = dateddmmyy.substr(6,2)

/*alert(jour);
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
// alert(scrollto);




};

 






var el = $('body');
var search = aujourdhui;
var replace = '<p id="bleu">' + search + '</p>';
var text = el.html();

text = text.split(search).join(replace);

$('body').html(text);




};


function scrollto () {
	$("html, body").animate({ scrollTop: $('#sem13_45').offset().top }, 1000, "easeInOutQuint");


};


// .offset().top 