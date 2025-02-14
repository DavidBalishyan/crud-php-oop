<?php
require_once 'config.php';
require_once 'classes/User.php';
global $conn;

$user = new User($conn);
$users = $user->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-10">
<form action="searchAction.php" method="get">
<input
        type="text"
        placeholder="Search..."
        class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
        name="search"

/>
<button name="searchBtn" type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Search</button>
</form>
<h1 class="text-2xl font-bold mb-4">Users</h1>
<a href="create.php" class="bg-green-500 text-white px-4 py-2 rounded">Add User</a>
<table class="table-auto w-full mt-4 border-collapse border border-gray-300">
    <tr class="bg-gray-200">
        <!--        <th class="border px-4 py-2">ID</th>-->
        <th class="border px-4 py-2">Name</th>
        <th class="border px-4 py-2">Email</th>
        <th class="border px-4 py-2">Actions</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>

            <td class="border px-4 py-2"><?= $user['name'] ?></td>
            <td class="border px-4 py-2"><?= $user['email'] ?></td>
            <td class="border px-4 py-2">
                <a href="update.php?id=<?= $user['id'] ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                <a href="delete.php?id=<?= $user['id'] ?>" class="bg-red-500 text-white px-2 py-1 rounded">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
