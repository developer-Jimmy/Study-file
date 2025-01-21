<?php
    $a = 10; $b = 4;

    
    // $c = $a;
    // $a = $b;
    // $b = $c;


    // $a = $a + $b;
    // $b = $a - $b;
    // $a = $a - $b;


    $a = $a ^ $b;
    $b = $a ^ $b;
    $a = $a ^ $b;

    echo "a= {$a}; b = {$b} <br>";

    $c = 3; $d = 4;
    echo ($c & $d) . '<br>';
    echo ($c | $d) . '<br>';
    echo ($c ^ $d) . '<br>';

?>