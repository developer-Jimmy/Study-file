<?php
    $a = array();
    echo gettype($a);
    $b = [];
    echo gettype($b);
    echo '<hr>';
    $c = array(1, 2, 3, 4);
    var_dump($c);
    $d = 'Jimmy';
    var_dump($d);
    echo '<hr>';
    $e = array(1, 2, 7 => 3, 4, 5, 6);
    var_dump($e);
    echo '<hr>';
    $e[] = 'Jimmy';
    var_dump($e);


?>