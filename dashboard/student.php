<?php 
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../database/dashboard/db-student-dashboard.php"
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
        

      </div>

    </div>
  </div>
</main>
    
<?php 
include_once "../common/footer.php";
?>
