<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Planning 2013 - 2014</title>
        
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="scriptaculous/src/scriptaculous.js"></script>

        
    </head>
    <body>
        
            <h1>Planning CDNL 2013 - 2014 </h1>
        <?php
            
            //$filePathLine = "https://docs.google.com/spreadsheet/pub?key=0AgsnhwdtLOYEdEZmcW9nak9GZjRJRU12NEwydVdKUWc&output=csv";
            $filePath = "csv.csv";
                    
                    $handle = fopen($filePath, "r+");
                    $content = fread($handle, filesize($filePath));
                    $lines = explode("\n", $content);
                    $i = 0;
                    foreach ($lines as $line)
                    {
                      if($i != 0)
                      {
                        $values = explode(",", $line);
                        
                        $date = explode(" ",$values[0] );
                        
                        $dateFr = explode("/", $date[0]);
                        $dateJr = $dateFr[0].'/'.$dateFr[1].'/'.$dateFr[2];
                        $dateEn = $dateFr[2].'/'.$dateFr[1].'/'.$dateFr[0];
                        $dd = strtotime($dateEn);
                        
                        $week = date("W", $dd);
                        
                        $horaire = strtotime( $date[1]);
                        $h = date("G", $horaire);
                        
                        
                        if (date("N", $dd) == 1 )
                        {
                                    if($h == 9)
                                    {
                                        //J'initialise mes variables
                                        $arrayLundi = array();
                                        $arrayMardi = array();
                                        $arrayMercredi = array();
                                        $arrayJeudi = array();
                                        $arrayVendredi = array();

                                        $lundi  = '';
                                        $mardi = '';
                                        $mercredi = '';
                                        $jeudi = '';
                                        $vendredi = '';
                                    }
                                
                                $lundi = $dateJr ;
                                $arrayLundi[] = '<td class=\''.$values[4].'\'>
                                                    <div>'.$values[2].'</div>
                                                    <div>'.$values[3].'</div>
                                                    <div>'.$values[5].'</div>
                                                    <div>'.$values[6].'</div>
                                                </td>';
                                        
                        }
                        elseif (date("N", $dd) == 2 ) 
                        {
                                $mardi = $dateJr;
                                $arrayMardi[] = '<td class=\''.$values[4].'\'>
                                                    <div>'.$values[2].'</div>
                                                    <div>'.$values[3].'</div>
                                                    <div>'.$values[5].'</div>
                                                    <div>'.$values[6].'</div>
                                                </td>';
                        }
                        elseif (date("N", $dd) == 3 ) 
                        {
                                $mercredi = $dateJr;
                                $arrayMercredi[] = '<td class=\''.$values[4].'\'>
                                                        <div>'.$values[2].'</div>
                                                        <div>'.$values[3].'</div>
                                                        <div>'.$values[5].'</div>
                                                        <div>'.$values[6].'</div>
                                                    </td>';
                        }
                        elseif (date("N", $dd) == 4 ) 
                        {
                                $jeudi = $dateJr;
                                $arrayJeudi[] = '<td class=\''.$values[4].'\'>
                                                    <div>'.$values[2].'</div>
                                                    <div>'.$values[3].'</div>
                                                    <div>'.$values[5].'</div>
                                                    <div>'.$values[6].'</div>
                                                </td>';
                        }
                        elseif ( date("N", $dd) == 5  ) 
                        {
                                $vendredi = $dateJr;
                                $arrayVendredi[] = '<td class=\''.$values[4].'\'>
                                                        <div>'.$values[2].'</div>
                                                        <div>'.$values[3].'</div>
                                                        <div>'.$values[5].'</div>
                                                        <div>'.$values[6].'</div>
                                                    </td>';
                                
                                    //J'affiche mon tableau
                                if($h == 15)
                                {                                   
                                        $wrap = "<h1>Semaine n° ".$week." du ".$lundi." au ".$vendredi.'</h1>
                                        <div class=\'tout\'>
                                        <table>
                                        <tr>
                                            <td></td>
                                            <td>Lundi<br/>'.$lundi."</td>
                                            <td>Mardi<br/>".$mardi."</td>
                                            <td>Mercredi<br/>".$mercredi."</td>
                                            <td>Jeudi<br/>".$jeudi."</td>
                                            <td>Vendredi<br/>".$vendredi."</td>
                                        </tr>
                                        <tr>
                                            <td class='horaire'>9:00:00 - 12;00:00</td>
                                            ".$arrayLundi[0].
                                            $arrayMardi[0].
                                            $arrayMercredi[0].
                                            $arrayJeudi[0].
                                            $arrayVendredi[0]."
                                        </tr>
                                        <tr>
                                            <td class='horaire'>12:00:00 - 15:00:00</td>
                                            ".$arrayLundi[1].
                                            $arrayMardi[1].
                                            $arrayMercredi[1].
                                            $arrayJeudi[1].
                                            $arrayVendredi[1]."
                                        </tr>
                                        <tr>
                                            <td class='horaire'>15:00:00 - 18:00:00</td>".
                                            $arrayLundi[2].
                                            $arrayMardi[2].
                                            $arrayMercredi[2].
                                            $arrayJeudi[2].
                                            $arrayVendredi[2]." 
                                        </tr></table>
                                        ";
                                        
                                        echo $wrap;
                                }
                        }

                      } $i++;
                      
                      
                    }
                         
                    
            echo ' <div class="images"><button class="btn1">Masquer la liste</button><ul>';
            
            $source_images = file('images.txt');
            
            foreach ($source_images as $img)
            {
                $tab = explode(";", $img);
                echo "<li>",$tab[0] ,"<br/><img src = ".$tab[1]." />
                    <img src ='images/present.png' alt='Présent' title='Présent' onClick=\"alert('Présent')\"/>
                    <img src ='images/absent.png' alt='Absent' title='Absent' onClick=\"alert('Absent')\"/>
                    <img src ='images/retard.png' alt='Retard' title='Retard' onClick=\"alert('Retard')\"/>
                    <img src ='images/excuse.png' alt='Excusé' title='Excusé' onClick=\"alert('Excusé')\"/>
                    </li>";
            }
                
            echo '</ul></div> </div>';
?>
    
    <script>
        $(".btn1").click(function(){
            $(".images").slideUp();
          });
        $( "table" ).click(function() {
          $( '.images' ).slideDown();
        });
    </script>
            
    </body>
</html>