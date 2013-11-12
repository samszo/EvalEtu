<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Planning</title>

</head>
<body>

<table border="2" align="center"><tr>

<?php
$trouve=false;
$file=fopen("Planning_ElFrihmat.csv",'r');

while ($bd=fgetcsv($file)) {


 for ($i=0;$i <count($bd); $i++) {
 	
 	
 	if($i==3)
 	{
 		
                        if($trouve==false)
                        {       
                        echo"<td>$bd[$i]</td>";
                        $trouve=true;
                        }
                        else
                        {
                   echo"<td  ><a href='Student.php'>$bd[$i]</a></td>";
                         }
    }
 	else
 	{
 	echo"<td>$bd[$i]</td>";
 	}
 	
 	if($i==count($bd)-1)
 	{
 		echo"</tr><tr>";
 	}
 	
 }
	
}



?>
</table>
</body>
</html>