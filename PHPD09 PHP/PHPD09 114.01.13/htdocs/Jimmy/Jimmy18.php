<?php
    $info = gd_info();
    // var_dump($info);
    foreach($info as $k => $v) {
        echo "{$k} : {$v}<br>";
    }

?>