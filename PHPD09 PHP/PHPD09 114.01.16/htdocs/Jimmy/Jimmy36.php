<?php
$mysqli = new mysqli('localhost', 'root', '', 'Jimmy');
$mysqli->set_charset('utf8');

$id = 10;
$sql = 'DELETE FROM gift WHERE id = ?';
$stmt = $mysqli->prepare($sql);
$stmt->bind_param('i', $id);
if ($stmt->execute()) {
    echo 'UPDATE success';
}else {
    echo 'UPDATE failure';
}

?>