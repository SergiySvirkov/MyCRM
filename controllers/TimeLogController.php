<?php

class TimeLogController {
    private $timeLogModel;

    public function __construct() {
        // Initialize the TimeLog model
        $this->timeLogModel = new TimeLog();
    }

    // Method to view time log entries
    public function viewTimeLog() {
        // Retrieve the user ID from the session (assuming user is logged in)
        session_start();
        $userId = $_SESSION['user_id'];

        // Retrieve time log entries for the user
        $timeLogEntries = $this->timeLogModel->getTimeLogEntriesByUser($userId);

        // Include the time log view
        include '../views/time_log.php';
    }

    // Method to add a new time log entry
    public function addEntry() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve user input from the form
            $userId = $_SESSION['user_id'];
            $hours = $_POST['hours'];
            $day = $_POST['day'];
            $comment = $_POST['comment'];

            // Add a new time log entry
            $this->timeLogModel->addTimeLogEntry($userId, $hours, $day, $comment);

            // Redirect to the time log page (or any other desired page)
            header("Location: ../index.php?action=time_log");
            exit();
        }

        // Include the form for adding new entries
        include '../views/add_entry.php';
    }

    // Method to edit an existing time log entry
    public function editEntry() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve user input from the form
            $entryId = $_POST['entry_id'];
            $hours = $_POST['hours'];
            $comment = $_POST['comment'];

            // Update the time log entry
            $this->timeLogModel->updateTimeLogEntry($entryId, $hours, $comment);

            // Redirect to the time log page (or any other desired page)
            header("Location: ../index.php?action=time_log");
            exit();
        }

        // Retrieve the entry ID from the query parameters
        $entryId = $_GET['id'];

        // Retrieve the time log entry by ID
        $timeLogEntry = $this->timeLogModel->getTimeLogEntryById($entryId);

        // Include the form for editing the entry
        include '../views/edit_entry.php';
    }

    // Method to delete a time log entry
    public function deleteEntry() {
        // Retrieve the entry ID from the query parameters
        $entryId = $_GET['id'];

        // Delete the time log entry
        $this->timeLogModel->deleteTimeLogEntry($entryId);

        // Redirect to the time log page (or any other desired page)
        header("Location: ../index.php?action=time_log");
        exit();
    }
}

