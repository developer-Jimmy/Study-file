<?php
    function sayYa() {
        echo "Ya<br>";
    }

    sayYa();sayYa();sayYa();sayYa();sayYa();

    function sayHello($name = 'World') {
        echo "Hello, {$name}<br> ";
    }
    sayHello('Jimmy');sayHello('Andy');sayHello('Amy');
    sayHello();

    function sum() {
        // echo func_num_arg(0); count($args);
        // echo func_get_arg(3); $args[3]
        $args = func_get_args();
        $sum = 0;
        foreach($args as $v) {$sum += $v;}
        return $sum;
    }
    $v = sum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
    echo $v;

?>