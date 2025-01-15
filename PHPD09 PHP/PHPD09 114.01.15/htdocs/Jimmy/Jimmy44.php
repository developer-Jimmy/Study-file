<?php
    include('JimmyApis.php');
    session_start();

    if (isset($_POST['account'])){
        $account = $_POST['account']; $passwd = $_POST['passwd']; 

        $mysqli = new mysqli('localhost','root','', 'Jimmy');
        $mysqli->set_charset('utf8');
        $sql = 'SELECT id,account,passwd,realname,icon,icontype ' . 
                'FROM cust WHERE account = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $account);
        if ($stmt->execute()){
            $stmt->store_result();
            if ($stmt->num_rows() > 0){
                $stmt->bind_result($id,$account,$hashPasswd,$realname,$icon,$icontype);
                $stmt->fetch();
                if (password_verify($passwd, $hashPasswd)){
                    $member = new Member($id,$account,$realname,$icon,$icontype);
                    $_SESSION['member'] = $member;
                    header('Location: Jimmy41.php');
                }else{
                    // Password ERROR
                    echo 'debug1';
                }
            }else{
                // Account NOT EXIST
                echo 'debug2';
            }

        }else{
            echo 'debug3';
        }
    

    }else{
        echo 'debug4';
    }
?>
<meta charset="UTF-8" />
<h1>Login Page</h1>
<hr />
<form action="Jimmy44.php" method="post" >
    Account: <input name="account" /><br />
    Password: <input type="password" name="passwd" /><br />
    <input type="submit" value="Login" />
</form>