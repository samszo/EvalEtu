<?php
global $arraydays;
$arraydays = array("Monday","Tuesday", "Wednesday", "Thursday","Friday");
/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function numero_de_semaine($date) {
	list($day, $month, $year) = explode('/', $date);
	return (date('W', mktime(0, 0, 0, $month, $day, $year)) * 1);
}

/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function get_day($day, $week,$year) {
	$week = sprintf('%02d',$week);
	$start = strtotime($year.'W'.$week);
	return date("d/m/Y",strtotime($day,$start));
}

function get_year($date) {
	list($day, $month, $year) = explode('/', $date);
	return (date('Y', mktime(0, 0, 0, $month, $day, $year)) * 1);
}

/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function jour_du_cours($date) {
	$semaine = array(1=>"Lun", 2=>"Mar", 3=>"Mer", 4=>"Jeu", 5=>"Ven", 6=>"Sam", 7=>"Dim");
	list($day, $month, $year) = explode('/', $date);
	return $semaine[date('N', mktime(0, 0, 0, $month, $day, $year)) * 1];
}

/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function heure_du_cours($hd){
	switch ($hd) {
		case (strtotime("09:00:00") <= strtotime($hd) && strtotime($hd) < strtotime("12:00:00")) : return 0;
		case (strtotime("12:00:00") <= strtotime($hd) && strtotime($hd) < strtotime("15:00:00")) : return 1;
		case (strtotime("15:00:00") <= strtotime($hd) && strtotime($hd) < strtotime("18:00:00")) : return 2;
		default : return -1;
	}
}

/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function formatage_des_donnees($week, $array, $data) {
	//echo '<pre>', print_r ($data, true), '</pre>';
	$day = array('Lun','Mar','Mer', 'Jeu', 'Ven');
	if(array_key_exists(get_year($data['date']), $array)){
		if(array_key_exists($week, $array[get_year($data['date'])])){
			if(array_key_exists(heure_du_cours($data[hd]), $array[get_year($data['date'])][$week])){
				if(array_key_exists(jour_du_cours($data['date']), $array[get_year($data[date])][$week][heure_du_cours($data[hd])])){
					$array[get_year($data['date'])][$week][heure_du_cours($data[hd])][jour_du_cours($data['date'])] = $data;
				}	
			}
		} else {
			$array[get_year($data['date'])][$week] = array();
			for($i = 0; $i < 3; $i++){
				$array[get_year($data[date])][$week][$i] = array();
				for($j = 0; $j < 5; $j++){
					$array[get_year($data['date'])][$week][$i][$day[$j]] = ($week == numero_de_semaine($data['date']) && $i == heure_du_cours($data[hd]) && $day[$j] == jour_du_cours($data['date'])) ? $data : array();
				}
			}
		}		
	} else {
		$array[get_year($data['date'])][$week] = array();
		for($i = 0; $i < 3; $i++){
			$array[get_year($data['date'])][$week][$i] = array();
			for($j = 0; $j < 5; $j++){
				$array[get_year($data['date'])][$week][$i][$day[$j]] = ($week == numero_de_semaine($data['date']) && $i == heure_du_cours($data[hd]) && $day[$j] == jour_du_cours($data[date])) ? $data : array();
			}
		}
	}
	return $array;
}

/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function changement_la_cle($find, $array) {
	$arr = array();
	for($i = 0; $i < count($array); $i++)
		$arr[mb_strtolower($find[$i])] = $array[$i];
	return $arr;
}

/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function recuperation_des_donnees($file, $data){
	// Ouverture en lecture
	if($fp = fopen($file,"r")) {
		// Extraction d'une ligne
		while ($ligne = fgets($fp)) {
			$tableau = explode("\r", $ligne);
			// Extraction des champs
			foreach($tableau as $element) {
				// Ajout des donnée de chaque ligne du fichier dans le tableau
				array_push($data, explode(";", $element));
			}
		}
		// Fermeture fichier
		fclose ($fp);
	} else {
		// Message d'erreur
		echo "Ouverture impossible.";
	}
	// Retourne les données sous forme d'un tableau
	return $data;	
}

/**
 * Fonction retournant le numéro de la semaine en fonction de la date au format français (JJ/MM/AAAA)
 * @param string $date Date au format français (JJ/MM/AAAA)
 * @return integer Numéro de semaine
 */
function transformation_des_donnees($data){
	$outdata = array();
	foreach ($data as $key =>$value){
		if($key != 0){
		 	$outdata = formatage_des_donnees(numero_de_semaine($data[$key][0]), $outdata, changement_la_cle($data[0], $data[$key]));
		}
	}
	return $outdata;
}
 
?>