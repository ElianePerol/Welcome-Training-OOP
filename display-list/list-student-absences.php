<?php
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../classes/attendance/attendance-handler.php";

var_dump($_SESSION);

$student_id = $_SESSION['user_id'];
$class_id = $_SESSION['class_id'];

$attendanceHandler = new AttendanceHandler($pdo);
$absences = $attendanceHandler->ReturnAbsences($class_id, $student_id);
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 col-lg-8">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Mes Absences</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Date</th>
                                    <th scope="col" class="text-center">Heure</th>
                                    <th scope="col" class="text-center">Matière</th>
                                    <th scope="col" class="text-center">Enseignant</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($absences) > 0): ?>
                                    <?php foreach ($absences as $absence): 
                                            $date = new DateTime($absence['date']);
                                            $formattedDate = $date->format('d/m/Y');
                                            $formattedTime = $date->format('H\hi');?>
                                        <tr>
                                            <td class="text-center"><?php echo htmlspecialchars($formattedDate); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($formattedTime); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($absence['subject_name']); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($absence['teacher_name']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Aucune absence trouvée</td>
                                    </tr>
                                <?php endif; ?>
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
