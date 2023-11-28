<?php

class AdminController {
    private $userModel;

    public function __construct() {
        // Initialize the User model
        $this->userModel = new User();
    }

    // Method to view all operators
    public function viewAdminPanel() {
        // Retrieve all operators from the database
        $operators = $this->userModel->getAllOperators();

        // Include the admin panel view
        include '../views/admin_panel.php';
    }

    // Method to reset a user's password
    public function resetPassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve user input from the form
            $userId = $_POST['user_id'];
            $newPassword = $_POST['new_password'];

            // Reset the user's password
            $this->userModel->resetPassword($userId, $newPassword);

            // Redirect to the admin panel (or any other desired page)
            header("Location: ../index.php?action=admin_panel");
            exit();
        }

        // Retrieve the user ID from the query parameters
        $userId = $_GET['id'];

        // Retrieve the user by ID
        $user = $this->userModel->getUserById($userId);

        // Include the form for resetting the password
        include '../views/reset_password.php';
    }
}
