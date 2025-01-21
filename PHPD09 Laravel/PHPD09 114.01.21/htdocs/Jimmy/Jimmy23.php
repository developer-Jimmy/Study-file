<?php

    $account = $_REQUEST['account'];
    $passwd = $_REQUEST['passwd'];
    $gender = $_REQUEST['gender'];
    echo "{$account} : {$passwd} : {$gender}<br>";
    $hobby = $_REQUEST['hobby'];
    var_dump($hobby);

?>