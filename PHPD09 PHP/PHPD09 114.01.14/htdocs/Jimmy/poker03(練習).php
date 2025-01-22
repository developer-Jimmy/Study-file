
<?php
    $poker = range(0, 9);
    for($i = 9; $i > 0; $i--) {
        $rand = rand(0, $i);
        // $poker[$rand] <=> $poker[$i]
        $temp = $poker[$rand];
        $poker[$rand] = $poker[$i];
        $poker[$i] = $temp;
    }
    foreach($poker as $card){
        echo "{$card} <br>";
    }

?>

