<?php 
include_once "../common/header.php";
// include_once "../common/footer.php";
// Don't know why this works, but the include_at the bottom of the page
// include_once "../database/attendance/db-sign-attendance.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
  <div class="container">
    <div class="row justify-content-center gap-5">

      <!-- Emploi du temps de la journée -->
      <div class="card align-self-start bg-white border-0 shadow col-md-4 p-0">
        
        <div class="schedule-header rounded-top p-1">
          <h5 class="mb-2 text-center text-white">Emploi du temps</h5>
        </div>
        
        <div class="table-responsive rounded-bottom">
          <table class="table table-bordered mb-0">
            <thead>
              <tr>
                <th scope="col" class="text-center fw-bold">Heure</th>
                <th scope="col" class="text-center fw-bold">Matière</th>
                <th scope="col" class="text-center fw-bold">Enseignant</th>
              </tr>
            </thead>
            <tbody>
              <!-- <?php if ($no_class_today): ?> -->
                <tr>
                    <td colspan="3" class="text-center text-secondary">
                        Pas de cours aujourd'hui
                    </td>
                </tr>
              <!-- <?php else: ?> -->
                <!-- <?php foreach ($schedules as $schedule): ?> -->
                  <tr>
                    <td class="text-center"><?= (new DateTime($schedule['start_datetime']))->format('H:i') . ' - ' . (new DateTime($schedule['end_datetime']))->format('H:i') ?></td>
                    <td class="text-center"><?= $schedule['subject_name'] ?></td>
                    <td class="text-center"><?= $schedule['teacher_name'] ?></td>
                  </tr>
                <!-- <?php endforeach; ?> -->
              <!-- <?php endif; ?> -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- Signature -->
      <div class="card align-self-start bg-white border-0 shadow col-md-3 p-0">
        <div class="schedule-header rounded-top p-1 mb-2">
          <h5 class="mb-2 text-center text-white">Signature</h5>
        </div>
        
        <!-- Display the subject, teacher name, and schedule times for which the signature is required -->
        <!-- <?php if (!$no_class_today && isset($schedules[0])): ?> -->
          <div class="d-flex flex-column align-items-center p-3">
            <p class="text-secondary mb-1"><strong>Date :</strong> <?= date('d/m/Y') ?></p>
            <p class="text-secondary mb-1"><strong>Horaire :</strong> 
              <?= (new DateTime($schedules[0]['start_datetime']))->format('H:i') . ' - ' . (new DateTime($schedules[0]['end_datetime']))->format('H:i') ?>
            </p>
            <p class="text-secondary mb-1"><strong>Matière :</strong> <?= $schedules[0]['subject_name'] ?></p>
            <p class="text-secondary mb-4"><strong>Enseignant :</strong> <?= $schedules[0]['teacher_name'] ?></p>
            
            <!-- Check if the student has already signed for this schedule -->
            <!-- <?php if ($is_signed): ?> -->
              <!-- Display "Présence confirmée" if signed -->
              <p class="text-success"><strong>Présence confirmée</strong></p>
            <!-- <?php else: ?> -->
              <!-- Show the Sign button if not signed -->
              <form action="" method="POST">
                <input type="hidden" name="schedule_id" value="<?= $schedules[0]['schedule_id'] ?>" />
                <button type="submit" name="sign" class="btn rounded-pill">Signer</button>
              </form>
            <!-- <?php endif; ?> -->
          </div>


          <!-- <?php else: ?> -->
            <div class="d-flex justify-content-center">
              <p>Aucune signature nécessaire aujourd'hui.</p>
            </div>
          <!-- <?php endif; ?> -->
      </div>

    </div>
  </div>
</main>
    
<?php 
include_once "../common/footer.php";
?>
