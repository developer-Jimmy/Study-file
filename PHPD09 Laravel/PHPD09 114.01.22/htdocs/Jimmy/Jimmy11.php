<?php
    $ary[2] = 123;
    $ary[21] = 'Jimmy';
    var_dump($ary);
    echo '<hr>';
    $ary[100][1] = 22;
    $ary[101][7] = true;
    $ary[101][4] = 'tony'; 
    $ary[101][2] = 12.3;

    var_dump($ary);
    echo '<hr>';

?>