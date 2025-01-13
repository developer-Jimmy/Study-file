<?php
    $id = 'X123456789';
    $regex = '/^[A-Z][12][0-9]{8}$/';
    if(preg_match($regex, $id)) {
        echo 'Ok';
    } else {
        echo 'XX';
    }

?>
