<?php

// SELECT o.OrderDate, c.CompanyName, e.LastName, o.RequiredDate, o.ShippedDate
// FROM orders o
// join employees e on (e.EmployeeID = o.EmployeeID)
// join customers c on (c.CustomerID = o.CustomerID)
// where o.ShippedDate > o.RequiredDate
// ORDER BY c.CustomerID


?>