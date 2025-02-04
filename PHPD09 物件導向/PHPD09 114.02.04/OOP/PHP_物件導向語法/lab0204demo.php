<?php
function test1($a) {
    echo "test1 is working <br>";
    return $a + 1;
}


function test10($a) {
    echo "test10 is working <br>";
    return $a + 10;
}

// $s = textbox1.value;
// if ($s == "breakingNews") {
//     breakingNews();
// } else if ($s == "sport") {
//     sport();
// } else if ($s == "music") {
//     music();
// }


$s = "test10";
$return = $s(100);
echo "result: " . $return;
