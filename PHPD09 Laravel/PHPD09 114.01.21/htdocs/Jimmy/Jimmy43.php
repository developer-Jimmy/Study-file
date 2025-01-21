<?php
    // 檢查是否傳送 'account' 參數，若沒有則重定向至 'Jimmy04.html' 登入頁面 
    if (!isset($_REQUEST['account'])) header('Location: Jimmy04.html');
    // 連接到 MySQL 資料庫
    $mysqli = new mysqli('localhost','root','', 'Jimmy');
    $mysqli->set_charset('utf8');
    // 從使用者表單中取得帳號、密碼、真實姓名
    $account = $_REQUEST['account'];
    // 使用 `password_hash` 函數對密碼進行加密，使用默認的加密算法（bcrypt）
    $passwd = password_hash($_REQUEST['passwd'], PASSWORD_DEFAULT);
    // 取得使用者真實姓名
    $realname = $_REQUEST['realname'];
    // 檢查是否有上傳圖片，並且檢查上傳是否成功（錯誤碼為 0）
    $icon = $_FILES['icon'];
    if ($icon['error'] == 0){
        // 如果圖片上傳成功，則讀取圖片內容並獲取圖片的 MIME 類型
        $iconData = file_get_contents($icon['tmp_name']);
        $iconType = $icon['type'];
        // 若有圖片，則執行包含圖片資料的 INSERT SQL
        $sql = 'INSERT INTO cust (account,passwd,realname,icon,icontype)' . 
                ' VALUES (?,?,?,?,?)';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssss', $account, $passwd, $realname, $iconData, $iconType);
    }else{
        // 如果沒有圖片，則執行不包含圖片的 INSERT SQL
        $sql = 'INSERT INTO cust (account,passwd,realname) VALUES (?,?,?)';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sss', $account, $passwd, $realname);
    }
    
    if ($stmt->execute()){
        $stmt->store_result();
        // 若成功，則重定向到 'Jimmy44.php'，可能是註冊成功後的頁面
        header('Location: Jimmy44.php');
    }else{
        // 若執行 SQL 出現錯誤，則顯示錯誤訊息
        echo "ERROR: {$mysqli->error}";
    }



?>