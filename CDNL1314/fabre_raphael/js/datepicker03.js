

$(function(){
$("#datepicker").datepicker({ dateFormat: 'dd/mm/y' });
});



function traiterdate () {

	var date = window.document.getElementById("datepicker").value; 

var jour = date.substr(0,2);
var mois = date.substr(3,2);
var annee = date.substr(6,2);

//alert(jour);
//alert(mois);
//alert(annee);

		if (annee == 13) {

jourstotal= mois*29,5 + jour - 6;
semaine = jourstotal / 7 ;
//alert(semaine);
semainechaine = '"'+semaine+'"';
//alert(semainechaine);
semaineronde = semainechaine.substr(1,2);
//alert(semaineronde);
semainescrollto =  "sem" + annee + '_' + semaineronde;

semainepix = semaineronde - 38 ;

var gopix = semainepix*500 + 400 ;


};

};




$(document).ready(function() {

	var gopix = 200 ;

	$("html, body").delay( 800 ).animate({ scrollTop: 400 }, 1000, "easeInOutQuint");

	

});
