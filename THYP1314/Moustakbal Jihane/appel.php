<?php


if (isset($_POST['id_etudiant']))
		{
				
				$id_etudiant = $_POST['id_etudiant'];
		}
if (isset($_POST['id_matiere']))
		{
				
				$id_matiere = $_POST['id_matiere'];
		}		
if (isset($_POST['champs']))
		{
				$champs = $_POST['champs'];
		}

$connexion=mysqli_connect("localhost","root","","planning-jihanem");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }	

  
mysqli_query($connexion,"INSERT INTO presence (Ideleve, Idcours, present, abscent , retard , justifie) VALUES ($id_etudiant, '$id_matiere',0,0,0,0)");
$result = mysqli_query($connexion,"SELECT * FROM presence WHERE Ideleve=$id_etudiant AND Idcours='$id_matiere'");
$row = mysqli_fetch_array($result);
$tmp=$row[$champs]+1;
mysqli_query($connexion,"UPDATE presence SET $champs=$tmp WHERE Ideleve=$id_etudiant AND Idcours='$id_matiere'");
echo ("<br>");
$result = mysqli_query($connexion,"SELECT * FROM presence WHERE Ideleve=$id_etudiant AND Idcours='$id_matiere'");
$row = mysqli_fetch_array($result);
echo  "<p>
	   Pr&eacute;sences : " . $row['present'] . "<br>" .
	   "Absences : "  . $row['abscent'] . "<br>" .
	   "retard : " . $row['retard'] . "<br>" .
	   "justifie : " . $row['justifie'] . "</p>";

/*while($row = mysqli_fetch_array($result))
  {
  	
  echo  "<p>
	   Pr&eacute;sences : " . $row['present'] . "<br>" .
		"Absences : "  . $row['abscent'] . "<br>" .
		"retard : " . $row['retard'] . "<br>" .
		"justifie : " . $row['justifie'] . "</p>";

  
  }*/
  
mysqli_close($connexion);


?>