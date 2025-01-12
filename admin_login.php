<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection
    $conn = new mysqli("localhost", "root", "", "your_database");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to find the user by username
    $sql = "SELECT * FROM admins WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // Bind username to query
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if username exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify the password (use password_verify if password is hashed)
        if ($password == $user['password']) {  // In a real scenario, use password_verify() here
            // Set session variables
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['username'] = $user['username'];
            
            // Redirect to the admin dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No admin found with that username!";
    }

    // Close connection
    $conn->close();
}
?>