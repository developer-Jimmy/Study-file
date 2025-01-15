<?php
    $rows = file('dirl/ns1hosp.csv');
    foreach($rows as $k => $v) {
        echo "{$k} : {$v}<br>";
    }
    echo "<hr>";
    $content = file_get_contents('dirl/ns1hosp.csv');
    echo $content;
?>