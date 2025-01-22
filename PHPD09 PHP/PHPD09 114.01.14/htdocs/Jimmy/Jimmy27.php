<?php
    $fp = fopen('dirl/file1.txt', 'w');
    fwrite($fp, 'Hello, Jimmy');
    fclose($fp);
?>