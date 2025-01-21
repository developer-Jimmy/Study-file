<?php
    $img = imagecreatefromjpeg('imgs/coffee.jpg');

    $yellow = imagecolorallocate($img, 255, 255, 0);

    imagettftext($img, 24, 30, 100, 300, $yellow, 'fonts/OK2.ttf', '資策會論壇專屬, 歡迎到來');

    header('content-type: image/jpeg');
    imagejpeg($img);

    imagejpeg($img, 'imgs/Jimmy.jpg');
    imagedestroy($img);
    
?>