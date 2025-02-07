<?php
global $conn;
require_once 'config.php';
require_once 'classes/User.php';

$user = new User($conn);


$id = $_GET['id'] ?? null;

if (!$id) {
    die("Invalid user ID.");
}

// Delete user
if ($user->delete($id)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error deleting user.";
}
