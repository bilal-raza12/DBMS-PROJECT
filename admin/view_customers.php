<?php
include('db_connect.php');
include('header.php');

$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

echo "<h2>Customers</h2>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Actions</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['name']."</td>
    <td>".$row['email']."</td>
    <td>".$row['phone']."</td>
    <td>
        <a href='update_customers.php?id=".$row['id']."'>Update</a> | 
        <a href='delete_customer.php?id=".$row['id']."'>Delete</a>
    </td>
    </tr>";
}

echo "</table>";
?>
