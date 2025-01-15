<?php
    include('JimmyApis.php');
    session_start();
    if (!isset($_SESSION['member'])) header('Location: Jimmy45.php');
    $member = $_SESSION['member'];
    if (isset($_POST['realname'])) {
        $passwd = $_POST['passwd'];
        $realname = $POST['realname'];
        $icon = $_FILES['icon'];

        $mysqli = new mysqli('localhost', 'root', '', 'Jimmy');
        $mysqli->set_charset('utf8');

        if ($icon['error'] == 0){
            $iconData = file_get_contents($icon['tmp_name']);
            $iconType = $icon['type'];
            $sql = 'INSERT INTO cust SET passwd = ?, realname = ?,icon = ?,icontype = ?' . 
                    ' WHERE id = ?';
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ssssi', $passwd, $realname, $iconData, $iconType, $id);
        }else{
            $sql = 'INSERT INTO cust SET passwd = ?, realname = ? WHERE id = ?';
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ssi', $passwd, $realname, $member->getId());
        }
        if ($stmt->execute()){
            $stmt->store_result();
            header('Location: Jimmy44.php');
        }else{
            echo "ERROR: {$mysqli->error}";
        }

    }
?>


<form action="Jimmy43.php" method="post" 
    enctype="multipart/form-data">
    Password: <input type="password" name="passwd"><br>
    Realname: <input name="realname" value='<?php echo $member->getRealname();?>'><br>
    Icon: <input type="file" name="icon"><br>
    <input type="submit" value="Update">
</form>