<?php
 
// Convert Words (text) to Speech (MP3)
// ------------------------------------
 
// Google Translate API cannot handle strings > 100 characters
   $words = substr($_GET['words'], 0, 100);
 
// Replace the non-alphanumeric characters 
// The spaces in the sentence are replaced with the Plus symbol
   $words = urlencode($_GET['words']);
 
// Name of the MP3 file generated using the MD5 hash
   $file  = md5($words);
  
// Save the MP3 file in this folder with the .mp3 extension 
   $file = "" . $file . ".mp3";
 
// If the MP3 file exists, do not create a new request
   if (!file_exists($file)) {
     $mp3 = file_get_contents('http://translate.google.com/translate_tts?ie=UTF-8&q=allo%20Zappa&tl=fr&textlen=13&idx=0&total=1');
     file_put_contents($file, $mp3);
   }
?>