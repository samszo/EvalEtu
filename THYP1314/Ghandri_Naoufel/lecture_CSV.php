<?php
include_once 'Cours.php';
include_once 'CoursCategorie.php';
$fichier = "planning_csv.csv";
$fic = fopen($fichier, 'rb');
$cpt = 0;

for ($ligne = fgetcsv($fic, 1024); !feof($fic); $ligne = fgetcsv($fic, 1024)) {
  
  $j = sizeof($ligne);
    $cours[] = new Cours($ligne[0],$ligne[1],$ligne[2],$ligne[3],$ligne[4],$ligne[5]);
  }
$cours_lundi = array_slice($cours, 0,3);
$cours_mardi = array_slice($cours, 3,3);
$cours_mercredi = array_slice($cours, 6,3);
$cours_jeudi = array_slice($cours, 9,3);
$cours_vendredi = array_slice($cours, 12,3);  

$touts_les_cours_a_9_heure = new CoursCategorie($cours_lundi[0], $cours_mardi[0], $cours_mercredi[0], $cours_jeudi[0], $cours_vendredi[0]);
$touts_les_cours_a_12_heure = new CoursCategorie($cours_lundi[1], $cours_mardi[1], $cours_mercredi[1], $cours_jeudi[1], $cours_vendredi[1]);
$touts_les_cours_a_18_heure = new CoursCategorie($cours_lundi[2], $cours_mardi[2], $cours_mercredi[2], $cours_jeudi[2], $cours_vendredi[2]);
$con=mysqli_connect("localhost","root","");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql="CREATE DATABASE IF NOT EXISTS planning";
if (!mysqli_query($con,$sql))
  {
  echo "Error creating database: " . mysqli_error($con);
  }
   mysqli_close($con);
  
 
 
 
$con=mysqli_connect("localhost","root","", "planning");
// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	


//Creation table etudiant
		
$sql = "CREATE TABLE IF NOT EXISTS etudiants 
(
id_etudiant INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id_etudiant),
nom CHAR(15),
prenom CHAR(15)
)"; 

  
if (!mysqli_query($con,$sql))
  {
  echo "Erreur création table etudiants " . mysqli_error($con);
  }  

// Création de la table cours 

$sql = "CREATE TABLE IF NOT EXISTS cours
(
id_cour CHAR(10), 
PRIMARY KEY(id_cour),
intitule CHAR(15),
salle CHAR(15)
)"; 

  
if (!mysqli_query($con,$sql))
	
  {
  echo "Erreur création table cours" . mysqli_error($con);
  }  

//Creation table presence 
  
  $sql = "CREATE TABLE IF NOT EXISTS presence
(
Ideleve INT,
Idcours CHAR(10),
PRIMARY KEY(Ideleve, Idcours),
present INT, 
abscent INT,
retard INT,
justifie INT,
FOREIGN KEY (Ideleve) REFERENCES etudiants(id_etudiant),
FOREIGN KEY (Idcours) REFERENCES cours(id_cour)
)"; 

  
if (!mysqli_query($con,$sql))
  {
  echo "Erreur creation table presence " . mysqli_error($con);
  }  
// Création de la table notes

$sql = "CREATE TABLE IF NOT EXISTS notes
(
id_note CHAR(10), 
PRIMARY KEY(id_note),
resultats INT

)"; 

  
if (!mysqli_query($con,$sql))
  
  {
  echo "Erreur création table note: " . mysqli_error($con);
  }  

     mysqli_close($con);
	?>
<!DOCTYPE html> 


<?php

		$connexion=mysqli_connect("localhost","root","","planning");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	
		foreach($cours as $l){ 
			if ($l->nomUE != ''){
				mysqli_query($connexion,"INSERT INTO cours (id_cour, intitule, salle) VALUES ('$l->idUE', '$l->nomUE', '$l->lieu' )");
			}
		}
			 mysqli_close($connexion);
	?>
		
		
		
<html> 
    <head> 
	
        <title>Planning</title> 
            <meta charset="utf-8" />
            <link type="text/css" href="style.css" rel="stylesheet" />
            <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    </head> 
    <body> 
	<center>
      <h1>Planning</h1>
       
    
        <div>
        <h2>Semaine 1 du 04/11/2013 au 08/11/2013</h2>
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

                
                <tr>
                    <td class = "tdH">
                        <?php $t1 = explode(" ", $touts_les_cours_a_9_heure->lundi->debut); $t2 = explode(" ", $touts_les_cours_a_9_heure->lundi->fin); echo $t1[1]." - ".$t2[1]; ?>
                    </td>
                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->lundi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->lundi->nomUE; ?>">
                        <div class="UE1-EC2">
                            
                            <h5><?php echo $touts_les_cours_a_9_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->lundi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->mardi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->mardi->nomUE; ?>">
                        <div  class="UE4-EC1">
                            
                            <h5><?php echo $touts_les_cours_a_9_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->mardi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->mercredi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->mercredi->nomUE; ?>">
                        <div class="UE3-EC4">
                           
                            <h5><?php echo $touts_les_cours_a_9_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->mercredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>   

                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->jeudi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->jeudi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_9_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->jeudi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_9_heure->vendredi->idUE; ?>" name="<?php echo $touts_les_cours_a_9_heure->vendredi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_9_heure->vendredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->vendredi->intervenant; ?></h4>
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
                            <h4><?php echo $touts_les_cours_a_12_heure->lundi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->mardi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->mardi->nomUE;?>">
                        <div  class="UE4-EC1">
                            
							<h5><?php echo $touts_les_cours_a_12_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->mardi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->mercredi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->mercredi->nomUE;?>">
                        <div class="UE3-EC4">
                            
                            <h5><?php echo $touts_les_cours_a_12_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->mercredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>


                    <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->jeudi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->jeudi->nomUE;?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_12_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->jeudi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_12_heure->vendredi->idUE; ?>" name="<?php echo $touts_les_cours_a_12_heure->vendredi->nomUE;?>">
                        <div>
                           
                            <h5><?php echo $touts_les_cours_a_12_heure->vendredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->vendredi->intervenant; ?></h4>
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
                        <div class="UE1-EC2">
                           
                            <h5><?php echo $touts_les_cours_a_18_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->lundi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->mardi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->mardi->nomUE; ?>">
                        <div  class="UE4-EC1">
                           
                            <h5><?php echo $touts_les_cours_a_18_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->mardi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->mercredi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->mercredi->nomUE; ?>">
                        <div class="UE3-EC4">
                           
                            <h5><?php echo $touts_les_cours_a_18_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->mercredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>


                    <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->jeudi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->jeudi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_18_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->jeudi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $touts_les_cours_a_18_heure->vendredi->idUE; ?>" name="<?php echo $touts_les_cours_a_18_heure->vendredi->nomUE; ?>">
                        <div>
                            
                            <h5><?php echo $touts_les_cours_a_18_heure->vendredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->vendredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->vendredi->lieu; ?></h5>
                        </div>
                    </td>   
               </tr>
			   <div>
			  
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
	</center>
		</body>
    
</html>