<?php


if (isset($_POST['id_etudiant']))
		{
				// Instructions si $_POST['truc'] existe
				$id_etudiant = $_POST['id_etudiant'];
		}
		
	//echo ($id_etudiant);	

if (isset($_POST['id_matiere']))
		{
				// Instructions si $_POST['truc'] existe
				$id_matiere = $_POST['id_matiere'];
		}		
		

if (isset($_POST['champs']))
		{
				// Instructions si $_POST['truc'] existe
				$champs = $_POST['champs'];
		}
/*
echo ($id_matiere);
echo ('     ');
echo ($id_etudiant);
echo "    bouton : " . $champs;
*/

//connexion à la base de donnée
$connexion=mysqli_connect("localhost","root","","planning_thyp1314");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }	

mysqli_query($connexion,"INSERT INTO assiduite (IdEtudiant, IdMatiere, presences, abscences) VALUES ($id_etudiant, '$id_matiere',0,0)");

// extraction de la ligne de valeurs pour l'étudiant et la matière dont il assiste 
$result = mysqli_query($connexion,"SELECT * FROM assiduite WHERE IdEtudiant=$id_etudiant AND IdMatiere='$id_matiere'");

$row = mysqli_fetch_array($result);
  
// incrémentation de la valeur du champs concerné
//echo "<br>" . $champs . ":" . $row[$champs];
$tmp=$row[$champs]+1;
	
	
  //echo $row['IdEtudiant'] . " " . $row['IdMatiere'] . " " . $row['nbre_presence'] . " " .$row['nbr_abscence'];
 // echo "<br>";
  

  // mise à jours de la valeur du champs concerné
mysqli_query($connexion,"UPDATE assiduite SET $champs=$tmp WHERE IdEtudiant=$id_etudiant AND IdMatiere='$id_matiere'");

echo ("<br>");


$result = mysqli_query($connexion,"SELECT * FROM assiduite WHERE IdEtudiant='$id_etudiant' AND IdMatiere='$id_matiere'");

while($row = mysqli_fetch_array($result))
  {
	
	
	
  echo "Id Etudiant : " . $row['IdEtudiant'] . "<br/>" . " Id Cours : " . $row['IdMatiere'] . " <br/><br/> " . "Nbre Pr&eacute;sences : " . $row['presences'] . "<br>" ." Nbre Abscences : "  . $row['abscences']
  ."<br>" ." Nbre Abscences justifi&eacute;es : "  . $row['justifie'] . "<br>" ." Nbre de retards : "  . $row['retard']; echo "<br>";
  }

mysqli_close($connexion);

?>


