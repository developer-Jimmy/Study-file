<?php
    $upload = $_FILES['upload'];
    // var_dump($upload);
    // foreach($upload as $k => $v) {
    //     echo "{$k} : {$v} <br>"
    //     foreach ($v as $kk => $vv) {
    //         echo "{$kk} => {$vv} <br>";
    //     }
    //     echo "<hr>";
    // }

    $count = 0;
    foreach($upload['error'] as $key => $value) {
        if ($value == 0) {
           if(move_uploaded_file($upload["tmp_name"][$key],
                "upload/{$upload['name'][$key]}")) {
                $count++;
            }
        }
    }
    echo "Upload Success: {$count} file(s)";