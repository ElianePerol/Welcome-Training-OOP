<?php 
  include_once "../common/header.php";
  include_once "../database/db-connection.php";
  include_once "../classes/form/create-user-form-handler.php";
  include_once "../database/create/db-create-user.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">

      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card bg-white border-0 shadow p-4 rounded">

            <h3 class="text-center text-secondary mb-4">Créer un utilisateur</h3>

            <form action="create-user.php" method="POST">

              <!-- Prénom -->
              <div class="mb-3">
                <label for="prenom" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="prenom" name="first_name" placeholder="Entrez le prénom" required>
              </div>
              
              <!-- Nom -->
              <div class="mb-3">
                <label for="nom" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="nom" name="surname" placeholder="Entrez le nom" required>
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="exemple@campus-espl.org" required>
              </div>

              <!-- Mot de passe -->
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe provisoire :</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez un mot de passe provisoire" required>
              </div>

              <!-- Rôle -->
              <div class="mb-3">
                <label for="role" class="form-label">Rôle :</label>
                <select class="form-control custom-select form-select" id="role" name="role" required>
                  <option value="" selected disabled></option>
                  <option value="etudiant">Étudiant</option>
                  <option value="enseignant">Enseignant</option>
                  <option value="administrateur">Administrateur</option>
                </select>
              </div>

              <!-- Classe -->
              <div class="mb-4">
                <label for="classe" class="form-label">Classe :</label>
                <select class="form-control custom-select form-select mb-4" id="class_id" name="class_id">
                    <option value=""></option>
                    <?php foreach($classes as $class): ?>
                      <option value=<?php echo($class["id"]); ?>> 
                        <?php  echo($class["name"]); ?> 
                      </option>
                    <?php endforeach; ?>
                </select>
              </div>

              <!-- Submit Button -->
              <div class="d-flex justify-content-center">
                <button type="submit" class="btn rounded-pill w-50">Créer l'utilisateur</button>
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