<?php
    $mysqli = new mysqli('localhost','root','', 'Jimmy');
    $mysqli->set_charset('utf8');

    $sql = 'SELECT id, name, city FROM gift';
    $result = $mysqli->query($sql);
    // while($row = $result->fetch_object()) {
    //     echo "{$row->gname}<br>";
    // }

    $row = $result->fetch_array();
    var_dump($row);

?>