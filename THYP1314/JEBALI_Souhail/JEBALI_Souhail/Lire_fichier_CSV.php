<?php
include_once 'Cours.php';
include_once 'CoursCategorie.php';
$fichier = "Fichier.csv";
$fic = fopen($fichier, 'r');
$cpt = 0;


for ($parametres_cours = fgetcsv($fic, 1024); !feof($fic); $parametres_cours = fgetcsv($fic, 1024)) {
  
     $cours[] = new Cours($parametres_cours[0],$parametres_cours[1],$parametres_cours[2],$parametres_cours[3],$parametres_cours[4],$parametres_cours[5]);
	 
  }
 
$cours_lundi = array_slice($cours, $cpt,3);
$cours_mardi = array_slice($cours, $cpt+3,3);
$cours_mercredi = array_slice($cours,$cpt+6,3);
$cours_jeudi = array_slice($cours, $cpt+9,3);
$cours_vendredi = array_slice($cours, $cpt+12,3);  

$Cours_9h = new CoursCategorie($cours_lundi[0], $cours_mardi[0], $cours_mercredi[0], $cours_jeudi[0], $cours_vendredi[0]);
$Cours_12h = new CoursCategorie($cours_lundi[1], $cours_mardi[1], $cours_mercredi[1], $cours_jeudi[1], $cours_vendredi[1]);
$Cours_15h = new CoursCategorie($cours_lundi[2], $cours_mardi[2], $cours_mercredi[2], $cours_jeudi[2], $cours_vendredi[2]);

/*var_dump($cours_jeudi);
die();*/


$con=mysqli_connect("localhost","root","");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

/*********************** Création de la base de donnée Planning ***********/
/**************************************************************************/
$sql="CREATE DATABASE IF NOT EXISTS planning_thyp1314";
if (mysqli_query($con,$sql))
  {
  echo "Database \"planning_thyp1314\" créée avec succès";
  }
else
  {
  echo "Error creating database: " . mysqli_error($con);
  }
   mysqli_close($con);
  
 
 
 
$con=mysqli_connect("localhost","root","", "planning_thyp1314");
// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	


/***************** Création de la table "etudiants" ************/		
$sql = "CREATE TABLE IF NOT EXISTS etudiants 
(
id_etudiant INT NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(id_etudiant),
nom CHAR(15),
prenom CHAR(15),
age INT
)"; 

  
if (mysqli_query($con,$sql))
  {
  echo "<br> Table \"Etudiants\" créée avec succès";
  }
else
  {
  echo "<br> Error creating Table etudiants: " . mysqli_error($con);
  }  

/**************** Création de la table unité d'enseignement ***************************/  
/*************************************************************************************/
$sql = "CREATE TABLE IF NOT EXISTS ue 
(
id_ue CHAR(10), 
PRIMARY KEY(id_ue),
intitule CHAR(15),
salle CHAR(15)
)"; 

  
if (mysqli_query($con,$sql))
  {
  echo "<br> Table \"Unité d'Enseignement\" créée avec succès";
  }
else
  {
  echo "<br> Error creating Table unité d'enseignement: " . mysqli_error($con);
  }  

/**************** Création de la table assiduité *************************************/  
/*************************************************************************************/ 
  
  $sql = "CREATE TABLE IF NOT EXISTS assiduite
(
IdEtudiant INT,
IdMatiere CHAR(10),
PRIMARY KEY(IdEtudiant, IdMatiere),
presences INT, 
abscences INT,
justifie INT,
retard INT,
FOREIGN KEY (IdEtudiant) REFERENCES etudiants(id_etudiant),
FOREIGN KEY (IdMatiere) REFERENCES ue(id_ue)
)"; 

  
if (mysqli_query($con,$sql))
  {
  echo "<br> Table \"assiduité\" créée avec succès";
  }
else
  {
  echo "<br> Error creating Table assiduité: " . mysqli_error($con);
  }  

     mysqli_close($con);
	
	?>

	
	
<?php
function td_size($t1,$t2)
{
	$debut = str_ireplace(":","",$t1[1]);        
	$fin = str_ireplace(":","",$t2[1]);  
	$d=intval($debut);
	$f=intval($fin);
	$marge=$f-$d;	
	return $marge/100;
							
}
?>
	
	
	
	
<!DOCTYPE html> 
<html> 
    <head> 
        <title>Planning THYP 2013 - 2014</title> 
            <meta charset="utf-8" />
            <link type="text/css" href="style.css" rel="stylesheet" />
            <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    </head> 
    <body> 
      <h1>Planning Master THYP 2013 - 2014</h1>
        <div id="tabType"></div>
        <div id="tabCou"></div>
        <div id="tabInt"></div>
        <div id="divWeeks"></div>
        <div id="footer"><br/></div>
    
        <div id="divWeeks">
		
		<?php

		$connexion=mysqli_connect("localhost","root","","planning_thyp1314");
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	
		foreach($cours as $l){ 
			if ($l->nomUE != ''){
				mysqli_query($connexion,"INSERT INTO ue (id_ue, intitule, salle) VALUES ('$l->idUE', '$l->nomUE', '$l->lieu' )");
			
			
			
			/*echo ($l->nomUE);		
			echo('   id:');
			echo ($l->idUE);
			echo('<br>');*/
			}
			
			
		}
			 mysqli_close($connexion);
	?>
	
				
        <h2>Semaine du <?php $t = explode(" ", $cours_lundi[0]->debut); echo "".$t[0]; ?> au <?php $t = explode(" ", $cours_vendredi[0]->debut); echo "".$t[0]; ?></h2>
        <input type="button" value="Next Week" onClick="javascript:nombre++;alert('Nombre vaut : '+nombre);" />

		          
			<table>

                <!-- tous les cours  lundi -->
                <tr>
				
					
                    <td class = "date">
                        <?php $t = explode(" ", $cours_lundi[0]->debut); echo "Lundi ".$t[0]; ?>
						
                    </td>
					<?php $t1 = explode(" ", $Cours_9h->lundi->debut); $t2 = explode(" ", $Cours_9h->lundi->fin);?>
                    <td class="tdC" width= "<?php echo (td_size($t1,$t2))?>" id="<?php echo $Cours_9h->lundi->idUE; ?>" 
					name="<?php echo $Cours_9h->lundi->nomUE;?>" prof="<?php echo $Cours_9h->lundi->intervenant;?>"
					date="<?php echo $t1[0] ?>"
					>
                        
						<div class="td9h" >
                          
                             <?php echo $Cours_9h->lundi->nomUE; ?><br>
							 <?php echo $Cours_9h->lundi->intervenant; ?><br>
                             <?php echo $Cours_9h->lundi->lieu; ?><br>						
							 <?php echo $t1[1]." - ".$t2[1]; ?>
							 
							 
							<!-- <script type="text/javascript"> alert('<?php echo $Cours_9h->lundi->nomUE; ?>'); </script> -->
                        </div>
                    </td>
					
					<?php $t1 = explode(" ", $Cours_12h->lundi->debut); $t2 = explode(" ", $Cours_12h->lundi->fin);?>
                    <td class="tdC" width= "<?php echo td_size($t1,$t2);?>" id="<?php echo $Cours_12h->lundi->idUE; ?>" name="<?php echo $Cours_12h->lundi->nomUE; ?>" prof="<?php echo $Cours_12h->lundi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td12h">
                            
                            <?php echo $Cours_12h->lundi->nomUE; ?><br>
                            <?php echo $Cours_12h->lundi->intervenant; ?><br>
                            <?php echo $Cours_12h->lundi->lieu; ?><br>
							<?php $t1 = explode(" ", $Cours_12h->lundi->debut); $t2 = explode(" ", $Cours_12h->lundi->fin); echo $t1[1]." - ".$t2[1]; ?>
                        </div>
                    </td>
					
					
					<?php $t1 = explode(" ", $Cours_15h->lundi->debut); $t2 = explode(" ", $Cours_15h->lundi->fin);?>
                    <td class="td1C" width= "<?php echo td_size($t1,$t2);?>" id="<?php echo $Cours_15h->lundi->idUE; ?>" name="<?php echo $Cours_15h->lundi->nomUE; ?>" prof="<?php echo $Cours_15h->lundi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td15h">
                           
                            <?php echo $Cours_15h->lundi->nomUE; ?><br>
                            <?php echo $Cours_15h->lundi->intervenant; ?><br>
                            <?php echo $Cours_15h->lundi->lieu; ?><br>
							<!-- <h5> <?php $t1 = explode(" ", $Cours_15h->lundi->debut); $t2 = explode(" ", $Cours_15h->lundi->fin); echo $t1[1]." - ".$t2[1]; ?></h5>-->
                        </div>
                    </td>   
               </tr>
			   </table>

               <!-- tous les cours  mardi-->
               <table>
				<tr>
                    <td class = "date">
                        <?php $t = explode(" ", $cours_mardi[0]->debut); echo "Mardi ".$t[0]; ?>
						
                    </td>
					
					<?php $t1 = explode(" ", $Cours_9h->mardi->debut); $t2 = explode(" ", $Cours_9h->mardi->fin);?>
                    <td class="tdC" width= "<?php echo (td_size($t1,$t2));?>" id="<?php echo $Cours_9h->mardi->idUE; ?>" name="<?php echo $Cours_9h->mardi->nomUE; ?>" prof="<?php echo $Cours_9h->mardi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td9h">
                           
                            <?php echo $Cours_9h->mardi->nomUE; ?><br>
                            <?php echo $Cours_9h->mardi->intervenant; ?><br>
                            <?php echo $Cours_9h->mardi->lieu; ?><br>
							<?php $t1 = explode(" ", $Cours_9h->mardi->debut); $t2 = explode(" ", $Cours_9h->mardi->fin); echo $t1[1]." - ".$t2[1]; ?><br>
                        </div>
                    </td>

					
					<?php $t1 = explode(" ", $Cours_12h->mardi->debut); $t2 = explode(" ", $Cours_12h->mardi->fin);?>
                    <td class="tdC" width= "<?php echo td_size($t1,$t2);?>"  id="<?php echo $Cours_12h->mardi->idUE; ?>" name="<?php echo $Cours_12h->mardi->nomUE; ?>" prof="<?php echo $Cours_12h->mardi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td12h">
                            
                            <?php echo $Cours_12h->mardi->nomUE; ?><br>
                            <?php echo $Cours_12h->mardi->intervenant; ?><br>
                            <?php echo $Cours_12h->mardi->lieu; ?><br>
							<?php $t1 = explode(" ", $Cours_12h->mardi->debut); $t2 = explode(" ", $Cours_12h->mardi->fin); echo $t1[1]." - ".$t2[1]; ?><br>
                        </div>
                    </td>

                   
					<?php $t1 = explode(" ", $Cours_15h->mardi->debut); $t2 = explode(" ", $Cours_15h->mardi->fin);?>
				   <td class="tdC" width= "<?php echo td_size($t1,$t2);?>"  id="<?php echo $Cours_15h->mardi->idUE; ?>" name="<?php echo $Cours_15h->mardi->nomUE; ?>" prof="<?php echo $Cours_15h->mardi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td15h">
                            
                            <?php echo $Cours_15h->mardi->nomUE; ?>
                            <?php echo $Cours_15h->mardi->intervenant; ?><br>
                            <?php echo $Cours_15h->mardi->lieu; ?><br>
							<?php $t1 = explode(" ", $Cours_15h->mardi->debut); $t2 = explode(" ", $Cours_15h->mardi->fin); echo $t1[1]." - ".$t2[1]; ?><br>
                        </div>
                    </td>

               </tr>
			</table>
               <!-- tous les cours  mercredi -->
               
			<table>
			   <tr>
                    <td class = "date">
                        <?php $t = explode(" ", $cours_mercredi[0]->debut); echo "Mercredi ".$t[0]; ?>
						
                    </td>
					
					
					<?php $t1 = explode(" ", $Cours_9h->mercredi->debut); $t2 = explode(" ", $Cours_9h->mercredi->fin);?>
                    <td class="tdC" width= "<?php echo (td_size($t1,$t2));?>" id="<?php echo $Cours_9h->mercredi->idUE; ?>" name="<?php echo $Cours_9h->mercredi->nomUE; ?>" prof="<?php echo $Cours_9h->mercredi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td9h">
                            
                            <?php echo $Cours_9h->mercredi->nomUE; ?><br>
							<?php echo $Cours_9h->mercredi->intervenant; ?><br>
                            <?php echo $Cours_9h->mercredi->lieu; ?><br>
							<?php $t1 = explode(" ", $Cours_9h->mercredi->debut); $t2 = explode(" ", $Cours_9h->mercredi->fin); echo $t1[1]." - ".$t2[1]; ?><br>
							
                        </div>
                    </td>

					
					<?php $t1 = explode(" ", $Cours_12h->mercredi->debut); $t2 = explode(" ", $Cours_12h->mercredi->fin);?>
                    <td class="tdC" width= "<?php echo td_size($t1,$t2);?>" id="<?php echo $Cours_12h->mercredi->idUE; ?>" name="<?php echo $Cours_12h->mercredi->nomUE; ?>" prof="<?php echo $Cours_12h->mercredi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td12h">
                            
                            <?php echo $Cours_12h->mercredi->nomUE; ?><br>
                            <?php echo $Cours_12h->mercredi->intervenant; ?><br>
                            <?php echo $Cours_12h->mercredi->lieu; ?><br>
							<?php $t1 = explode(" ", $Cours_12h->mercredi->debut); $t2 = explode(" ", $Cours_12h->mercredi->fin); echo $t1[1]." - ".$t2[1]; ?><br>
                        </div>
                    </td>

					
					<?php $t1 = explode(" ", $Cours_15h->mercredi->debut); $t2 = explode(" ", $Cours_15h->mercredi->fin);?>
                    <td class="tdC" width= "<?php echo td_size($t1,$t2);?>"  id="<?php echo $Cours_15h->mercredi->idUE; ?>" name="<?php echo $Cours_15h->mercredi->nomUE; ?>" prof="<?php echo $Cours_15h->mercredi->intervenant;?>" date="<?php echo $t1[0] ?>">
                        <div class="td15h">
                            
                            <?php echo $Cours_15h->mercredi->nomUE; ?><br>
                            <?php echo $Cours_15h->mercredi->intervenant; ?><br>
                            <?php echo $Cours_15h->mercredi->lieu; ?><br>
							<?php $t1 = explode(" ", $Cours_15h->mercredi->debut); $t2 = explode(" ", $Cours_15h->mercredi->fin); echo $t1[1]." - ".$t2[1]; ?><br>
                        </div>
                    </td>
               </tr>
            
			</table>
			
			<!-- tous les cours  jeudi -->
               
			<table>
			   <tr>
                    <td class = "date">
                        <?php $t = explode(" ", $cours_jeudi[0]->debut); echo "Jeudi ".$t[0]; ?>
						<?php $t1 = explode(" ", $Cours_15h->lundi->debut); $t2 = explode(" ", $Cours_15h->lundi->fin); echo $t1[1]." - ".$t2[1]; ?>
                    </td>
                    <td class="tdC" id="<?php echo $Cours_9h->jeudi->idUE; ?>" name="<?php echo $Cours_9h->jeudi->nomUE; ?>">
                        <div class="td9h">
                            
                            <?php echo $Cours_9h->jeudi->nomUE; ?><br>
                            <?php echo $Cours_9h->jeudi->intervenant; ?><br>
                            <?php echo $Cours_9h->jeudi->lieu; ?><br>
							
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $Cours_12h->jeudi->idUE; ?>" name="<?php echo $Cours_12h->jeudi->nomUE; ?>">
                        <div class="td12h">
                            
                            <?php echo $Cours_12h->jeudi->nomUE; ?><br>
                            <?php echo $Cours_12h->jeudi->intervenant; ?><br>
                            <?php echo $Cours_12h->jeudi->lieu; ?><br>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $Cours_15h->jeudi->idUE; ?>" name="<?php echo $Cours_15h->jeudi->nomUE; ?>">
                        <div class="td15h">
                            
                            <?php echo $Cours_15h->jeudi->nomUE; ?><br>
                            <?php echo $Cours_15h->jeudi->intervenant; ?><br>
                            <?php echo $Cours_15h->jeudi->lieu; ?><br>
                        </div>
                    </td>

               </tr>
            
			</table>
			
			<!-- tous les cours  vendredi -->
               
			<table>
			   <tr>
                    <td class = "date">
                        <?php $t = explode(" ", $cours_vendredi[0]->debut); echo "Vendredi ".$t[0]; ?>
						<?php $t1 = explode(" ", $Cours_9h->vendredi->debut); $t2 = explode(" ", $Cours_9h->vendredi->fin); echo $t1[1]." - ".$t2[1]; ?>
                    </td>
                    <td class="tdC" id="<?php echo $Cours_9h->vendredi->idUE; ?>" name="<?php echo $Cours_9h->vendredi->nomUE; ?>">
                        <div class="td9h">
                            
                            <?php echo $Cours_9h->vendredi->nomUE; ?><br>
                            <?php echo $Cours_9h->vendredi->intervenant; ?><br>
                            <?php echo $Cours_9h->vendredi->lieu; ?><br>
							
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $Cours_12h->vendredi->idUE; ?>" name="<?php echo $Cours_12h->vendredi->nomUE; ?>">
                        <div class="td12h">
                            
                            <?php echo $Cours_15h->vendredi->nomUE; ?><br>
                            <?php echo $Cours_15h->vendredi->intervenant; ?><br>
                            <?php echo $Cours_15h->vendredi->lieu; ?><br>
                        </div>
                    </td>

                    <td class="tdC" id="<?php echo $Cours_15h->vendredi->idUE; ?>" name="<?php echo $Cours_15h->vendredi->nomUE; ?>">
                        <div class="td15h">
                            
                            <?php echo $Cours_15h->vendredi->nomUE; ?><br>
                            <?php echo $Cours_15h->vendredi->intervenant; ?><br>
                            <?php echo $Cours_15h->vendredi->lieu; ?><br>
                        </div>
                    </td>


                    
               </tr>
            
			</table>
        
        <div id="studentsInfo">

        </div>
       <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>   
	   <script src="Liste_Etudiants.js"></script>
</body>
    
</html>