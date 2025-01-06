<?php

class ScheduleForm {
    
    public $subject_id;
    public $class_id;
    public $teacher_id;
    public $start_datetime_str;
    public $end_datetime_str;

    private $date;
    private $time;
    private $length;

    public function __construct() {
        $this->fetchForm();
        $this->setLength();
        $this->dateHandler();
    }

    private function fetchForm() {
        $this->subject_id = $_POST['subject_id'];
        $this->class_id = $_POST['class_id'];
        $this->teacher_id = empty($_POST['enseignant']) ? NULL : $_POST['enseignant'];
        $this->date = $_POST['date'];
        $this->time = $_POST['time'];
    }

    private function setLength() {
        $this->length = isset($_POST['duree']) ? (int)$_POST['duree'] : 0;
    }

    private function dateHandler() {
        // Combines date and time to form start_datetime using DateTime
        $start_datetime = new DateTime("$this->date $this->time");

        // Clones start_datetime to calculate end_datetime and add duration in hours
        $end_datetime = clone $start_datetime;
        $end_datetime->modify("+$this->length hours");

        // Converts DateTime objects to string format for database insertion
        $this->start_datetime_str = $start_datetime->format('Y-m-d H:i:s');
        $this->end_datetime_str = $end_datetime->format('Y-m-d H:i:s');
    }

}