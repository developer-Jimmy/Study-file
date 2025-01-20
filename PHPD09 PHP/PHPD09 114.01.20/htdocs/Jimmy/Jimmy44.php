<?php
    // 引入外部文件 'JimmyApis.php'，這裡可能包含一些通用的功能或類別
    include('JimmyApis.php');
    // 開啟會話，保持使用者的登入狀態
    session_start();

    // 檢查是否有提交 'account' 這個 POST 參數，若有則進行登入處理
    if (isset($_POST['account'])){
        // 取得帳號與密碼
        $account = $_POST['account']; 
        $passwd = $_POST['passwd']; 
        // 連接到 MySQL 資料庫
        $mysqli = new mysqli('localhost','root','', 'Jimmy');
        $mysqli->set_charset('utf8');
        // 準備 SQL 查詢語句，根據帳號查詢資料表 'cust'
        $sql = 'SELECT id,account,passwd,realname,icon,icontype ' . 
                'FROM cust WHERE account = ?';
        // 使用準備語句（Prepared Statements）來防止 SQL 注入攻擊
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $account);
        if ($stmt->execute()){
            $stmt->store_result();
            if ($stmt->num_rows() > 0){
                $stmt->bind_result($id,$account,$hashPasswd,$realname,$icon,$icontype);
                $stmt->fetch();
                // 使用 password_verify 函數檢查提交的密碼是否與資料庫中的密碼匹配
                if (password_verify($passwd, $hashPasswd)){
                    // 密碼驗證成功，創建一個 Member 類別實例，並將使用者資料存入 Session
                    $member = new Member($id,$account,$realname,$icon,$icontype);
                    $_SESSION['member'] = $member;
                    // 登入成功後，重定向到 'Jimmy41.php' 頁面
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
            // 查詢執行錯誤，顯示調試信息
            echo 'debug3';
        }
    

    }else{
        // 如果沒有提交帳號和密碼，顯示調試信息
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