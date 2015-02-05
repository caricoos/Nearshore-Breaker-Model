<?php
    $csv = $_GET['csv'];
    $file_path="http://www.caricoos.org/swan_multigrid/beach_safety/beach_hazards_warning_levels_".$csv;

    function getJsonFromCsv($file,$delimiter) { 
        if (($handle = fopen($file, 'r')) === false) {
            die('Error opening file');
        }

        $headers = fgetcsv($handle, 4000, $delimiter);


         $headers = str_replace(' ', '_', $headers);
        
       
        $csv2json = array();

        while ($row = fgetcsv($handle, 4000, $delimiter)) {
            for($i = 0 ; $i < count($row) ; $i++) {
                $row[3] = str_replace('_', ' ', $row[3]);
            }
            $csv2json[] = array_combine($headers, $row);
        }

        fclose($handle);
        return json_encode($csv2json); 
    }

    echo getJsonFromCsv($file_path, ",");

?>



