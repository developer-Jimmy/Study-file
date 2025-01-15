<?php
    // upload_max_filesize ==> php.ini
    // post_max_size=40M
    // memory_limit=512M
    $upload = $_FILES['upload'];
    // var_dump($upload);
    // foreach($upload as $k => $v) {
    //     echo "{$k} : {$v}<br>";
    // }
    if($upload['error'] == 0) {
        move_uploaded_file($upload['tmp_name'], "upload/{$upload['name']}");
    } else {
        echo 'Upload Failure';
    }
?>
