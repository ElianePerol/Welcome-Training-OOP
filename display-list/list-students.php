<?php 
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../database/update/db-update-student.php";
include_once "../database/delete/db-delete-entry.php";
include_once "../database/db-display-lists.php";
include_once "../classes/attendance/attendance-handler.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 col-lg-12">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Liste des étudiants</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">                       
                        <table class="table table-bordered mb-0">

                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Prénom</th>
                                    <th scope="col" class="text-center">Nom</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Classe</th>
                                    <th scope="col" class="text-center">Absences</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($students as $student): ?>
                                    <tr>
                                        <form action="" method="POST">
                                            <td class="text-center">
                                                <input type="text" name="first_name" value="<?php echo htmlspecialchars($student['first_name']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" name="surname" value="<?php echo htmlspecialchars($student['surname']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <input type="email" name="email" value="<?php echo htmlspecialchars($student['email']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <select class="form-control custom-select form-select" id="class_id" name="class_id">
                                                    <option value="<?php echo htmlspecialchars($student['class_id']); ?>"><?php echo htmlspecialchars($student['class_name']); ?></option>
                                                    <?php foreach($classes as $class): ?>
                                                        <option value="<?php echo $class['id']; ?>"> 
                                                            <?php echo $class['name']; ?> 
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select> 
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#attendanceModal<?php echo $student['id']; ?>">
                                                    <i class="fa-solid fa-calendar-check"></i> Consulter
                                                </button>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="update-student" value="<?php echo $student['id']; ?>" class="btn btn-sm me-2"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir modifier cet étudiant ?')">
                                                            <i class="fa-regular fa-floppy-disk"></i> Modifier
                                                    </button>
                                                    <button type="submit" name="delete-student" value="<?php echo $student['id']; ?>" class="btn btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">
                                                            <i class="fa-solid fa-trash"></i> Supprimer
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>

                                    <!-- Modal absences -->
                                    <div class="modal fade" id="attendanceModal<?php echo $student['id']; ?>" tabindex="-1" aria-labelledby="attendanceModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="attendanceModalLabel">Absences de <?php echo $student['first_name'] . ' ' . $student['surname']; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <?php
                                                        $attendanceHandler = new AttendanceHandler($pdo);
                                                        $absences = $attendanceHandler->ReturnAbsences($student['class_id'], $student['id']);
                                                        
                                                        if (!empty($absences)) {
                                                            foreach ($absences as $absence) {
                                                                $date = new DateTime($absence['date']);
                                                                $formattedDate = $date->format('d/m/Y');
                                                                $formattedTime = $date->format('H\hi');

                                                                echo "<p><strong>Date :</strong> " . $formattedDate . "<br>";
                                                                echo "<strong>Horaire :</strong> " . $formattedTime . "<br>";
                                                                echo "<strong>Matière :</strong> " . $absence['subject_name'] . "<br>";
                                                                echo "<strong>Enseignant :</strong> " . $absence['teacher_name'] . "</p><hr>";
                                                            }
                                                        } else {
                                                            echo "<p>Aucune absence enregistrée.</p>";
                                                        }
                                                    ?>
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
