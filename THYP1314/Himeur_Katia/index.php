<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Planning 2013 - 2014</title>
        
    </head>
    <body>
        
            <h1>Planning CDNL 2013 - 2014 </h1>
        <?php
            
            $filePath = "csv.csv";
                    
                    $content = file($filePath);
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
                                        $wrap = "<h1>Semaine n° ".$week." du ".$lundi." au ".$vendredi."</h1>
                                        <table>
                                        <tr>
                                            <td></td>
                                            <td>Lundi<br/>".$lundi."</td>
                                            <td>Mardi<br/>".$mardi."</td>
                                            <td>Mercredi<br/>".$mercredi."</td>
                                            <td>Jeudi<br/>".$jeudi."</td>
                                            <td>Vendredi<br/>".$vendredi."</td>
                                        </tr>
                                        <tr>
                                            <td class='horaire'>9h - 12h</td>
                                            ".$arrayLundi[0].
                                            $arrayMardi[0].
                                            $arrayMercredi[0].
                                            $arrayJeudi[0].
                                            $arrayVendredi[0]."
                                        </tr>
                                        <tr>
                                            <td class='horaire'>12h - 15h</td>
                                            ".$arrayLundi[1].
                                            $arrayMardi[1].
                                            $arrayMercredi[1].
                                            $arrayJeudi[1].
                                            $arrayVendredi[1]."
                                        </tr>
                                        <tr>
                                            <td class='horaire'>15h - 18h</td>".
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
                    
                    
            
            
            ?>
            

    </body>
</html>
