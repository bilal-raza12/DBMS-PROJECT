<?php
include('db_connect.php');

// Fetch sales data
$query = "SELECT order_date, SUM(total_amount) as sales FROM orders GROUP BY order_date";
$result = mysqli_query($conn, $query);

// Prepare data
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);

$conn->close();
?>
