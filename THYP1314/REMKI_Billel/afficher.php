<?php
	if (isset($_POST['id']))
	{
		// on recupere l identifiant du cours
		$id = $_POST['id'];
	}		
	if (isset($_POST['name']))
	{
		// on recupere le nom du cours
		$name = $_POST['name'];
	}
	else{$name="vide";}
?>

<?php
	include_once 'Personne.php';

	$id_etudiant=1;
	// lecture d'un flux RSS 
	$handle = fopen("http://picasaweb.google.com/data/feed/base/user/112537161896190034287/albumid/5931538032377292977?alt=rss&kind=photo&authkey=Gv1sRgCJjJwc265LnxigE&hl=fr", "rb");

	// buffer contenant les données du flux
	$flux = '';

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
        
	    
        //retourne la position de la chaine en paramètre dans une chaine
        $linkPosition = stripos($element->description, "src");
        
        //couper la chaine de caractère à partir de la position indiqué
        $link = substr($element->description, $linkPosition);
        
        //on les découpe selon notre ...
        $trueLink = explode('</a>', $link);
		
        
		$desc = utf8_decode((string)$element->title);
		$presence=0;
		$absence=0;
		$personne[] = new Personne($desc,$trueLink,$presence,$absence);
	} 	
}
?>


<table>
	<h2>Liste des étudiants participants au cours de <?php echo($name);?><a href="#" id="hideBlock"><img src="images/hide.png"></a></h2>

	<tr>
	
	<?php

		$connexion=mysqli_connect("localhost","root","","planning");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
	?>
	<?php 
		$nb=0;
		foreach($personne as $p){
	?>
    
			<td  align="center" CELLPADDING="10">
			<div id="etudiant<?php echo ($id_etudiant)?>">
				<?php 
					$identite = explode(" ", $p->nom);
				?>
				<?php 
					if (empty($identite[0])) {  $identite[0]="vide";}
				?>
				<?php 
					if (empty($identite[1])) { $identite[1]="vide";}
				?>
				<?php
					mysqli_query($connexion,"INSERT INTO etudiants (id_etudiant, nom, prenom) VALUES ($id_etudiant, '$identite[0]','$identite[1]')");
					$nb+=1;
				?>
			<table height="100"><tr><td align="center">
			<img class="photo" <?php echo $p->img[0];?>
    
			<p> Nom : <?php if (!empty($identite[1])) {  echo utf8_encode($identite[0]);}?></p>
			<p> Prenom : <?php if (!empty($identite[1])) {echo utf8_encode($identite[1]);}?></p>
		
			
			<a href="#0" id="etudiant_present" name="<?php echo $id_etudiant ?> "onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>','present')";> 
			<img src="images/present.png" onmouseover="this.src='images/present2.png';" onmouseout="this.src='images/present.png';"></a>
		
			<a href="#0" id="etudiant_absent" name="<?php echo $id_etudiant ?> "onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'absent')";> 
			<img src="images/absent.png" onmouseover="this.src='images/absent2.png';" onmouseout="this.src='images/absent.png';"></a>
		
			<a href="#0" id="etudiant_justifie" name="<?php echo $id_etudiant ?> "onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'justifie')";> 
			<img src="images/Justifie.png" onmouseover="this.src='images/Justifie2.png';" onmouseout="this.src='images/Justifie.png';"></a>
		
			<a href="#0" id="etudiant_retard" name="<?php echo $id_etudiant ?> "onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'retard')";> 
			<img src="images/retard.png" onmouseover="this.src='images/retard2.png';" onmouseout="this.src='images/retard.png';"></a>
			</td></tr></table>
			<p id="nbre_presences"></p>
			
			</td>
			<!-- On affiche 4 étudiant et on saute de ligne -->
			<?php if($nb%4==0){echo '</tr><tr>';}?>
			</div>
		<?php $id_etudiant = $id_etudiant+1; ?>
		<?php 
		}
		?>
	</tr>
</table>

<?php mysqli_close($connexion); ?>
 <!-- Script qui cache la liste des étudiants à l'aide du bouton Hide -->
 <script type="text/javascript">
    $(function(){

       $('#hideBlock').click(function(e){
           e.preventDefault;
           $('#studentsInfo').fadeOut(1000);
       });
    });
</script>

<!-- Envois les info nécessaire pour le fichier faire_l_appel.php pour marqué l'assiduité -->
<script type="text/javascript">
	function appel(id_matiere, id_etudiant, champs){
   
      $.post('faire_l_appel.php', {id_matiere:id_matiere, id_etudiant:id_etudiant, champs:champs}, function(data){
			 $("#etudiant"+id_etudiant).children( "#nbre_presences" ).html(data);
					
	  });
}
</script>