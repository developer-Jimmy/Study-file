<?php
    if (!isset($_GET['account'])) return;
    $account = $_GET['account'];
    $sql = 'SELECT account nums FROM cust WHERE account = ?';
    $mysqli = new mysqli('localhost','root','', 'Jimmy');
    $mysqli->set_charset('utf8');
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('s', $account);
    if ($stmt->execute()){
        $stmt->store_result();
        if ($stmt-> num_rows() > 0){
            echo 'Account EXIST!';
        }
    }
    


?>