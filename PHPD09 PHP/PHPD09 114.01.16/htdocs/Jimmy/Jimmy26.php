<table border='1' width='100%'>

    <?php
    // $dir = @opendir("C:/xampp/htdocs/Jimmy") or exit('Server VERY Busy');
    // echo gettype($dir);
    // var_dump($dir);
    date_default_timezone_set('Asia/Taipei');
    $nowdir = "C:/xampp/htdocs/Jimmy";
    $dir = @opendir($nowdir) or exit('Server VERY Busy');
    while (($file = readdir($dir)) !== false) {
        echo '<tr>';
        echo "<td>{$file}</td>";
        if (is_dir("{$nowdir}/{$file}")) {
            echo "<td>Directory</td>";      
        }else if (is_file("{$nowdir}/{$file}")) {
            echo "<td>File</td>";
        }else {
            echo "<td>Other</td>";
        }
        echo '<td align="right">' . filesize("{$nowdir}/{$file}") . 'bytes</td>';
        echo '<td align="right">' .
            date('Y-m-d H:i:s', filemtime("{$nowdir}/{$file}")) .
            '</td>';

        echo '</tr>';
    }
    
    
    closedir($dir);
    ?>
    </table>