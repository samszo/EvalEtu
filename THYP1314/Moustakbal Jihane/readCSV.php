<?php
include_once 'Cours.php';
include_once 'CoursCategorie.php';
include_once 'conexion.php';
$fichier = "planning_csv.csv";
$fic = fopen($fichier, 'rb');
$cpt = 0;

for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {
  
  $j = sizeof($ligne);
    $cours[] = new Cours($ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5]);
  }
  /*
  var_dump($cours);
  die();*/

$cours_lundi = array_slice($cours, 0,3);
$cours_mardi = array_slice($cours, 3,3);
$cours_mercredi = array_slice($cours, 6,3);
$cours_jeudi = array_slice($cours, 9,3);
$cours_vendredi = array_slice($cours, 12,3);  

$touts_les_cours_a_9_heure = new CoursCategorie($cours_lundi[0], $cours_mardi[0], $cours_mercredi[0], $cours_jeudi[0], $cours_vendredi[0]);
$touts_les_cours_a_12_heure = new CoursCategorie($cours_lundi[1], $cours_mardi[1], $cours_mercredi[1], $cours_jeudi[1], $cours_vendredi[1]);
$touts_les_cours_a_18_heure = new CoursCategorie($cours_lundi[2], $cours_mardi[2], $cours_mercredi[2], $cours_jeudi[2], $cours_vendredi[2]);

/*var_dump($cours_jeudi);
die();*/

?>
<!DOCTYPE html> 
<html> 
    <head> 
        <title>Planning CDNL 2013 - 2014</title> 
            <meta charset="utf-8" />
            <link type="text/css" href="styles.css" rel="stylesheet" />

    </head> 
    <body> 
      <h1>Planning CDNL 2013 - 2014</h1>
       <?php
		
       $connexion=mysqli_connect("localhost","root","","planning-jihanem");
		// Check connection
		
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	
		foreach($cours as $l){ 
			if ($l->nomUE != ''){
				mysqli_query($connexion,"INSERT INTO matieres (id_matiere, nom_matiere, salle) VALUES ('$l->idUE','$l->nomUE','$l->lieu')");
		
			}	
		}
			 mysqli_close($connexion);
	     ?>
	     
	     
	     
	     
	     
        
        <table>
            <thead>
                <tr>  
                    <th>Heure</th>
                    <th><?php $t = explode(" ", $cours_lundi[0]->debut); echo "Lundi ".$t[0]; ?></th>
                    <th><?php $t = explode(" ", $cours_mardi[0]->debut); echo "Mardi ".$t[0]; ?></th>
                    <th><?php $t = explode(" ", $cours_mercredi[0]->debut); echo "Mercredi ".$t[0]; ?></th>
                    <th><?php $t = explode(" ", $cours_jeudi[0]->debut); echo "Jeudi ".$t[0]; ?></th>
                    <th><?php $t = explode(" ", $cours_vendredi[0]->debut); echo "Vendredi ".$t[0]; ?></th>
                </tr>
            </thead>
            <tbody>

                <!-- tous les cours  à 9 heures -->
                <tr>
                    <td class = "tdH">
                        <?php $t1 = explode(" ", $touts_les_cours_a_9_heure->lundi->debut); $t2 = explode(" ", $touts_les_cours_a_9_heure->lundi->fin); echo $t1[1]." - ".$t2[1]; ?>
                    </td>
                    <td class="tdC"  id="<?php echo $touts_les_cours_a_9_heure->lundi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->lundi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_9_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->lundi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->mardi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->mardi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_9_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->mardi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->mercredi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->mercredi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_9_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->mercredi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>   

                     <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->jeudi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->jeudi->nomUE; ?>">
                        <div >
                           
                            <h5><?php echo $touts_les_cours_a_9_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->jeudi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->vendredi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->vendredi->nomUE; ?>">
                        <div class="UE4-EC1">
                          
                            <h5><?php echo $touts_les_cours_a_9_heure->vendredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->vendredi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->vendredi->lieu; ?></h5>
                        </div>
                    </td>   
               </tr>

               
               <!-- tous les cours  à 12 heures -->
                <tr>
                    <td class = "tdH">
                        <?php $t1 = explode(" ", $touts_les_cours_a_12_heure->lundi->debut); $t2 = explode(" ", $touts_les_cours_a_12_heure->lundi->fin); echo $t1[1]." - ".$t2[1]; ?>
                    </td>
                     <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->lundi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->lundi->nomUE;?>">
                        <div class="UE1-EC2">
                          
                            <h5><?php echo $touts_les_cours_a_12_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->lundi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->mardi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->mardi->nomUE;?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_12_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->mardi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                      <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->mercredi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->mercredi->nomUE;?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_12_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->mercredi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>


                    <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->jeudi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->jeudi->nomUE;?>">
                        <div>

                     
                            <h5><?php echo $touts_les_cours_a_12_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->jeudi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->jeudi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->jeudi->nomUE;?>">
                        <div>
                           
                            <h5><?php echo $touts_les_cours_a_12_heure->vendredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->vendredi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->vendredi->lieu; ?></h5>
                        </div>
                    </td>   
               </tr>

               <!-- tous les cours  à 18 heures -->
                <tr>
                    <td class = "tdH">
                        <?php $t1 = explode(" ", $touts_les_cours_a_18_heure->lundi->debut); $t2 = explode(" ", $touts_les_cours_a_18_heure->lundi->fin); echo $t1[1]." - ".$t2[1]; ?>
                    </td>
                     <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->lundi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->lundi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_18_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->lundi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                     <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->mardi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->mardi->nomUE; ?>">
                        <div>
                          
                            <h5><?php echo $touts_les_cours_a_18_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->mardi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                  <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->mercredi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->mercredi->nomUE; ?>">
                        <div>
                 
                            <h5><?php echo $touts_les_cours_a_18_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->mercredi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>


                    <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->jeudi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->jeudi->nomUE; ?>">
                        <div >
                            <h5><?php echo $touts_les_cours_a_18_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->jeudi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                     <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->vendredi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->vendredi->nomUE; ?>">
                        <div >
                          
                            <h5><?php echo $touts_les_cours_a_18_heure->vendredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->vendredi->professeur; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->vendredi->lieu; ?></h5>
                        </div>
                    </td>   
               </tr>
               </div>
				<div style="position:absolute; margin-left:10px; margin-top:-200px;">
				 <object type="application/x-shockwave-flash" data="legende.swf" style="width:300px;height:900px;">
						<param name="base" value="legende.swf"/>
						<param name="movie" value="legende.swf"/>
						<param name="quality" value="high">
						<param name="wmode" value="transparent"/>
						<param name="menu" value="true"/>
				</object>
				<div>
            </tbody>  
        </table>
        
        
        
        
        <div id="studentsInfo">

        </div>
        
        
        
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="findStudents.js"></script>
</body>
    
</html>