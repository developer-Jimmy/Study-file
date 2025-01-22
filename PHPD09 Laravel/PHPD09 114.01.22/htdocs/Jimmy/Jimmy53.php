<?php

    include('JimmyApis.php');
    $sql = 'INSERT INTO cust (account, passwd, realname) VALUES (:account,:passwd,:realname)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':account' => 'jason',
        ':passwd' => password_hash('123456', PASSWORD_DEFAULT),
        ':realname' => 'Jason'
    ]);
    echo $pdo->lastInsertId();
?>