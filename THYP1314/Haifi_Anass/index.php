
<?php
include_once 'Cours.php';
include_once 'index1.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Planning CDNL 2013 - 2014</title>
           <meta charset="utf-8" />
            <link type="text/css" href="style.css" rel="stylesheet" />
            <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    </head>
    <body>

	<div id="content">
<h1>Planning CDNL 2013 - 2014</h1>


        <div id="divWeeks">
        <h2>Semaine 37 du 21/09/13 au 22/09/13</h2>
         </div>


	<table>
	 <tr>
	 <?php   $date_semaine = get_semaine($cours_date);
    	 ?>
	 <th> Heure </th>
	 <th> Lundi <?php echo($date_semaine[0]); ?> </th>
	 <th> Mardi <?php echo($date_semaine[1]); ?> </th>
	 <th> Mercredi <?php echo($date_semaine[2]); ?> </th>
	 <th> Jeudi <?php echo($date_semaine[3]); ?> </th>
	 <th> Vendredi <?php echo($date_semaine[4]); ?> </th>
	 </tr>



   	 <?php

	  for($j=1;$j<4;$j++) {
	  	 echo("<tr><td class='tdH'>".$cours_heure[$j]."</td>");
	  	$heure = explode("--",$cours_heure[$j]);
	    $cours_t = get_cours($heure[0],$cours_debut,$cours);

		 for($i=0;$i<sizeof($cours_t);$i++) {

	  echo( "<td class='".$cours_t[$i]->unite."'>  ");
	  $v = $cours_t[$i]->unite;?>
	 
	  <div onClick="setcours('<?php echo $v;?>');" >
	   <?php
	 echo("<h3>".$cours_t[$i]->unite ),"</h3>";
	  echo('<h5>'.$cours_t[$i]->objet ),"</h5>";
	 echo('<h4>'.$cours_t[$i]->intervenant ),"</h4>";
	  echo('<h5>'.$cours_t[$i]->lieu ),"</h5>";
		 	echo( "</div>  ");
	  	 echo( "</td>  ");

	    }
	  	unset($cours_t);

	   echo( "</tr>  ");

		unset($heure) ;
	  	 }


	  	?>

</div>



 <div id="studentsInfo">

        </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="findStudents.js"></script>




	 </table>

	</body>
	</html>