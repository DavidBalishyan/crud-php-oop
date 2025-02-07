<?php
require_once __DIR__ . '/../config.php';

class User {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Create user
    public function create($name, $email) {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        return $stmt->execute();
    }

    // Read users
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM users ORDER BY id DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get single user by ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    // Update user
    public function update($id, $name, $email) {
        $stmt = $this->conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    // Delete user
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
