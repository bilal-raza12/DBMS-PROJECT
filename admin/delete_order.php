<?php
include('db_connect.php');
include('header.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete order record
    $sql = "DELETE FROM orders WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Order deleted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<a href="view_orders.php">Back to Orders List</a>
