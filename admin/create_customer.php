<?php
include('db_connect.php');
include('header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO customers (name, email, phone) VALUES ('$name', '$email', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo "New customer created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<form method="POST">
    <label>Name: </label><input type="text" name="name" required><br>
    <label>Email: </label><input type="email" name="email" required><br>
    <label>Phone: </label><input type="text" name="phone" required><br>
    <button type="submit">Create Customer</button>
</form>
