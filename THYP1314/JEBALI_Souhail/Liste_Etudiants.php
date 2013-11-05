<html>
<head>
 <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
 

</head>



<?php 
if (isset($_POST['id']))
		{
				// Instructions si $_POST['truc'] existe
				$m = $_POST['id'];
		}		
if (isset($_POST['name']))
		{
				// Instructions si $_POST['truc'] existe
				$name = $_POST['name'];
		}		

		if (isset($_POST['prof']))
		{
				// Instructions si $_POST['truc'] existe
				$prof = $_POST['prof'];
		}
		if (isset($_POST['date']))
		{
				// Instructions si $_POST['truc'] existe
				$date = $_POST['date'];
		}
?>


<?php
include_once 'Personne.php';

// lecture d'un flux RSS 
$handle = fopen("http://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr", "rb");

// buffer contenant les données du flux
$flux = '';
$id_etudiant=1;

// si la lecture du flux RSS est ok
if (isset($handle) && !empty($handle)) {
    while (!feof($handle)) {
		
    // on charge les données de notre flux RSS par paquet
    $flux .= fread($handle, 4096);
    }

    // test avec la classe SimpleXML
    // on construit notre parser RSS avec notre flux RSS
    $RSS2Parser = simplexml_load_string($flux);

    // on se positionne sur la balise (racine de notre flux RSS)
    $racine = $RSS2Parser->channel;

    // pour chaque item
    foreach($racine ->item as $element) {
        
        /*var_dump($element->description);
        die();*/
        
        //retourne la position de la chaine en paramètre dans une chaine
        $linkPosition = stripos($element->description, "src");
        
        //couper la chaine de caractère à partir de la position indiqué
        $link = substr($element->description, $linkPosition);
        
        //on les découpe selon notre ...
        $trueLink = explode('</a>', $link);
		
        
		
		$desc = utf8_decode((string)$element->title);
		$presence=0;
		$abscence=0;
		$personne[] = new Personne($desc,$trueLink,$presence,$abscence);
		
		
    } 	
    
    /*echo "<h2>Liste des étudiants participants</h2>";
    var_dump($personne);
    die();*/
}
?>
<body>
	<hr>
		<h2> Matière : <?php  echo ($name); ?> 
				<br/>
				Prof : <?php  echo ($prof); ?> <br/>
				Date : <?php  echo ($date); ?> <br/>	

		</h2>

		<a href="#" id="hideBlock"><img src="hide.png"></a>

	<hr/>

<?php

$connexion=mysqli_connect("localhost","root","","planning_thyp1314");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }	
foreach($personne as $p){ 
		
?>

    <div >
		<table>
		
		<?php $identite = explode(" ", $p->nom);
		if (empty($identite[1])) { $identite[0]=="";} 
		if (empty($identite[1])) {$identite[1]="";}
		
	
		//Requête SQL pour écrire la relation element <--> document
		mysqli_query($connexion,"INSERT INTO etudiants (id_etudiant, nom, prenom, age) VALUES ($id_etudiant, '$identite[0]','$identite[1]',22)");
		
		?>
		<tr > 			
			<td class="td_img_Etudiant">
					<img <?php echo $p->img[0];?> 			
			</td>
			
			<td  class="td_info_Etudiant" id= "Etudiant<?php echo ($id_etudiant)?>" > 
				<p> Nom : <?php if (!empty($identite[1])) {  echo utf8_encode($identite[0]);}?> <br/>
					Prenom : <?php if (!empty($identite[1])) {echo utf8_encode($identite[1]);}?></p>
				<p id="nbre_presences">
				
				<?php
				echo ("<br>");
				$result = mysqli_query($connexion,"SELECT * FROM assiduite WHERE IdEtudiant='$id_etudiant' AND IdMatiere='$m'");
				while($row = mysqli_fetch_array($result))
  {
	
	
	
  echo "Id Etudiant : " . $row['IdEtudiant'] . "<br/>" . " Id Cours : " . $row['IdMatiere'] . " <br/><br/> " . "Nbre Pr&eacute;sences : " . $row['presences'] . "<br>" ." Nbre Abscences : "  . $row['abscences']
  ."<br>" ." Nbre Abscences justifi&eacute;es : "  . $row['justifie'] . "<br>" ." Nbre de retards : "  . $row['retard']; echo "<br>";
  }
				?>
				</p>
				<!-- <div id="nbre_presences" > Présence :  0</div> -->
			</td>
		</tr>
		</table>
		<table>
			<tr>
				<td class = "td_bouton">
					<p  id="nbre_absences"> </p>
					
						<a href="#0" id="btn_present" class= "bouton_appel" name="<?php echo $id_etudiant ?> "onClick="Presence('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>','presences')";> 
						<img src="1.png" onmouseover="this.src='11.png';" onmouseout="this.src='1.png';"></a>
		
						<a href="#0" id="btn_abscent" class= "bouton_appel" name="<?php echo $id_etudiant ?> "onClick="Presence('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'abscences')";> 
						<img src="2.png" onmouseover="this.src='22.png';" onmouseout="this.src='2.png';"></a>
		
						<a href="#0" id="btn_justifie" class= "bouton_appel" name="<?php echo $id_etudiant ?> "onClick="Presence('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'justifie')";> 
						<img src="3.png" onmouseover="this.src='33.png';" onmouseout="this.src='3.png';"></a>
					
						<a href="#0" id="btn_abscent" class= "bouton_appel" name="<?php echo $id_etudiant ?> "onClick="Presence('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'retard')";> 
						<img src="4.png" onmouseover="this.src='44.png';" onmouseout="this.src='4.png';"></a>
						</a>		
						</br>
					</p>  		
				</td>
			</tr>
		</table>
        
    </div>
     <?php $id_etudiant = $id_etudiant+1; ?>
<?php 
	}
 mysqli_close($connexion);
?>

 
 

 <script type="text/javascript">
    $(function(){

       $('#hideBlock').click(function(e){
           e.preventDefault;
           $('#studentsInfo').fadeOut(1000);
       });
    });
	
</script>


<script type="text/javascript">
	function Presence(id_matiere, id_etudiant, champs){
    // $("#btn_present").click(function(){
	//var id_etudiant = $(this).attr('name');
	//alert (<?php  echo ($m); ?>);
        		
      $.post('abscence.php', {id_matiere:id_matiere, id_etudiant:id_etudiant, champs:champs}, function(data){
			 $("#Etudiant"+id_etudiant).children( "#nbre_presences" ).html(data);
					
	  });
    //});
}
</script>
</body>
</html>