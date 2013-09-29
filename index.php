<?php 
require_once 'lire.php';
$options = getCours();
?>
<html>
	<head>
		<title>Evaluation des étudiants</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" href="css/etunote.css" />
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/d3.v3.min.js"></script>
		<script type="text/javascript" src="js/etunote.js"></script>
	</head>
	<body >		
	<?php 
    $xml = simplexml_load_file("https://picasaweb.google.com/data/feed/base/user/113848708930851956597/albumid/5795380358275112865?alt=rss&kind=photo&hl=fr");
	//local
	//$xml = simplexml_load_file("http://localhost/trombino/trombino/data/5795380358275112865.xml");
	
	$i=0;
	//foreach ($xml->photo as $item){
	foreach ($xml->channel->item as $item){
		if($i % 2 == 0) $c = 'good'; else $c = 'bad'; 
		
		//$id = $item['id']."";
		//$toto = $item->titi."";
		
		echo "<div id='etu_".$i."' class='conteneur' >";
			echo "<div class='bloc' >";
				echo "<img title='récupérer les notes' src='img/SearchRecord.png' class='btn' onclick='getNote(".$i.")' />";
				echo '<br/><label>Cours : </label>
				<select id="cours_'.$i.'" name="listeCours" id="listeCours">
					<option value=""></option>
					'.$options.'
				</select> 
				<img title="ajouter un cours" src="img/AddRecord.png" class="btn" onclick="ajoutCours('.$i.')" style="vertical-align:middle;" />';
				
				echo "<br/><label>Exercice : </label><br/><input id='exe_".$i."' />";
				echo "<br/><label>Note : </label><input id='note_".$i."' size='3' />";
				echo "<img title='ajouter une note' src='img/AddRecord.png' class='btn' onclick='ajoutNote(".$i.")' style='vertical-align:middle;' />";
				echo "<br/>Moyenne :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total :
				<br/><label class='note' id='moyenne_".$i."' ></label>&nbsp;<label class='note' id='note_total_".$i."' ></label>";
				
			echo "</div>";
			echo "<div class='bloc' >";
				echo "<img id='etu_tof_".$i."' src='".$item->enclosure['url']."' class='tof' onclick='getRaison(".$i.")' />";
				echo "<div class='$c' id='etu_nom_".$i."'>".$item->title."</div>";
			echo "</div>";
			echo "<div class='bloc' >Note pondérée
				<br/><input id='max_".$i."' value='40' size='3' /> sur <input id='sur_".$i."' value='20' size='3' />
				<br/><div class='note' id='note_sur_".$i."'></div>
				</div>";		
			echo "<div id='etu_svg_".$i."' class='bloc' ></div>";
		echo "</div>";
		
		$i++;
	}
	?>
	</body>
</html>
