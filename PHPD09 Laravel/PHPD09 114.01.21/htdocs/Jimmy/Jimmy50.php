
<?php

// 連接到 MySQL 資料庫



$start = '1900-00-00';
$end = '2000-12-31';
if (isset($_GET['start'])){
    $start = $_GET['start'];
    $end = $_GET['end'];
}
$mysqli = new mysqli('localhost', 'root', '', 'Jimmy');
$mysqli->set_charset('utf8');

$sql = 'SELECT e.EmployeeID, e.LastName, SUM(od.UnitPrice*od.Quantity) total
        FROM orders o
        join orderdetails od on (o.OrderID = od.OrderID)
        join employees e on (o.EmployeeID = e.EmployeeID)
        where o.OrderDate BETWEEN ? and ?
        group BY e.EmployeeID
        ORDER BY total DESC ';
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $lastname, $total);        

// Execute the query
// $result = $mysqli->query($sql);


// Check if the query was successful

// if ($result->num_rows > 0) {
//     echo "<h2>Employee Sales Ranking</h2>";
//     echo "<table border='1'>
//             <tr>
//                 <th>Rank</th>
//                 <th>Employee ID</th>
//                 <th>Last Name</th>
//                 <th>Total Sales</th>
//             </tr>";
    
    // Output data of each row
//     $rank = 1;
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>
//                 <td>{$rank}</td>
//                 <td>{$row['EmployeeID']}</td>
//                 <td>{$row['LastName']}</td>
//                 <td>" . number_format($row['total'], 2) . "</td>
//               </tr>";
//         $rank++;
//     }
//     echo "</table>";
// } else {
//     echo "No data available.";
// }

// $mysqli->close();

// 銷售排行
// SELECT e.EmployeeID, e.LastName, SUM(od.UnitPrice*od.Quantity) total
// FROM orders o
// join orderdetails od
// on (o.OrderID = od.OrderID)
// join employees e 
// on (o.EmployeeID = e.EmployeeID)
// group BY e.EmployeeID
// ORDER BY total DESC

// 員工ID為4的總銷售
// SELECT sum(UnitPrice * Quantity) total
// FROM orderdetails
// WHERE OrderID in (
//  	SELECT OrderID from orders
//     where EmployeeID = 4
// )

// 幾月幾日到幾月幾日的銷售量
// SELECT e.EmployeeID, e.LastName, SUM(od.UnitPrice*od.Quantity) total
// FROM orders o
// join orderdetails od
// on (o.OrderID = od.OrderID)
// join employees e 
// on (o.EmployeeID = e.EmployeeID)
// where o.OrderDate BETWEEN '1996-01-01' and '1996-12-31'
// group BY e.EmployeeID
// ORDER BY total DESC
?>
<form action="Jimmy50.php">
    Start: <input type="date" name="start" value='<?= $start ?>' /> ~
    End: <input type="date" name="end" value='<?= $end ?>' />
    <input type="submit" value="Change" />
</form>
<table width='100%' border="1">
    <tr>
        <th>#</th>
        <th>ID</th>
        <th>Name</th>
        <th>Total</th>
    </tr>
    <?php
        $rank = 1;
        while ($stmt->fetch()){
            echo '<tr>';
            echo "<td>{$rank}</td>";
            echo "<td>{$id}</td>";
            echo "<td>{$lastname}</td>";
            echo "<td>{$total}</td>";
            echo '</tr>';
            $rank++;
        }
    ?>
</table>
