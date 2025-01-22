<?php
    session_start();
    if(!isset($_SESSION['lottery'])) header('Location: Jimmy46.php');
    
    $lottery = $_SESSION['lottery'];
    echo $lottery;  

?>
<a href="Jimmy48.php">Logout</a>