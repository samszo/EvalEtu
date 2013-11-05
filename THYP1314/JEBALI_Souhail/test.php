<?php
$row = 1;
if (($handle = fopen("katCsv.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num champs à la ligne $row: <br /></p>\n";
        $row++;
        //for ($c=0; $c < $num; $c++) {
            echo $data[3] . "<br />\n";
        //}
    }
    fclose($handle);
}
?>