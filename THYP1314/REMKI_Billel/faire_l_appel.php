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

	$connexion=mysqli_connect("localhost","root","","planning");

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	mysqli_query($connexion,"INSERT INTO presence (Ideleve, Idcours, present, absent , retard , justifie) VALUES ($id_etudiant, '$id_matiere',0,0,0,0)");
	$result = mysqli_query($connexion,"SELECT * FROM presence WHERE Ideleve=$id_etudiant AND Idcours='$id_matiere'");
	$row = mysqli_fetch_array($result);
	$tmp=$row[$champs]+1;
	mysqli_query($connexion,"UPDATE presence SET $champs=$tmp WHERE Ideleve=$id_etudiant AND Idcours='$id_matiere'");
	echo ("<br>");
	$result = mysqli_query($connexion,"SELECT * FROM presence WHERE Ideleve='$id_etudiant' AND Idcours='$id_matiere'");

	while($row = mysqli_fetch_array($result))
	{
		echo  "Pr&eacute;sences : " . $row['present'] . 
			  "<br>" ." Abscences : "  . $row['absent'] . 
			  "<br>" ." Retard : "  . $row['retard'] .
			  "<br>" ." Justifi&eacute; : "  . $row['justifie'];
		echo "<br>";
	}
	mysqli_close($connexion);

?>

