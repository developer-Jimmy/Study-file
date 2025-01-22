<?php
    include('JimmyApis.php');    

    $myBike = new Bike();$urBike = new Bike();
    echo $myBike->getSpeed() . '<br>';
    $myBike->upSpeed();$myBike->upSpeed();$myBike->upSpeed();
    $myBike->upSpeed();$myBike->upSpeed();$myBike->upSpeed();
    echo $myBike->getSpeed() . '<br>';
    echo $urBike->getSpeed() . '<br>';
    $urBike->upSpeed();$urBike->upSpeed();$urBike->upSpeed();
    $urBike->upSpeed();$urBike->downSpeed();$urBike->downSpeed();
    echo $urBike->getSpeed() . '<hr>';

    $myBike->upSpeed();$myBike->upSpeed();$myBike->upSpeed();
    echo $myBike->getSpeed() . '<br>';

?>