<?php
$i = 0;
for (printJimmy(); $i < 10; printLine()){
    echo "{$i}<br>";
    $i ++;
}

function printJimmy() {
    echo 'Jimmy<br>';
}

function printLine() {
    echo '<hr>';
}

?>