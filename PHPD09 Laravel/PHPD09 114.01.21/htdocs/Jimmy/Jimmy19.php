<?php

    define('WIDTH', 400);
    define('HEIGHT', 20);
    $rate = 0;
    if(isset($_GET['rate'])) $rate = $_GET['rate'];

    // echo (int)($rate/100 * WIDTH);
    // 1. 畫布
    $img = imagecreate(WIDTH, HEIGHT);

    // 2. 作畫
    $yellow = imagecolorallocate($img, 255, 255, 0);
    $red = imagecolorallocate($img, 255, 0, 0);
    imagefill($img, 0, 0, $yellow);
    imagefilledrectangle($img, 0, 0, (int)($rate/100 * WIDTH), 20, $red);

    // 3. 輸出(1. Browser; 2. File)
    header('content-type: image/jpeg');
    imagejpeg($img);
    // 4. 清除
    imagedestroy($img);

?>