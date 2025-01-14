<?php
    $year = 2025;
   

    if($year % 400 ==0 || ($year % 4 == 0 && $year % 100 != 0)){
        $isLeap = true;
    }else{
        $isLeap = false;
    }

    if($year % 4 ==0){
        if ($year % 100 == 0){
            if ($year % 400 == 0){
                $isLeap = true;
            }else {
                $isLeap = false;
            }
            }else {
                $isLeap = true;
            }
        }else{
            $isLeap = false;
        }
    $mesg = $isLeap?'潤':'平';
    echo "{$year} 是 ${mesg} 年";
?>