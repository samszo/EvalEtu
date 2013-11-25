
<?php
// commentaire sur une ligne

    $arrEtu = array('samy', 'scooby', 'daphnee') ;
?>

<!DOCTYPE html>
<html>
<head>

<title>JavaScript Exemple </title>
<meta charset="utf-8" />

   <script>
     // tester la page : http://localhost/EvalEtu/CDNL1314/Delacruz_Manuel/page3_test.php
     // variable globale tableau $arrEtu
     // en php 

      var message = 'bonjour' ;

     function EcrireBonjour(prenom)
     {
     	// commentaire en javascript


       message +=  prenom;	

       // alert(message);
       console.log (message);

       console.log(1+1);
       // alert("re-re-coucou : " + prenom);
       // console.log('bonjour' + prenom);

     }

     
       function Ecrire(message)
         {  
     	     alert(message);
         }

   </script>
   
</head>
<body>

<h1>mon premier exemple</h1>
<p> du JavaScript test.</p>

   
   <input type="button" value="Click me" onclick="EcrireBonjour('samy')">



<?php
// commentaire sur une ligne : a verifier syntaxe douhler les ' ??

 

   foreach ($arrEtu as $etu => $valeur) {

         echo "	<div onmouseover=\"EcrireBonjour('$valeur' )\" >  $valeur  
              <img onclick=\"Ecrire('$valeur est present') \" src=\"img/timeP.jpg\" alt=\"Present\"> 
              <img onclick=\"Ecrire('$valeur est absent') \" src=\"img/timeA.jpg\" alt=\"Absent\"> 
        </div>  " ;


   }
 
    
?>
   

</body>
</html>