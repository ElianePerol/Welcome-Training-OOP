<?php 
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../classes/form/create-subject-form-handler.php";
include_once "../database/create/db-create-subject.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">                
                <div class="card bg-white border-0 shadow p-4 rounded">

                    <h3 class="text-center text-secondary mb-4">Créer une matière</h3>

                    <form action="create-subject.php" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nom-matiere" name="subject_name" placeholder="Entrez le nom de la matière" required>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn rounded-pill w-50">Créer la matière</button>
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