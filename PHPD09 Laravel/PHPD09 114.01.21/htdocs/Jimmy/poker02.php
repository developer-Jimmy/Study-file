<?php
    // 洗牌
    $poker = [];
    for ($i = 0; $i < 52; $i++) {
        do {
            $temp = rand(0, 51);
            // 檢查機制
            $isRepeat = false;
            for ($j = 0; $j < $i; $j++) {
                if ($temp == $poker[$j]){
                    // 重複了
                    $isRepeat = true;
                    break;
                }
            }
        }while ($isRepeat);
        
        $poker[] = $temp;
    }


    foreach ($poker as $card) {
        echo "{$card}<br>";
    }
    // 發排

    // 攤牌 + 理排

?>