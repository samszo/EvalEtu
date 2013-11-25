<?php include "module.inc.php"; include "pagination.inc.php"; $colors = array("C1","C2");
$data = transformation_des_donnees(recuperation_des_donnees("edt.csv", array())); generate_file_js($data); generate_file_css($data); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <link rel="stylesheet" href="css/planning.css" type="text/css">
 <link rel="stylesheet" href="css/pagination.css" type="text/css">
 <link rel="stylesheet" href="fresh.css" type="text/css">
 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
 <script type="text/javascript" src="js/jquery.pagination.js"></script>
 <script type="text/javascript" src="pagination.js"></script>
 <title>Emploi du temps</title>
</head>
<body class="page front">
 <div id="page-wrapper">
  <div id="page">
   <div id="header">
    <h1>Planning THYP</h1>
   </div>
   <div id="main-wrapper">
    <div id="content-area">
    <?php while ( ($current = current($data)) !== FALSE ) { ?>
    <div id="_<?php print key($data); ?>_">
     <div id="<?php print key($data); ?>_Searchresult">
      This content will be replaced when pagination inits.
     </div>
     <div id="<?php print key($data); ?>_hiddenresult" style="display:none;">
      <?php $yeardata = $data[key($data)]; while ( ($current = current($yeardata)) !== FALSE ) { ?>
       <div id="_<?php print key($data)."_".key($yeardata); ?>_" class="result _<?php print key($data); ?>_">
        <div class="periode">
	 <h2> Periode : <?php print get_day($arraydays[0],key($yeardata),key($data))." - ".get_day($arraydays[4],key($yeardata),key($data)); ?></h2>
	</div>
	<div class="content">
	 <table id="semaine">
	  <thead>
	   <tr>
	    <?php for($i = 0; $i < count($arraydays); $i++){ $vardate = get_day($arraydays[$i],key($yeardata),key($data)); ?>
	     <th class="_<?php print key($yeardata); ?>"><?php print  jour_du_cours($vardate)." ".$vardate; ?></th>
	    <?php } ?>
	   </tr>
	  </thead>
	  <tbody>
	   <?php $weekdata = $yeardata[key($yeardata)]; while ( ($current = current($weekdata)) !== FALSE ) { $c=0; $c = 1 - $c; ?>
	    <tr class="<?php print $colors[$c]; ?>">
	     <?php $daydata = $weekdata[key($weekdata)]; while ( ($current = current($daydata)) !== FALSE ) { ?>
	      <td class="<?php print key($yeardata); ?>_">
	       <?php $hourdata = $daydata[key($daydata)]; if($hourdata['date'] !== null) {?>
	       <a href="#"><div class="data">
		<p class="salle"><?php print $hourdata['salle']; ?></p>
		<p class="heure"><?php print date("H:i", strtotime($hourdata['hd']))."-".date("H:i", strtotime($hourdata['hf'])); ?></p>
		<p class="ue"><?php print $hourdata['ue']; ?></p>
		<p class="cours"><?php print $hourdata['cours']; ?></p>
		<p class="profs"><?php print $hourdata['profs']; ?></p>
	       </div></a>
	       <?php } ?>
	       </td>
	     <?php next($daydata); } ?>
	    </tr>
	   <?php next($weekdata); } ?>
	  </tbody>
	 </table>	
	</div>
       </div>
	 <?php next($yeardata); } ?>
      </div>
      <br style="clear:both;" />
      <div id="_<?php print key($data); ?>_Pagination"></div>
      <br style="clear:both;" />
      </div>
    <?php next($data); } ?>
    </div>
    <div id="content-right"></div>
   </div>
   <div id="footer">
				
   </div>
  </div>
 </div>
</body>
</html>