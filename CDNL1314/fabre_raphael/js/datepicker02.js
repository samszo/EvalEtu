	 $(function() {
$( "#datepicker" ).datepicker({ dateFormat: 'dd/mm/y' }).val();
alert('hello');	

});




function traiterdate () {

var dateddmmyy = window.document.getElementById("datepicker").value; 
alert(date);

jour = dateddmmyy.substr(0,2)
mois = dateddmmyy.substr(3,2)
annee = dateddmmyy.substr(6,2)

alert('jour numero ' jour);
alert(' mois numero 'mois);
alert('anne 'annee);


};


/*

alert('youhou');


jour = dateddmmyy.substr(0,2)
mois = dateddmmyy.substr(3,2)
annee = dateddmmyy.substr(6,2)

alert('jour numero ' jour);
alert(' mois numero 'mois);
alert('anne 'annee);
alert(' date ddmmyy : 'dateddmmyy); 

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

};


