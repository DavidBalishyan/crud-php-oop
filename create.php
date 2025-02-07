<?php
global $conn;
require_once 'config.php';
require_once 'classes/User.php';

$user = new User($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($user->create($name, $email)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error adding user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
<h1 class="text-2xl font-bold mb-4">Add User</h1>
<form method="POST">
    <input type="text" name="name" placeholder="Name" class="border p-2 w-full mb-2" required>
    <input type="text" name="email" placeholder="Email" class="border p-2 w-full mb-2" required>
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
</form>
</body>
</html>
