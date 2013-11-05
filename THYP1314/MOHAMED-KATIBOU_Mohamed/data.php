<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Emploi du temps</title>
</head>
<?php
	include "module.inc.php";
	echo '<pre>', print_r (transformation_des_donnees(recuperation_des_donnees("edt.csv", array())), true), '</pre>';
?>
<body>
</body>
</html>