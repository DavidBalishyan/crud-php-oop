<?php
require_once 'config.php';
require_once 'classes/User.php';

$user = new User($conn);

// Get user ID from query parameters
$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid user ID.");
}

// Fetch user details
$userData = $user->getById($id);

if (!$userData) {
    die("User not found.");
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($user->update($id, $name, $email)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
<h1 class="text-2xl font-bold mb-4">Edit User</h1>
<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($userData['name']) ?>" class="border p-2 w-full mb-2" required>
    <input type="email" name="email" value="<?= htmlspecialchars($userData['email']) ?>" class="border p-2 w-full mb-2" required>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    <a href="index.php" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
</form>
</body>
</html>
