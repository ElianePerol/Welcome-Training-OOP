<?php 
include_once "../common/header.php";
// include_once "../common/footer.php";
// Don't know why this works, but the include_at the bottom of the page
// include_once "../database/attendance/db-mark-attendance.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
  <div class="container">

    <!-- Emploi du temps de la journée -->
    <div class="row justify-content-center gap-5">
      <div class="card align-self-start bg-white border-0 shadow col-md-4 p-0">

        <div class="schedule-header rounded-top p-1">
            <h5 class="mb-2 text-center text-white">Emploi du temps :</h5>
            <p class="text-center text-white mb-1"><?= date('d/m/Y') ?></p> 
        </div>

        <div class="table-responsive rounded-bottom">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                      <th scope="col" class="text-center fw-bold">Heure</th>
                      <th scope="col" class="text-center fw-bold">Matière</th>
                      <th scope="col" class="text-center fw-bold">Classe</th>
                    </tr>
                </thead>
                <tbody>
                  <!-- <?php if ($no_class_today): ?> -->
                      <tr>
                          <td colspan="4" class="text-center text-secondary">
                              Pas de cours aujourd'hui
                          </td>
                      </tr>
                  <!-- <?php else: ?> -->
                      <!-- <?php foreach ($schedules as $schedule): ?> -->
                          <tr>
                            <td class="text-center"><?= (new DateTime($schedule['start_datetime']))->format('H:i') . ' - ' . (new DateTime($schedule['end_datetime']))->format('H:i') ?></td>
                            <td class="text-center"><?= $schedule['subject_name'] ?></td>
                            <td class="text-center"><?= $schedule['class_name'] ?></td>
                          </tr>
                      <!-- <?php endforeach; ?> -->
                  <!-- <?php endif; ?> -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Classe en cours -->
    <!-- <?php if (!$no_class_today && $current_schedule_id): ?> -->

    <div class="card align-self-start bg-white border-0 shadow col-md-3 p-0 register">
  
      <div class="schedule-header rounded-top p-1 mb-2">
        <h5 class="mb-2 text-center text-white">Appel</h5>
      </div>

      <div class="d-flex justify-content-center align-items-center flex-column">
        <p class="text-center"><?= 'Classe : ' . $current_class_name ?></p>
        <p class="text-center"><?= 'Matière : ' . $current_subject_name ?></p>
      </div>

      <div class="m-2 mb-4 mw-75 overflow-auto">
        <!-- <?php if ($attendance_marked): ?> -->
          <!-- Show "Appel terminé" after attendance is marked -->
          <p class="text-center text-success">Appel terminé</p>
        <!-- <?php else: ?> -->
          <!-- Show student list before the form is submitted -->
          <form action="" method="POST">
            <ul class="list-group mb-3">
                <?php foreach ($students as $student): ?>
                    <input type="hidden" name="attendance[<?= $student['student_id'] ?>]" value="0" />
                    <li class="list-group-item custom-checkbox d-flex justify-content-between align-items-center">
                        <label class="form-check-label" for="student<?= $student['student_id'] ?>">
                            <?= $student['first_name'] . " " . $student['surname'] ?>
                        </label>
                        <input class="form-check-input" type="checkbox" name="attendance[<?= $student['student_id'] ?>]" id="student<?= $student['student_id'] ?>" />
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn rounded-pill w-25">Valider</button>
            </div>

          </form>
        <!-- <?php endif; ?> -->
      </div>
    </div>
    <!-- <?php endif; ?> -->

  </div>
</div>
</main>

<?php 
include_once "../common/footer.php";
?>
