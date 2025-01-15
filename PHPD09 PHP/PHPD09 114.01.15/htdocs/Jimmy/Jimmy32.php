<?php
    $mysqli = new mysqli('localhost', 'root', '', 'Jimmy');
    $mysqli->set_charset('utf8');
    $sql = 'INSERT INTO cust (account, passwd, realname)' .  
    'VALUES ("Jimmy", "123456", "Jimmy")';
    $mysqli->query($sql);


?>