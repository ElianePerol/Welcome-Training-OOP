<?php
include_once "../classes/getter/fetch-all-classes.php";
include_once "../classes/getter/fetch-all-schedules.php";
include_once "../classes/getter/fetch-all-students.php";
include_once "../classes/getter/fetch-all-subjects.php";
include_once "../classes/getter/fetch-all-teachers.php";

$fetchClasses = new FetchAllClasses($pdo);
$classes = $fetchClasses->fetchAllClasses();

$fetchSchedules = new FetchAllSchedules($pdo);
$schedules = $fetchSchedules->fetchAllSchedules();

$fetchStudents = new FetchAllStudents($pdo);
$students = $fetchStudents->fetchAllStudentsAndTheirClassName();

$fetchSubjects = new FetchAllSubjects($pdo);
$subjects = $fetchSubjects->fetchAllSubjects();

$fetchTeachers = new FetchAllTeachers($pdo);
$teachers = $fetchTeachers->fetchAllTeachers();

?>