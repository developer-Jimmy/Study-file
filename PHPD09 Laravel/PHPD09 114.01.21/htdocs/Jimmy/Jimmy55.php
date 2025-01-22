<?php 
    require('JimmyApis.php');
    $sql = 'DELETE FROM SET cust WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => 13
    ]);
    echo $stmt->rowCount();

?>