<?php

class TimeLog {
    private $db;

    public function __construct() {
        // Connect to the database (you should implement a database connection method)
        $this->db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Method to add a new time log entry
    public function addTimeLogEntry($userId, $hours, $day, $comment) {
        // Check if an entry already exists for the given day
        $existingEntry = $this->getTimeLogEntryByDay($userId, $day);

        if (!$existingEntry) {
            // Insert a new entry into the database
            $stmt = $this->db->prepare("INSERT INTO time_log (user_id, hours, day, comment) VALUES (?, ?, ?, ?)");
            $stmt->execute([$userId, $hours, $day, $comment]);
        } else {
            // Entry already exists for the given day
            // You can handle this situation as needed (e.g., show an error message)
        }
    }

    // Method to retrieve time log entries for a user
    public function getTimeLogEntriesByUser($userId) {
        $stmt = $this->db->prepare("SELECT * FROM time_log WHERE user_id = ?");
        $stmt->execute([$userId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to retrieve a time log entry by day for a user
    public function getTimeLogEntryByDay($userId, $day) {
        $stmt = $this->db->prepare("SELECT * FROM time_log WHERE user_id = ? AND day = ?");
        $stmt->execute([$userId, $day]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Method to update a time log entry
    public function updateTimeLogEntry($entryId, $hours, $comment) {
        $stmt = $this->db->prepare("UPDATE time_log SET hours = ?, comment = ? WHERE id = ?");
        $stmt->execute([$hours, $comment, $entryId]);
    }

    // Method to delete a time log entry
    public function deleteTimeLogEntry($entryId) {
        $stmt = $this->db->prepare("DELETE FROM time_log WHERE id = ?");
        $stmt->execute([$entryId]);
    }
}
