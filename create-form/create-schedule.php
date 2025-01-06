<?php 
  include_once "../common/header.php";
  include_once "../database/db-connection.php";
  include_once "../classes/form/create-schedule-form-handler.php";
  include_once "../database/create/db-create-schedule.php";
//   include_once "../database/db-list-display.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">      
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card bg-white border-0 shadow p-4 rounded">

            <h3 class="text-center text-secondary mb-4">Créer un cours</h3>

            <form action="create-schedule.php" method="POST">

                <!-- Matière -->
                <div class="mb-3">
                    <label for="matiere" class="form-label">Matière :</label>
                    <select class="form-control custom-select form-select mb-4" id="subject_id" name="subject_id" required>
                        <option value=""></option>
                        <?php foreach($subjects as $s): ?>
                            <option value=<?php echo($s["id"]); ?>> 
                                <?php echo($s["name"]); ?> 
                            </option>    
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Date -->
                <div class="mb-3">
                    <label for="date" class="form-label">Date :</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <!-- Horaire -->
                <div class="mb-3">
                    <label for="horaire" class="form-label">Horaire :</label>
                    <input type="time" class="form-control" id="time" name="time" required>
                </div>

                <!-- Durée -->
                <div class="mb-3">
                    <label for="duree" class="form-label">Durée :</label>
                    <select  class="form-control custom-select form-select" name="duree" id="duree">
                        <option value=""></option>
                        <option value="1">1h</option>
                        <option value="2">2h</option>
                        <option value="3">3h</option>
                        <option value="4">4h</option>
                    </select>
                </div>

                <!-- Enseignant -->
                <div class="mb-3">
                    <label for="enseignant" class="form-label">Enseignant :</label>
                    <select class="form-control custom-select form-select" id="enseignant" name="enseignant">
                        <option value=""></option>
                        <?php foreach($teachers as $t): ?>
                            <option value = <?php echo($t["id"]); ?>> 
                                <?php echo($t["first_name"] . " ". $t["surname"]); ?> 
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Classe -->
                <div class="mb-4">
                    <label for="classe" class="form-label">Classe :</label>
                    <select class="form-control custom-select form-select mb-4" id="class_id" name="class_id" required>
                        <option value=""></option>
                        <?php foreach($classes as $class): ?>
                            <option value = <?php echo($class["id"]); ?>>
                                    <?php  echo($class["name"]); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn rounded-pill w-50">Créer le cours</button>
                </div>

            </form>

          </div>
        </div>
      </div>
    </div>
</main>

<?php 
include_once "../common/footer.php";
?>