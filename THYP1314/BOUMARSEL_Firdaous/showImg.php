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
        
        
        //$personne[] = new Personne($desc, $trueLink[0]);
        $desc = utf8_decode((string)$element->title);
		$personne[] = new Personne($desc,$trueLink);
    } 	
    
    
}
?>
<hr/>
<h2>Liste des étudiants :</h2>
<hr/>

<?php

$connexion=mysqli_connect("localhost","root","root","planning");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }	?>
		<?php 
		$nb=0;
		foreach($personne as $p){
		 ?>
    
	
	<div  id="etudiant<?php echo ($id_etudiant)?>">
		
		
			<?php $identite = explode(" ", $p->nom);?>
			<?php if (empty($identite[0])) {  $identite[0]="vide";}?>
			<?php if (empty($identite[1])) { $identite[1]="vide";}?>
			<?php
			mysqli_query($connexion,"INSERT INTO etudiants (id_etudiant, nom, prenom) VALUES ($id_etudiant, '$identite[0]','$identite[1]')");
			$nb+=1;?>
	
	
       <img class="photo" <?php echo $p->img[0];?>></img>
    
		
		<p> Nom : <?php if (!empty($identite[1])) {  echo $identite[0];}?></p>
        <p> Prenom : <?php if (!empty($identite[1])) {echo $identite[1];}?></p>
		
		<div class="diagramme">
            <p id="headBlock">
                <input type="radio" value="Present" name="presence"> Present
                <input type="radio" value="Absent" name="presence"> Absent
                <input type="radio" value="En Retard" name="presence"> En Retard
            </p>
            
        </div>
		<p id="nbre_presences"></p>
		
		</div>
	<hr/>
	
	<?php if($nb%6==0){echo '</tr><tr>';}?>
	
	<?php $id_etudiant = $id_etudiant+1; ?>
<?php }

?>

<?php mysqli_close($connexion); ?>
	



