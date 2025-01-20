<?php

    $passwd = '123456';
    $hashPasswd = password_hash($passwd, PASSWORD_DEFAULT);
    // echo strlen($hashPasswd);
    
    if (password_verify('123456', $hashPasswd)){
        echo 'OK';
    }else{
        echo 'XX';
    }