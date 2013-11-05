
    <?php 
    // Input
$user_name = "your-email@email.com";
$picasa_album_id = "xxxxxxxxxxxxxxx";

// build feed URL
$feedURL ="https://picasaweb.google.com/data/feed/api/user/$user_name/albumid/$picasa_album_id";

// read feed into SimpleXML object
$sxml = simplexml_load_file($feedURL);

// get album names and number of photos in each
//echo "<ul>";
foreach ($sxml->entry as $entry) {
	$title = $entry->title;
	$entry_id = $entry->id;
	$photo_id_index = strrpos($entry_id, '/photoid/');
	$account_id_index = strpos($entry_id, '/user/');
	$album_id_index = strpos($entry_id, '/albumid/');
	$account_id = substr($entry_id, $account_id_index+ 6, $album_id_index - ($account_id_index + 6));

	$photo_id = substr($entry_id, $photo_id_index + 9);

	echo "$title -  $account_id - $photo_id <br/>";
}
	?>