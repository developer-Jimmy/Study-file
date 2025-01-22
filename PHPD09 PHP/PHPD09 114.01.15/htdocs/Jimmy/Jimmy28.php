<?php
    $fp = fopen('dirl/ns1hosp.csv', 'r');
    while (($line = fgets($fp)) !== false) {
        $data = explode(',', $line);
        echo "{$data[3]} : {$data[4]} : {$data[7]}  <br>";
    }
    fclose($fp);
?>