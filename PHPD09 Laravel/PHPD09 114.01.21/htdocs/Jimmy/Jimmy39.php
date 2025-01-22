<?php
    $passwd = password_hash('123456', PASSWORD_DEFAULT) ;
    $id = 1;
    $sql = 'UPDATE cust SET passwd = ? WHERE id = ?';

    $mysqli = new mysqli('localhost','root','', 'Jimmy');
    $mysqli->set_charset('utf8');
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('si', $passwd, $id);
    if ($stmt->execute()){
        echo 'Update Success';
    }else{
        echo 'Update Failure';
    }

?>