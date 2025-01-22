<?php
$start = 2; $rows = 2; $cols = 4;
if (isset($_GET['start'])){
    $start = $_GET['start'];
    $rows = $_GET['rows'];
    $cols = $_GET['cols'];
}
define("ROWS", $rows);
define("START", $start);
define("COLS", $cols);
?>

<h1>Jimmy</h1>
<hr>
<form action= "Jimmy99.php">
    Start: <input type="number" name = "start" value= "<?php echo $start?>" />
    Rows: <input type="number" name = "rows" value= "<?php echo $rows?>" />
    Columns: <input type="number" name = "cols" value= "<?php echo $cols?>" />
    <input type="submit" value="change">
</form>
<table width= '100%' border = '1'>
        
            <?php
            for($k = 0; $k < ROWS; $k++ ){
            echo '<tr>';
                for($j = START; $j < START+COLS; $j++){
                    $newj = $j + $k * COLS;
                    echo '<td>';
                    for ($i = 1; $i <= 9; $i++) {
                        $r = $newj * $i;
                        echo "{$newj} x {$i} = {$r} <br>";
                    }
                    echo '</td>';
                }
                echo '</tr>';
            }
               
            ?>
</table>