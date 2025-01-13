<script>
    let a = '10', b = 3; // number
    c = a + b;
    a = 'Jimmy'; // string
    typeof(a);
</script>
<?php
    // javascript php: 弱型別 影響運算
    // 變數一定有$
    $true = 123; // 不會撞到關鍵字
    $var1 = 3.21;
    $var2 = 'Jimmy';
    echo gettype($var2);
?>