<?php
    $x = $_GET['x'];
    $y = $_GET['y'];
    $op = $_GET['op'];

    switch($op){
        case '1' : $r = $x + $y; break;
        case '2' : $r = $x - $y; break;
        case '3' : $r = $x * $y; break;
        case '4' : $r = $x / $y; break;
    }
    echo "$x + $y = $r";
    

?>