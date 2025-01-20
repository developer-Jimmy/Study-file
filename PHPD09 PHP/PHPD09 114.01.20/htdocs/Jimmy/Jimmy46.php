<?php
    include('JimmyApis.php');
    session_start();
    if (!isset($_SESSION['lottery'])) header('Location: Jimmy45.php');
     
    $lottery = $_SESSION['lottery'];
    echo $lottery;

    $ary = $_SESSION['ary'];
    var_dump($ary);
    echo '<hr>';
    
    $member = $_SESSION['member'];
    echo $member->getRealname();
 ?>
 <a href="Jimmy47.php">Logout</a>