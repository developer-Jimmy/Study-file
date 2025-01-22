<?php
    include('JimmyApis.php');
    $sql = 'SELECT * FROM gift WHERE name LIKE :key'
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':key' => '%系列%'
    ]);
    $gifts = $stmt->fetcheAll(PDO::FETCH_OBJ);
    // var_dump($gifts);
    foreach($gifts as $gift) {
        echo "{$gift->name}<br/>";
    }
?>