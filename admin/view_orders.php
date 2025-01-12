<?php
include('db_connect.php');
include('header.php');

$sql = "SELECT o.id, o.order_date, o.total_amount, o.status, c.name AS customer_name 
        FROM orders o 
        JOIN customers c ON o.customer_id = c.id";
$result = $conn->query($sql);

echo "<h2>Orders</h2>";
echo "<table border='1'>
<tr>
<th>Order ID</th>
<th>Customer Name</th>
<th>Order Date</th>
<th>Total Amount</th>
<th>Status</th>
<th>Actions</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['customer_name']."</td>
    <td>".$row['order_date']."</td>
    <td>".$row['total_amount']."</td>
    <td>".$row['status']."</td>
    <td>
        <a href='update_order.php?id=".$row['id']."'>Update</a> | 
        <a href='delete_order.php?id=".$row['id']."'>Delete</a>
    </td>
    </tr>";
}

echo "</table>";
?>
