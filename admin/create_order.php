<?php
include('db_connect.php');
include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customer_id = $_POST['customer_id'];
    $order_date = $_POST['order_date'];
    $total_amount = $_POST['total_amount'];
    $status = $_POST['status'];

    $sql = "INSERT INTO orders (customer_id, order_date, total_amount, status) VALUES ('$customer_id', '$order_date', '$total_amount', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "New order created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<form method="POST">
    <label>Customer ID: </label><input type="text" name="customer_id" required><br>
    <label>Order Date: </label><input type="date" name="order_date" required><br>
    <label>Total Amount: </label><input type="number" name="total_amount" step="0.01" required><br>
    <label>Status: </label><input type="text" name="status" required><br>
    <button type="submit">Create Order</button>
</form>
