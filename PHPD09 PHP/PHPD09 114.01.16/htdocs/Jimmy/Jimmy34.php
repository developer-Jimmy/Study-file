<?php

    $url = 'https://data.moa.gov.tw/Service/OpenData/ODwsv/ODwsvAgriculturalProduce.aspx';
    $json = file_get_contents($url);
    // echo $json;
    $datas = json_decode($json);
    // var_dump($datas);
    $mysqli = new mysqli('localhost', 'root', '', 'Jimmy');
    $mysqli->set_charset('utf8');

    $mysqli->query('DELETE FROM gift');
    $mysqli->query('ALTER TABLE gift AUTO_INCREMENT = 1');
    $sql = 'INSERT INTO gift (name, feature, addr, town, city, pic) ' .
        'VALUES (?, ?, ?, ?, ?, ?)';
    $stmt = $mysqli->prepare($sql);
    foreach($datas as $row) {
        $name = $row->Name;
        $feature = $row->Feature;
        $addr = $row->SalePlace;
        $city = $row->County;
        $town = $row->Township;
        $pic = $row->Column1;
        $stmt->bind_param('ssssss', $name, $feature, $addr, $city, $town, $pic);
        // echo $row->Name . '<br>';
        $stmt->execute();

        
    }
    echo 'OK2';