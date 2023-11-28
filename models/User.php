<?php

class User {
    private $db;

    public function __construct() {
        // Connect to the database (you should implement a database connection method)
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Method to register a new user
    public function registerUser($username, $password) {
        // Hash the password before storing it in the database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashedPassword]);
    }

    // Method to retrieve a user by username
    public function getUserByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to retrieve a user by ID
    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to reset a user's password
    public function resetPassword($userId, $newPassword) {
        // Hash the new password before updating it in the database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password in the database
        $stmt = $this->db->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$hashedPassword, $userId]);
    }
}

