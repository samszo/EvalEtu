<?php
include_once 'Cours.php';
include_once 'CoursCategorie.php';
$fichier = "katCsv.csv";
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
            <link type="text/css" href="style.css" rel="stylesheet" />
            <script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
    </head> 
    <body> 
      <h1>Planning CDNL 2013 - 2014</h1>
        <div id="tabType"></div>
        <div id="tabCou"></div>
        <div id="tabInt"></div>
        <div id="divWeeks"></div>
        <div id="footer"><br/></div>
    
        <div id="divWeeks">
        <h2>Semaine 37 du 21/09/13 au 22/09/13</h2>
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
                    <td class="tdC">
                        <div class="UE1-EC2">
                            <h3><?php echo $touts_les_cours_a_9_heure->lundi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_9_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->lundi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div>
                            <h3><?php echo $touts_les_cours_a_9_heure->mardi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_9_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->mardi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div>
                            <h3><?php echo $touts_les_cours_a_9_heure->mercredi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_9_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->mercredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>   

                    <td class="tdC">
                        <div class="UE4-EC1">
                            <h3><?php echo $touts_les_cours_a_9_heure->jeudi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_9_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_9_heure->jeudi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_9_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div class="UE4-EC1">
                            <h3><?php echo $touts_les_cours_a_9_heure->vendredi->idUE; ?></h3>
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
                    <td class="tdC">
                        <div class="UE1-EC2">
                            <h3><?php echo $touts_les_cours_a_12_heure->lundi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_12_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->lundi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div>
                            <h3><?php echo $touts_les_cours_a_12_heure->mardi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_12_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->mardi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div>
                            <h3><?php echo $touts_les_cours_a_12_heure->mercredi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_12_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->mercredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>


                    <td class="tdC">
                        <div class="UE4-EC2">
                            <h3><?php echo $touts_les_cours_a_12_heure->jeudi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_12_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_12_heure->jeudi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_12_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div class="UE4-EC2">
                            <h3><?php echo $touts_les_cours_a_12_heure->vendredi->idUE; ?></h3>
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
                    <td class="tdC">
                        <div>
                            <h3><?php echo $touts_les_cours_a_18_heure->lundi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_18_heure->lundi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->lundi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->lundi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div>
                            <h3><?php echo $touts_les_cours_a_18_heure->mardi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_18_heure->mardi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->mardi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->mardi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div>
                            <h3><?php echo $touts_les_cours_a_18_heure->mercredi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_18_heure->mercredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->mercredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->mercredi->lieu; ?></h5>
                        </div>
                    </td>


                    <td class="tdC">
                        <div class="UE4-EC2">
                            <h3><?php echo $touts_les_cours_a_18_heure->jeudi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_18_heure->jeudi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->jeudi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->jeudi->lieu; ?></h5>
                        </div>
                    </td>

                    <td class="tdC">
                        <div class="UE4-EC2">
                            <h3><?php echo $touts_les_cours_a_18_heure->vendredi->idUE; ?></h3>
                            <h5><?php echo $touts_les_cours_a_18_heure->vendredi->nomUE; ?></h5>
                            <h4><?php echo $touts_les_cours_a_18_heure->vendredi->intervenant; ?></h4>
                            <h5><?php echo $touts_les_cours_a_18_heure->vendredi->lieu; ?></h5>
                        </div>
                    </td>   
               </tr>
            </tbody>  
        </table>
        <div id="studentsInfo">

        </div>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
        <script src="findStudents.js"></script>
</body>
    
</html>