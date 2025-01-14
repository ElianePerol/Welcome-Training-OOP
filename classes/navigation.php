<?php

class Navigation {
    private $links = [
        'administrateur' => [
            ['label' => 'Tableau de bord', 'href' => '../dashboard/admin.php'],
            ['label' => 'Étudiants', 'href' => '../display-list/list-students.php'],
            ['label' => 'Enseignants', 'href' => '../display-list/list-teachers.php'],
            ['label' => 'Classes', 'href' => '../display-list/list-classes-admin.php'],
            ['label' => 'Matières', 'href' => '../display-list/list-subjects.php'],
            ['label' => 'Plannings', 'href' => '../display-list/list-schedules.php'],
        ],
        'etudiant' => [
            ['label' => 'Accueil', 'href' => '../dashboard/student.php'],
            ['label' => 'Emploi du temps', 'href' => '../weekly-schedule/weekly-student-schedule.php'],
            ['label' => 'Absences', 'href' => '../display-list/list-student-absences.php'],
        ],
        'enseignant' => [
            ['label' => 'Accueil', 'href' => '../dashboard/teacher.php'],
            ['label' => 'Emploi du temps', 'href' => '../weekly-schedule/weekly-teacher-schedule.php'],
            ['label' => 'Classes', 'href' => '../display-list/list-classes-per-teacher.php'],
        ]
    ];

    // Méthode qui retourne le lien en fonction du rôle via une référence php
    public function &getLinks($role) {
        return $this->links[$role];
    }
}

?>