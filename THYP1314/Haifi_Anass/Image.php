


<?php
include_once 'Personne.php';

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
        $personne[] = new Personne($trueLink[0],$desc);
    } 	
    
    /*echo "<h2>Liste des étudiants participants</h2>";
    var_dump($personne);
    die();*/
}
?>
<hr/>
<h2>Liste des étudiants participants</h2><a href="#" id="hideBlock"><img src="hide.png"></a>
<hr/>
<?php 
foreach($personne as $p){ ?>
    <div class="photo">
        <img <?php $tab=array(); $tab = explode(" ",$p->nom);
		echo $p->img;?> 
 <br>

         
         
		<img id="present" src="img/present.jpg" alt="Present" title="Present" onClick="setPrescence(1,'<?php echo $_GET['data']?>','<?php echo $p->nom ?>');"/>
		<img id="retard" src="img/retard.jpg" alt="Retard" title="Retard" onClick="setPrescence(2,'<?php echo $_GET['data']?>','<?php echo $p->nom ?>');"/>
	    <img id="excuse" src="img/excuse.jpg" alt="Excuse" title="Excuse" onClick="setPrescence(3,'<?php echo $_GET['data']?>','<?php echo $p->nom ?>');"/>
        <img id="abscent" src="img/abscent.jpg" alt="Abscent" title="Abscent" onClick="setPrescence(4,'<?php echo $_GET['data']?>','<?php echo $p->nom ?>');"/>

        <p> Nom : <?php echo $tab[0];?> </p>
        <p> Prenom : <?php if(sizeof($tab)>1){ echo $tab[1]; } else{ echo " ";  }       ?></p>
        <div class="diagramme">
            <p id="headBlock">
                <em>Les notes de l'année</em>.
            </p>
            
        </div>
        
    </div>
    <hr/>
<?php }
?>

 <script>
     
    //déclaration tableau des valeurs
    var dataArray = [10, 15, 20, 13];

    //definition de l'echelle et la gamme
    var widthScale = d3.scale.linear()
                            .domain([0,	20])
                            .range([0,290]);

    //définition du jeu des couleurs
    var color = d3.scale.linear()
                    .domain([0,20])
                    .range(["red","blue"]);

    //nombre de ticks
    var axis= d3.svg.axis()
                    .ticks(5)
                    .scale(widthScale);

    //créer l'espace de dessin
    var canvas = d3.selectAll(".diagramme")
                            .append("svg")
                            .attr("width",310)
                            .attr("height",200)
                            .attr("style","padding-left:10px;");

    //dessiner les rectangles, etc.
    var bars = canvas.selectAll("rect")
                    .data(dataArray)
                    .enter()
                            .append("rect")
                            .attr("width",function(d){
                                    return widthScale(d);
                            })
                            .attr("height",15)
                            .attr("fill", function(d){
                                    return color(d);
                            })
                            .attr("y",function(d,i){
                                    return i*20;
                            });
    //espacement + axe
    canvas.append("g")
            .attr("transform","translate(0,80)")
            .call(axis);
			
			
			
			


    function setPrescence(lib,cr,nom) {

$.ajax({
type: "POST",
url: "prescence.php",
data: {data:lib,cours:cr,name:nom},
success: function(msg){
alert( "Data Saved: " + msg );
}
});
}
//Call AJAX:
$(document).ready(setPrescence(lib));


</script> 
 
 <script type="text/javascript">
    $(function(){

       $('#hideBlock').click(function(e){
           e.preventDefault;
           $('#studentsInfo').fadeOut(1000);
       });
    });
</script>

