<?php 
    $a = [1, 2, 7, 3, 4, 5, 'name' => 'Jimmy', 'age' => 18];
    // var_dump($a);
    // echo count($a);
    // for ($i = 0; $i < count($a); $i++) {
    //     echo $a[$i] . '<br>';
    // }
    foreach ($a as $k => $v) {
        echo "{$k} : {$v} <br>";
    }
?>