<?php
$row = 1;
$csv = $_GET['csv'];
$response = "";


//This is the path of the CSV file.
$file_path="http://www.caricoos.org/swan_multigrid/beach_safety/beach_hazards_warning_levels_".$csv;
echo $file_path;
if (($handle = fopen($file_path, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $response .= "|";
        $row++;
        for ($c=0; $c < $num; $c++) {
            $response .= $data[$c] . ",";
        }
    }
    echo $response;
    fclose($handle);
}
?>

