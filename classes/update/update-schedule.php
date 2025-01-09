<?php

class UpdateSchedule {

    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function updateSchedule($class_id, $subject_id, 
        $teacher_id, $start_datetime, $end_datetime, $id){
            $sql = "UPDATE schedule SET
            class_id = :class_id,
            subject_id = :subject_id,
            teacher_id = :teacher_id,
            start_datetime = :start_datetime,
            end_datetime = :end_datetime
            WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
            $stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
            $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
            $stmt->bindParam(':start_datetime', $start_datetime, PDO::PARAM_STR);
            $stmt->bindParam(':end_datetime', $end_datetime, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
        }

}

?>