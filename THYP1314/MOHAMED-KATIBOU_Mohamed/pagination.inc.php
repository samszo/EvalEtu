<?php
function generate_file_js($data){
    $document = "";
    $filename = 'pagination.js';
    if (file_exists($filename)) unlink($filename);
    while(($current = current($data)) !== FALSE){
	if($handle = fopen($filename, 'a')){
            $callback = "function _".key($data)."_Callback(page_index, jq){\n\tvar new_content = jQuery('#".key($data)."_hiddenresult div.result:eq('+page_index+')').clone();\n\t$('#".key($data)."_Searchresult').empty().append(new_content);\n\treturn false;\n}\n\n";
	    $init = "function _".key($data)."_Init(){\n\tvar num_entries = jQuery('#".key($data)."_hiddenresult div.result').length;\n\t$('#_".key($data)."_Pagination').pagination(num_entries, {\n\t\tcallback: _".key($data)."_Callback,\n\t\titems_per_page:1\n\t});\n}\n\n";
	    if (fwrite($handle, $callback.$init) === FALSE) {
		echo "Impossible d'écrire dans le fichier ($filename)"; exit;
	    }
	    $document .= "\t_".key($data)."_Init();\n";
	}
	next($data);		
    }
    if (fwrite($handle, "$(document).ready(function(){\n".$document."});") === FALSE) {
	echo "Impossible d'écrire dans le fichier ($filename)"; exit;
    }
}

function generate_file_css($data){
    $css = "";
    $filename = 'fresh.css';
    if (file_exists($filename)) unlink($filename);
    while(($current = current($data)) !== FALSE){
	if($handle = fopen($filename, 'a')){
            $css .= "#_".key($data)."_ {\n\theight: 540px;\n\tposition: relative;\n}\n";
	}
	next($data);		
    }
    if (fwrite($handle, $css) === FALSE) {
	echo "Impossible d'écrire dans le fichier ($filename)"; exit;
    }
}
?>