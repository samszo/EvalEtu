
<?php
global $cours ;
global $cours_date ;
global $cours_heure ;
global $cours_debut ;
$fichier = "planning.csv";
$fic = fopen($fichier, 'rb');
$cpt = 0;

for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {

  $j = sizeof($ligne);
   // $cours[] = new Cours($ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5]);
	$cours[] = new Cours($ligne[2],$ligne[3],$ligne[4],$ligne[5]);
    $cours_date[] = $ligne[6];
	$cours_heure[] = $ligne[0]."--".$ligne[1];
	$cours_debut[] = $ligne[0];

}


function get_semaine($tab_date){
	global $tableau ; global $j;
	for($i=1;$i<sizeof($tab_date);$i++) {
		if ($tab_date[$i]!=$tab_date[$i-1] ) {
		  $tableau[] = $tab_date[$i] ;


		}


	}
	return$tableau ;
}

function get_cours($heure,$cours_debu,$cours){
	 $tableau_cr ;

    unset($tableau_cr);
	for($i=1;$i<sizeof($cours_debu);$i++) {
		if ($cours_debu[$i]==$heure ) {
			$tableau_cr[] = $cours[$i] ;
		}


	}
	return$tableau_cr ;
}




  ?>