<?php
    $poker = range(0, 51);
    shuffle($poker);

    // foreach ($poker as $card){
    //     echo "{$card} <br>";
    // }
?>

<hr>
<?php

    $players = [[], [], [], []];
    foreach ($poker as $i => $card){
        $players[$i%4][(int)($i/4)] = $card;
    }
?>

<table width = '100%' border = '1'>
    <tr>
        <?php
         '<font color="red">&diams;</font>','&clubs;'];
            $values = ['A', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'J', 'Q', 'K'];
            foreach($players as $player) {
                sort($player);
                echo '<tr>';
                foreach($player as $card) {
                $color = $colors[(int)($card/13)];
                $value = $values[$card %13];
                    echo "<td>{$color}{$value}</td>";
                }
                echo '</tr>';
            }
        ?>
</table>