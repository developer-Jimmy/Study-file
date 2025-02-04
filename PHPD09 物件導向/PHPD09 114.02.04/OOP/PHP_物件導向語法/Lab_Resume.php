<?php

// How to resume next when error occured?

$result = "";

for($i = 1; $i <= 9; $i++)
{
    $status = foo($i);
    if ($status == "No") {
        foo($i);
    }
    else if ($status == "Fetal Error") {
    break;
    }
}

echo $result;


// function foo($i)
// {
// 	echo $i . "<br>";
//     global $result;

//     if ($i == 4)
//     {
//     	$err = new Exception("An Error occured");
//     	// echo $err->getMessage(), "<br>";
//         throw $err;
//     }
    
//     $result .= "$i,";
// }
function foo($i){
    echo $i . "<br>";
    global $result;

    try { 
        if ($i == 4)
        {
    	    $err = new Exception("An Error occured ERRRR");
    	    // echo $err->getMessage(), "<br>";
            throw $err;
        }
        $result .= "$i,";
        return 'Yes';

    }
    catch (Exception $err) {
        echo $err->getMessage(), "<br>";
        // return 'No';
        return "Fetal Error";
    }
}


?>
