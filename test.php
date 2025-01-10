<!-- removed bit of code for signatures on student dashboard -->


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