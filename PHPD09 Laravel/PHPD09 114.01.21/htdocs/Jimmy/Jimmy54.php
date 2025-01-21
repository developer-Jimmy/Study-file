<?php 
    require('JimmyApis.php');
    $sql = 'UPDATE cust SET realname = :realname WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':realname' => '艾米',
        ':id' => 5
    ]);
    echo $stmt->rowCount();

?>