<?php 
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../database/dashboard/db-student-dashboard.php";
include_once "../database/attendance/db-sign-attendance.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
  <div class="container">
    <div class="row justify-content-center gap-5">

      <!-- Emploi du temps de la journée -->
      <div class="card align-self-start bg-white border-0 shadow col-md-4 p-0">
        
        <div class="schedule-header rounded-top p-1">
          <h5 class="mb-2 text-center text-white">Emploi du temps</h5>
          <p class="text-center text-white mb-1"><?= date('d/m/Y') ?></p> 
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
                    <td colspan="4" class="text-center text-secondary">
                        Pas de cours aujourd'hui
                    </td>
                </tr>
              <!-- <?php else: ?> -->
                <!-- <?php foreach ($schedules as $schedule): ?> -->
                  <tr>
                  <td class="text-center">
                              <?= (new DateTime($schedule['start_time']))->format('H:i') . ' - ' . 
                                  (new DateTime($schedule['end_time']))->format('H:i') ?>
                            </td>
                    <td class="text-center"><?= $schedule['subject'] ?></td>
                    <td class="text-center"><?= $schedule['teacher'] ?></td>
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

        <div class="d-flex justify-content-center align-items-center flex-column">
            <p class="text-center"><?= $current_teacher_name ?></p>
            <p class="textcenter"><?= $current_subject_name ?></p>
            <?php if (!empty($ongoingSchedule)) :?>
              <p><?= (new DateTime($ongoingSchedule[0]['date']))->format('d/m/Y') . ' - ' . 
                    (new DateTime($ongoingSchedule[0]['start_time']))->format('H:i') . ' - ' . 
                    (new DateTime($ongoingSchedule[0]['end_time']))->format('H:i') ?>
              </p>
            <?php endif; ?>
          </div>

        <div class="m-2 mb-4 mw-75 overflow-auto">
          <?php if (empty($ongoingSchedule)): ?>
            <p class="text-center text-secondary">Pas de cours actuellement</p>
          
          <?php elseif (isset($schedules[0])) : ?>
            
            <!-- Vérifie si l'étudiant n'est pas marqué présent -->
            <?php if (!$marked_attendance): ?>
            <p class="text-center text-danger"><strong>Vous êtes absent à ce cours</strong></p>

            <!-- Vérifie si l'étudiant a signé sa présence -->
            <?php elseif ($is_signed): ?>
            <p class="text-center text-success"><strong>Présence confirmée</strong></p>
            
            <!-- Affiche un bouton "Signer" si l'étudient est présent mais n'a pas signé -->
            <?php else: ?>
            <form class="text-center" action="" method="POST">
              <input type="hidden" name="schedule_id" value="<?= $schedule_id ?>" />
              <button type="submit" name="sign" class="btn rounded-pill">Signer</button>
            </form>
            <?php endif; ?>
            
          <?php endif; ?>
        </div>
        
      </div>
    </div>
  </div>
</main>
    
<?php 
include_once "../common/footer.php";
?>
