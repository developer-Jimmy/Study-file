<?php
    // 引入外部文件 'JimmyApis.php'，這裡可能包含一些通用的功能或類別
    include('JimmyApis.php');
    // 開啟會話，保持使用者的登入狀態
    session_start();
    // 檢查是否已經登入，若尚未登入，則重定向到登入頁面 (Jimmy44.php)
    if (!isset($_SESSION['member'])) 
        header('Location: Jimmy44.php');
        $member = $_SESSION['member'];
    
    
    // 檢查是否有提交 'realname' 參數，表示使用者正在更新資料
    if (isset($_POST['realname'])) {
        // 取得表單提交的密碼、真實姓名和頭像
        $passwd = $_POST['passwd'];
        $realname = $_POST['realname']; 
        $icon = $_FILES['icon'];

        // 連接到 MySQL 資料庫
        $mysqli = new mysqli('localhost', 'root', '', 'Jimmy');
        $mysqli->set_charset('utf8');


        // 檢查是否有上傳圖片
        if ($icon['error'] == 0){
            $iconData = file_get_contents($icon['tmp_name']);
            $iconType = $icon['type'];
            // 如果有上傳圖片，執行包含圖片的 SQL 語句來更新資料
            $sql = 'UPDATE cust SET passwd = ?, realname = ?, icon = ?, icontype = ?' .
                ' WHERE id = ?';
            $stmt = $mysqli->prepare($sql);
            $id = $member->getId();
            $stmt->bind_param('ssssi', $passwd, $realname, $iconData, $iconType, $id);
        }else{
            // 如果有上傳圖片，執行包含圖片的 SQL 語句來更新資料
            $sql = 'UPDATE cust SET passwd = ?, $realname = ? WHERE id = ?';
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('ssi', $passwd, $realname, $member->getId());
        }  
        
        if ($stmt->execute()){
            header('Location: Jimmy44.php');
        }else{
            echo "ERROR: {$mysqli->error}";
        }        

    }    
    
?>
<form action="Jimmy49.php" method="post" enctype="multipart/form-data">
    Password: <input type="password" name="passwd"><br>
    Realname: <input name="realname" value='<?php echo $member->getRealname();?>'><br>
    Icon: <input type="file" name="icon"><br>
    <input type="submit" value="Update">
</form>
