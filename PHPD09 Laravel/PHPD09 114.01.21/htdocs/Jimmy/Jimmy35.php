<?php

$mysqli = new mysqli('localhost', 'root', '', 'Jimmy');
$mysqli->set_charset('utf8');

$id = 10;
$feature = '很好吃';
$sql = 'UPDATE gift SET feature = ? WHERE id = ?';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('si', $feature, $id);
if ($stmt->execute()) {
    echo 'UPDATE success';
}else {
    echo 'UPDATE failure';
}

?>