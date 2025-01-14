<?php
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../database/update/db-update-class.php";
include_once "../database/delete/db-delete-entry.php";
include_once "../database/db-display-lists.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 col-lg-8">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Liste des classes</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Nom de la classe</th>
                                    <th scope="col" class="text-center">Étudiants</th>
                                    <th scope="col" class="text-center col-md-4">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($classes as $class): ?>
                                    
                                    <tr>
                                        <form action="" method="POST">
                                            <td class="text-center">
                                                <input type="text" name="name" value="<?php echo htmlspecialchars($class['name']); ?>" class="form-control">
                                            </td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#studentsModal-<?php echo $class['id']; ?>">
                                                    Voir la liste
                                                </button>
                                            </td>

                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="update-class" value="<?php echo $class['id']; ?>" class="btn btn-sm me-2"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir modifier cette classe ?')">
                                                            <i class="fa-regular fa-floppy-disk"></i> Modifier
                                                    </button>
                                                    <button type="submit" name="delete-class" value="<?php echo $class['id']; ?>" class="btn btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe ?')">
                                                            <i class="fa-solid fa-trash"></i> Supprimer
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>

                                    <!-- Modal liste d'étudiants -->
                                    <div class="modal fade" id="studentsModal-<?php echo $class['id']; ?>" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="studentsModalLabel">Étudiants de la classe : <?php echo htmlspecialchars($class['name']); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul>
                                                        <?php                                                             
                                                            $students = $fetchStudents->fetchAllStudentsPerClassID($class['id']);
                                                            if (count($students) > 0):
                                                                foreach ($students as $student): ?>
                                                                <li class="list-group-item">
                                                                    <?php echo htmlspecialchars($student['first_name'] . ' ' . $student['surname']); ?>
                                                                </li>
                                                                <?php endforeach; ?>
                                                            
                                                        <?php else : ?>    
                                                                <li class="list-group-item">Aucun étudiant trouvé</li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
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
