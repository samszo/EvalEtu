
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
}
?>

<hr/>
<h2>Liste des étudiants participants au cours de <?php echo($name);?></h2>
<hr/>

<table>

	<tr height="400">
	
	<?php

$connexion=mysqli_connect("localhost","root","","planning");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }	?>
		<?php 
		$nb=0;
		foreach($personne as $p){
		 ?>
    
	<td  CELLPADDING="10" >
	<div style="height:500px;" id="etudiant<?php echo ($id_etudiant)?>">
		
		
			<?php $identite = explode(" ", $p->nom);?>
			<?php if (empty($identite[0])) {  $identite[0]="vide";}?>
			<?php if (empty($identite[1])) { $identite[1]="vide";}?>
			<?php
			mysqli_query($connexion,"INSERT INTO etudiants (id_etudiant, nom, prenom) VALUES ($id_etudiant, '$identite[0]','$identite[1]')");
			$nb+=1;?>
	
	
       <img class="photo" <?php echo $p->img[0];?>
    
		
		<p> Nom : <?php if (!empty($identite[1])) {  echo $identite[0];}?></p>
        <p> Prenom : <?php if (!empty($identite[1])) {echo $identite[1];}?></p>
		
		<a href="#0" id="etudiant_present" name="<?php echo $id_etudiant ?> "onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>','present')";> 
		<img src="images/ps.png" onmouseover="this.src='images/psh.png';" onmouseout="this.src='images/ps.png';"></a>
		
		<a href="#0" id="etudiant_abscent" name="<?php echo $id_etudiant ?> "onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'abscent')";> 
		<img src="images/ab.png" onmouseover="this.src='images/abh.png';" onmouseout="this.src='images/ab.png';"></a>
		
		<a href="#0" id="etudiant_retard" name="<?php echo $id_etudiant ?> " onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'retard')";> 
		<img src="images/js.png" onmouseover="this.src='images/jsh.png';" onmouseout="this.src='images/js.png';"></a>
		
		<a href="#0" id="etudiant_justifie" name="<?php echo $id_etudiant ?> "onClick="appel('<?php echo $_POST['id']; ?>', '<?php echo $id_etudiant?>', 'justifie')";> 
		<img src="images/rt.png" onmouseover="this.src='images/rth.png';" onmouseout="this.src='images/rt.png';"></a>
		
		<p id="nbre_presences"></p>
		
		</div>
	<hr/>
	</td>
	<?php if($nb%6==0){echo '</tr><tr>';}?>
	</div>
	<?php $id_etudiant = $id_etudiant+1; ?>
<?php }

?>
</tr>
</table>
<?php mysqli_close($connexion); ?>
 
 <script type="text/javascript">
    $(function(){

       $('#hideBlock').click(function(e){
           e.preventDefault;
           $('#studentsInfo').fadeOut(1000);
       });
    });
	
</script>

<script type="text/javascript">
	function appel(id_matiere, id_etudiant, champs){
   
      $.post('appel.php', {id_matiere:id_matiere, id_etudiant:id_etudiant, champs:champs}, function(data){
			 $("#etudiant"+id_etudiant).children( "#nbre_presences" ).html(data);
					
	  });

}
</script>
