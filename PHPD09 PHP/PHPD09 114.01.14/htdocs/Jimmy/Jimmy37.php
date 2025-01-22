<?php

    $passwd = '123456';
    $hashPasswd = password_hash($passwd, PASSWORD_DEFAULT);
    echo strlen($hashPasswd);
    