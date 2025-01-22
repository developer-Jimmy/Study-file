<?php
    include('JimmyApis.php');
    $sql = 'SELECT * FROM gift';
    $stmt = $pdo->query($sql);
    $gifts = $stmt->fetcheAll(PDO::FETCH_ASSOC);
    // var_dump($gifts);
    foreach($gifts as $gift) {
        echo "{$gift['name']}<br/>";
    }
?>