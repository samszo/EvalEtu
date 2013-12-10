
<?php
// Supposons que les balises ci-dessus sont disponibles sur example.com
//$metas = get_meta_tags('head1.html');
$source = 'head1.html'

// Notez que les clés sont en minuscule, et
// le . a été remplacé par _ dans la clé

echo 'Mots clé: ' , get_keyword($source);     // documentation php

echo '<br/>' ;

echo 'Descriptif: ', get_description($source);  // n manuel PHP

function get_keyword($file)
{
	/*keyword = '';
	
	$metas = get_meta_tags('$file');
	
	if(	isset($metas['keyword'])	)
	{
	keyword = $metas['keyword'];
	
	}
	
		return $keyword; */
		
	$metas = get_meta_tags($file);

	return $metas['keyword'];


}
function get_description ($file){

	$description = '';
	
	$metas = get_meta_tags('$file');
	
	if(	isset($metas['description'])	)
	{
	description = $metas['description'];
	
	}
	
		return $description;

}
?>
