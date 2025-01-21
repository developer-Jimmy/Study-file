<?php
    include('JimmyApis.php');

    $myScooter = new Scooter();
    echo "Speed: {$myScooter->getSpeed()}<br>";
    $myScooter->changeGear(2);
    $myScooter->upSpeed();$myScooter->upSpeed();
    $myScooter->changeGear(4);
    $myScooter->upSpeed();$myScooter->upSpeed();
    echo "Speed: {$myScooter->getSpeed()}<br>";


?>