 <table >

<?php

	
if($donnee = simplexml_load_file('http://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr')->channel)
{


   foreach($donnee->item as $valeur)
    {

                   
   
 
       
                   echo "<tr> <td ><img title='$valeur->title' style='padding: 5px; height: 235' src='".$valeur->enclosure['url']."'/></td>";
                   
                   
                   echo"<td><img src='image/present.png' id='absent'  title='Present' /> </td>";
                   echo"<td><img src='image/absent.png' id='absent' title='Absent' /> </td>";
                   echo"<td><img src='image/retard.png' id='absent'  title='Retard' /> </td>";
                   echo"<td><img src='image/excuse.png' id='absent'  title='Excuse' /> </td></tr>";
              


   }
}else echo 'Erreur de lecture du flux RSS';


		
	
	
	

?>

</table>