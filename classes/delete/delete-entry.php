<?php

class DeleteEntry {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function delete($table, $id) {
        // Ensure the table name is safe by using a whitelist or validation
        $allowedTables = ['class', 'schedule', 'user', 'subject'];
        if (!in_array($table, $allowedTables)) {
            throw new Exception("Invalid table name provided.");
        }

        // Prepare and execute the SQL statement
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
