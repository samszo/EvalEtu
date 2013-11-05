<?php 



?>
<html>
	<head>
		<title>Appels</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
				
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
		<script type="text/javascript">
 
		$(function() {
		$(".submit").click(function() {

			/* VALUES */
	
		
		  var nom = $(this).attr("name");
		  
		  var raison= $(this).attr("title");
		  var cours="Hypermedia";
		  
		  
 
			var data=  'nom='+ nom+'&raison='+ raison +'&cours='+ cours;

 
			if(nom==''||raison=='' || cours=='') {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			
			} else {
			$.ajax({
			type: "POST",
		    url: "connexion.php",
		    data: data,
		    	success: function(){
					$('.success').fadeIn(200).show();
		    		$('.error').fadeOut(200).hide();
				
		   		}
			});
				}
		   return false;
			}); 
 
 
 
		});
		</script>
	</head>
	<body >
	
	
	
<form  enctype="multipart/form-data" method="post"  name="form" >
	<table align="center" border="6">
    <?php 
$cours="mmm";
 if($flux = simplexml_load_file('http://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr'))
{
$donnee = $flux->channel;
$etudiants = Array();


   foreach($donnee->item as $valeur)
   {
  $nom=$valeur->title;
   		
   
 
       
   		echo "<tr> <td ><img  src='".$valeur->enclosure['url']."' width='40%' height='40%' />$valeur->title</td>";
   		
   		
   		echo"<td><img src='present.png' id='absent' name='$nom' title='Present' type='submit'   class='submit'/> </td>";
   		echo"<td><img src='absent.png' id='absent' name='$nom' title='Absent' type='submit'   class='submit'/> </td>";
   		echo"<td><img src='retard.png' id='absent' name='$nom' title='Retard' type='submit'   class='submit'/> </td>";
   		echo"<td><img src='excuse.png' id='absent' name='$nom' title='Excuse' type='submit'   class='submit'/> </td></tr>";
              


   }
}else echo 'Erreur de lecture du flux RSS';


?>
	</table> 
	</form>
	
	</body>
	</html>