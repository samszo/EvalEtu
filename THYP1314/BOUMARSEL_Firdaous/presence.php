<?php
include 'php/dbconfig.php';


if (isset($_POST['id_etudiant']))
		{
				
				$id_etudiant = $_POST['id_etudiant'];
		}
		
if (isset($_POST['type']))
		{
				$champs = $_POST['type'];
		}

function add($id_etudiant, $type){
  $ret = array();
  try{
    $db = new DBConnection();
    $db->getConnection();
    $sql = "insert into `fboumarsel_presence` (`idEtudiant`, `type`) values ('"
      .$id_etudiant."', '"
      .$type."')";
    //echo($sql);
		if(mysql_query($sql)==false){
      $ret['IsSuccess'] = false;
      $ret['Msg'] = mysql_error();
    }else{
      $ret['IsSuccess'] = true;
      $ret['Msg'] = 'add success';
      $ret['Data'] = mysql_insert_id();
    }
	}catch(Exception $e){
     $ret['IsSuccess'] = false;
     $ret['Msg'] = $e->getMessage();
  }
  return $ret;
}
?>