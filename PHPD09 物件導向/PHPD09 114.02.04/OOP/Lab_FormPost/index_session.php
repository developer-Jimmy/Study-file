<?php
session_start();
 
if (isset($_POST["okButton"])) {
    // echo "POST request, OK";
    $_SESSION["userName"] = $_POST["userName"];
    header("Location: hello.php");
    exit();
}
// else {
//     echo "GET Request";
// }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        User Name: <input type="text" name="userName" /> <br />
        <input type="submit" name="okButton" value="OK" />
    </form>
</body>
</html>