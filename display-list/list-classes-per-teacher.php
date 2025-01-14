<?php 
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../database/db-teacher-queries.php"; // Inclure la classe

// Créer une instance de la classe TeacherQueries
$teacherQueries = new FetchAllClassesPerTeacher($pdo);

// Récupérer l'ID du professeur connecté
$teacher_id = $_SESSION['teacher_id']; 

// Obtenir les classes enseignées par le professeur
$classes = $teacherQueries->fetchClassesByTeacher($teacher_id);
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 col-lg-8">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Mes Classes</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Nom de la classe</th>
                                    <th scope="col" class="text-center">Étudiants</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($classes as $class): ?>
                                    <tr>
                                        <td class="text-center"><?php echo htmlspecialchars($class['name']); ?></td>

                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#studentsModal-<?php echo $class['id']; ?>">
                                                Voir la liste
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Modal liste d'étudiants -->
                                    <div class="modal fade" id="studentsModal-<?php echo $class['id']; ?>" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentsModalLabel">Étudiants de la classe : <?php echo htmlspecialchars($class['name']); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        <?php
                                                            // Récupérer les étudiants pour cette classe
                                                            $students = $teacherQueries->fetchClassesByTeacher($class['id']);
                                                            if (count($students) > 0):
                                                                foreach ($students as $student):
                                                        ?>
                                                                <li class="list-group-item">
                                                                    <?php echo htmlspecialchars($student['first_name'] . ' ' . $student['surname']); ?>
                                                                </li>
                                                        <?php
                                                                endforeach;
                                                            else:
                                                        ?>
                                                                <li class="list-group-item">Aucun étudiant trouvé</li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<?php 
include_once "../common/footer.php";
?>
