<?

/*********************** Création de la base de donnée Planning ***********/
/**************************************************************************/
 
        $con=mysqli_connect("localhost","root","", "planning-jihanem");
        // Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}	


/***************** Création de la table "etudiants" ************/		
	$sql = "CREATE TABLE IF NOT EXISTS etudiants 
	
	(id_etudiant INT NOT NULL AUTO_INCREMENT, 
	nom CHAR(15),
	prenom CHAR(15),
    PRIMARY KEY(id_etudiant),
	)"; 

  
	 if (mysqli_query($con,$sql))
	  {
	  
	  }
	  else
	  {
	  	mysqli_error($con);
	  }
	   

/**************** Création de la table matiere ***************************/  
/*************************************************************************************/
$sql = "CREATE TABLE IF NOT EXISTS matieres
(id_matiere CHAR(10), 
nom_matiere CHAR(15),
salle CHAR(15),
PRIMARY KEY(id_matiere))"; 

if (mysqli_query($con,$sql)){}
else
{mysqli_error($con);}
 
/**************** Création de la table presences *************************************/  
/*************************************************************************************/ 
  $sql = "CREATE TABLE IF NOT EXISTS presence
(
Ideleve INT,
Idcours CHAR(10),
PRIMARY KEY(Ideleve, Idcours),
present INT, 
abscent INT,
retard INT,
justifie INT,
FOREIGN KEY (Ideleve) REFERENCES etudiants(id_Etudiant),
FOREIGN KEY (Idcours) REFERENCES cours(id_matiere)
)"; 
 
    
   
     
  ///////////table de note   /////////////// 
     
     $sql = "CREATE TABLE IF NOT EXISTS notes
(
IdEtudiant INT,
IdMatiere CHAR(10),
PRIMARY KEY(IdEtudiant, IdMatiere),
note INT,
exercice CHAR(15),
matiere CHAR(15),

FOREIGN KEY (IdEtudiant) REFERENCES etudiants(id_etudiant),
FOREIGN KEY (IdMatiere) REFERENCES matieres(id_matiere)
)";
     
     
     if (mysqli_query($con,$sql))
     {
     	
     }
     else
     {
     	
     }
     
     mysqli_close($con);
	
	?>