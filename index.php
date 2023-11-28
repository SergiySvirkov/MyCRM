<?php

// Autoload classes using Composer (if you are using Composer)
// require_once 'vendor/autoload.php';

// Include necessary files
require_once 'config/database.php';
require_once 'app/models/User.php';
require_once 'app/models/TimeLog.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/TimeLogController.php';
require_once 'app/controllers/AdminController.php';

// Get the requested page/action from the URL
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Instantiate controllers based on the requested action
switch ($action) {
    case 'login':
    case 'register':
        $authController = new AuthController();
        $authController->{$action}();
        break;
    
    case 'time_log':
        $timeLogController = new TimeLogController();
        $timeLogController->viewTimeLog();
        break;

    case 'add_entry':
        $timeLogController = new TimeLogController();
        $timeLogController->addEntry();
        break;

    case 'edit_entry':
        $timeLogController = new TimeLogController();
        $timeLogController->editEntry();
        break;

    case 'admin_panel':
        $adminController = new AdminController();
        $adminController->viewAdminPanel();
        break;

    case 'reset_password':
        $adminController = new AdminController();
        $adminController->resetPassword();
        break;

    default:
        // Handle 404 error or redirect to the default action
        break;
}

