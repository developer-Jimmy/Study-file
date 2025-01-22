<?php
    include('JimmyApis.php');
    try{
        $pdo->beginTransaction();

        $pdo->exec('INSERT INTO cust (account, passwd, realname) VALUES ("Jimmy1", "123456", "Jimmy")');
        $pdo->exec('INSERT INTO cust (account, passwd, realname) VALUES ("Jimmy2", "123456", "Jimmy")');
       
        $pdo->commit();
        echo 'OK';
    }catch(PDOException $e) {
        $pdo->rollBack();
        echo $e->getMessage() . '<br/>';
    }
    echo 'Game Over'
?>