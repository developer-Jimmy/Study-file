<?php

    function checkTWId($id) {
        $isRight = false;
        // 1. length == 10
        // if (strlen($id) == 10) {
        //     $c1 = substr($id, 0, 1);
        //     $letters = 'ABCDEFGHIJKLMNOPRSTUVWXYZ';
        //     if(strpos($letters, $c1) !== false) {
        //         $c2 = substr($id, 1, 1);
        //         if ($c2 == '1' || $c2 == '2') {
        //             $c3 = substr($id, 2, 7);
        //             if (is_numeric($c3)) {
        //                 $isRight = true;
        //             }
        //         }
        //     }
        // }


    $regex = '/^[A-Z][12][0-9]{8}$/';
    if(preg_match($regex, $id)) {
        $c1 = substr($id, 0, 1);
        $letters = 'ABCDEFGHJKLMNPQRSTUVXYWZIO';
        $a12 = strpos($letters, $c1) + 10;
        $a1 = (int)($a12 / 10);
        $a2 = $a12 % 10;
        $n1 = substr($id, 1, 1);
        $n2 = substr($id, 2, 1);
        $n3 = substr($id, 3, 1);
        $n4 = substr($id, 4, 1);
        $n5 = substr($id, 5, 1);
        $n6 = substr($id, 6, 1);
        $n7 = substr($id, 7, 1);
        $n8 = substr($id, 8, 1);
        $n9 = substr($id, 9, 1);
        $sum = $a1*1 + $a2*9 + $n1*8 + $n2*7 + $n3*6 + $n4*5 + $n5*4 + $n6*3 + $n7*2 + $n8*1 + $n9*1;
        $isRight = $sum % 10 == 0;
    }

        return $isRight;
    }
    if(checkTWId('A123456789')) {
        
        echo 'OK';
    }else {
        echo 'XX';
    }

?>