
<?php
if(isset($_POST['data'])){

	$base = mysql_connect ('localhost', 'root', '');  
 	mysql_select_db ('evaletu', $base) ;  
	$sql="INSERT INTO historique (raison,cours,date,etudiant)VALUES (".$_POST['data'].",'".$_POST['cours']."','".date('h:i:s')."','".$_POST['name']."')";
	$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
    mysql_close ();
}









  ?>