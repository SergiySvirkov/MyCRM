<?php

class AuthController {
    private $userModel;

    public function __construct() {
        // Initialize the User model
        $this->userModel = new User();
    }

    // Method to handle user login
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve user input from the login form
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Retrieve user from the database by username
            $user = $this->userModel->getUserByUsername($username);

            // Verify user exists and check password
            if ($user && password_verify($password, $user['password'])) {
                // Start a session and store user information
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Redirect to the time log page (or any other desired page)
                header("Location: ../index.php?action=time_log");
                exit();
            } else {
                // Display an error message (you can customize this based on your needs)
                echo "Invalid username or password.";
            }
        }

        // Include the login view
        include '../views/login.php';
    }

    // Method to handle user registration
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve user input from the registration form
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Validate password match
            if ($password !== $confirmPassword) {
                // Display an error message (you can customize this based on your needs)
                echo "Passwords do not match.";
            } else {
                // Register the user in the database
                $this->userModel->registerUser($username, $password);

                // Redirect to the login page (or any other desired page)
                header("Location: ../index.php?action=login");
                exit();
            }
        }

        // Include the registration view
        include '../views/register.php';
    }

    // Method to handle user logout
    public function logout() {
        // Destroy the session and redirect to the login page (or any other desired page)
        session_start();
        session_destroy();
        header("Location: ../index.php?action=login");
        exit();
    }
}

