<?php
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../classes/schedule/weekly-schedule.php";

$teacher_id = $_SESSION['user_id'];

$weeklySchedule = new WeeklySchedule($pdo);
$schedule = $weeklySchedule->GetTeacherSchedule($teacher_id);

$weekDates = $weeklySchedule->GetWeekDates();
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 col-lg-10">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Emploi du Temps Hebdomadaire</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center"></th>
                                    <th scope="col" class="text-center">
                                        Lundi<br><small><?php echo $weekDates[0]; ?></small>
                                    </th>
                                    <th scope="col" class="text-center">
                                        Mardi<br><small><?php echo $weekDates[1]; ?></small>
                                    </th>
                                    <th scope="col" class="text-center">
                                        Mercredi<br><small><?php echo $weekDates[2]; ?></small>
                                    </th>
                                    <th scope="col" class="text-center">
                                        Jeudi<br><small><?php echo $weekDates[3]; ?></small>
                                    </th>
                                    <th scope="col" class="text-center">
                                        Vendredi<br><small><?php echo $weekDates[4]; ?></small>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($hour = 8; $hour <= 18; $hour += 2): ?>
                                    <tr>
                                        <td class="text-center">
                                            <?php 
                                                $start_time = $hour;
                                                $end_time = $hour + 2;
                                                echo sprintf('%dh00 - %dh00', $start_time, $end_time); ?>
                                        </td>
                                        <?php for ($day = 1; $day <= 5; $day++): ?>
                                            <td class="text-center">
                                                <?php 
                                                $start_time = sprintf('%02d:00', $hour);
                                                $end_time = sprintf('%02d:00', $hour + 2);

                                                $scheduled = false;

                                                foreach ($schedule as $lesson) {
                                                    $lesson_start_time = strtotime($lesson['start_time']);
                                                    $lesson_end_time = strtotime($lesson['end_time']);
                                                    
                                                    $slot_start_time = strtotime($start_time);
                                                    $slot_end_time = strtotime($end_time);

                                                    if ($lesson['day'] == $day && 
                                                        $lesson_start_time < $slot_end_time && 
                                                        $lesson_end_time > $slot_start_time) {
  
                                                            echo "<strong>" . htmlspecialchars($lesson['subject_name']) . "</strong><br>";
                                                            echo "Classe : " . htmlspecialchars($lesson['class_name']);
                                                            $scheduled = true;
                                                            break;
                                                    }
                                                }

                                                if (!$scheduled) {
                                                    echo "<em>Aucun cours</em>";
                                                }
                                                ?>
                                            </td>
                                        <?php endfor; ?>
                                    </tr>
                                <?php endfor; ?>
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
