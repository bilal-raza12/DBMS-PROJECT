<?php
session_start();
include '../database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password =md5($_POST['password']);

    $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error='Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form action="" method="post" class="bg-white p-10 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-5">Admin Login</h1>
        <?php if (isset($error)): ?>
            <div class="bg-red-500 text-white p-3 mb-5"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="mb-5">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" class="form-input mt-1 block w-full rounded-md border-gray-300">
        </div>
        <div class="mb-5">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="form-input mt-1 block w-full rounded-md border-gray-300">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Login</button>
    </form>
    
</body>
</html>