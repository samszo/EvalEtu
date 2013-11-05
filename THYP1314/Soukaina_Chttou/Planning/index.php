<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script type="text/javascript" src="find.js"></script>


		

<title>Insert title here</title>
</head>
<body>
<h1 style="text-align:center">Planning - M2THYP 1er semestre 2013/2014</h1>
<?php

$jour = array("Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");

$mois = array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");

$dateDuJour = $jour[date("w")]." ".date("d")." ".$mois[date("n")]." ".date("Y");
echo "<center>$dateDuJour</center></br>";

  
$fichier = "Planning.csv";
$fich = fopen($fichier, 'r');
$k=0;
$r=count(file($fichier));
$trouve=false;
$count=0;
$find=false;
echo "<table  border=6 align='center'cellspacing=10 cellpadding=10 > <tr>";
$cp=0;

  while (($data = fgetcsv($fich, 1024)) ) {

  	$col = count($data); 

 for ($i=0; $i < $col; $i++) {
 	    

        
        	if($i==2)
        	{ 
        	
        		if($trouve==false)
        		{
        		$cp++;	
        		echo"<td style='background:gray'>$data[$i]</td>";
        		
        		
        		$trouve=true;
        		}
        		else
        		{
        	
        	
        
        	
        	        	echo"<td  ><a href='index2.php?cours=".$data[$i]."'><font color='#000000'>$data[$i]</font></a></td>";
        	
        
        		}
        		
        	}
        	else 
        	{
        
 	        if($cp >5)
 	        {
 	        	
        	echo"<td>$data[$i]</td>";
        	
 	        }
 	        else {
 	        	{
 	        	
 	        		echo"<td style='background:gray'>$data[$i]</td>";
 	        		$cp++;
 	        	}
 	        }
        
        	
        
        	}
        	
 	       
        	if($i==$col-1)
        	{
        		
        	echo"</tr><tr>";
        	$find=true;
        
        	}
    
        	
      
        }
    }



    
echo "</tr></table>";


?>


</body>
</html>