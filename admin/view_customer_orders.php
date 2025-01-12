<?php
include('db_connect.php'); // Include the database connection file
include('header.php');

// Fetch data from the view
$sql = "SELECT * FROM customer_orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Customer Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Customer ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are records to display
            if ($result->num_rows > 0) {
                // Output each row of the data
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['customer_id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>" . ($row['order_id'] ?? 'No Order') . "</td>
                        <td>" . ($row['order_date'] ?? 'N/A') . "</td>
                        <td>" . ($row['total_amount'] ?? '0.00') . "</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
