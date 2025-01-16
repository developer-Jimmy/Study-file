<?php
//    SELECT o.CustomerID, o.EmployeeID,o.OrderDate, p.ProductName, od.UnitPrice, od.Quantity
//    FROM orderdetails od
//    join orders o on (o.OrderID = od.OrderID)
//    JOIN products p on (p.ProductID = od.ProductID)
//    WHERE od.OrderID = 10248

// SELECT o.CustomerID,c.CompanyName, o.EmployeeID,e.LastName, o.OrderDate, p.ProductName, od.UnitPrice, od.Quantity, (od.UnitPrice * od.Quantity) sum
// FROM orderdetails od
// join orders o on (o.OrderID = od.OrderID)
// JOIN products p on (p.ProductID = od.ProductID)
// join employees e on (e.EmployeeID = o.EmployeeID)
// join customers c on (o.CustomerID = c.CustomerID)
// WHERE od.OrderID = 10248
   
//    {
//         'error': 0,
//         'cid': VINET,
//         'eid': 5,
//         'date': '1996-07-04',
//         'detail': [
//                     {
//                         'pname': 'Queso Cabrales',
//                         'price': 14,
//                         'qty': 12
//                     },           
//                     {
//                         'pname': 'Queso Cabrales',
//                         'price': 14,
//                         'qty': 12
//                     },
//                     {
//                         'pname': 'Queso Cabrales',
//                         'price': 14,
//                         'qty': 12
//                     },   
//                 ]
//     }
    // 檢查是否設定 orderId 參數
if (!isset($_REQUEST['orderId'])){
    $respont = ['error' => 1];
}else{
    $orderId = $_REQUEST['orderId'];
    // 資料庫連線與設定
    $mysqli = new mysqli('localhost','root','', 'Jimmy');
    $mysqli->set_charset('utf8');
    // 準備 SQL 查詢來獲取訂單詳情
    $sql = 'SELECT o.CustomerID,c.CompanyName, o.EmployeeID,e.LastName, o.OrderDate, p.ProductName, od.UnitPrice, od.Quantity, (od.UnitPrice * od.Quantity) sum
            FROM orderdetails od
            join orders o on (o.OrderID = od.OrderID)
            JOIN products p on (p.ProductID = od.ProductID)
            join employees e on (e.EmployeeID = o.EmployeeID)
            join customers c on (o.CustomerID = c.CustomerID)
            WHERE od.OrderID = ?';
    // 執行 SQL 查詢並處理結果
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param('i', $orderId);
    if (!$stmt->execute()){
        $respont = ['error' => 2];
    }else{
        // 處理查詢結果
        $stmt->store_result();
        if ($stmt->num_rows == 0){
            $respont = ['error' => 3];
        }else{
            $respont = ['error' => 0];
            $stmt->bind_result($cid,$cname, $eid,$ename ,$date,$pname,$price,$qty,$sum);
            while ($stmt->fetch()){
                $respont['cid'] = $cid;
                $respont['cname'] = $cname;
                $respont['eid'] = $eid;
                $respont['ename'] = $ename;
                $respont['date'] = substr($date, 0, 10);
                $respont['detail'][] = [
                    'pname' => $pname,
                    'price' => $price,
                    'qty' => $qty,
                    'sum' => $sum,
                ];
            }
        }
    }
}

header('Content-type: application/json');
echo json_encode($respont);
?>