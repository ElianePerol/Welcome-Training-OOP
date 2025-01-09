<?php 
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../database/update/db-update-teacher.php";
include_once "../database/delete/db-delete-entry.php";
include_once "../classes/getter/fetch-all-teachers.php";

$fetchTeachers = new FetchAllTeachers($pdo);
$teachers = $fetchTeachers->fetchAllTeachers();
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12 col-lg-10">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Liste des enseignants</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Prénom</th>
                                    <th scope="col" class="text-center">Nom</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach ($teachers as $teacher): ?>
                                    <tr>
                                        <form action="" method="POST">
                                            <td class="text-center">
                                                <input type="text" name="first_name" value="<?php echo htmlspecialchars($teacher['first_name']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <input type="text" name="surname" value="<?php echo htmlspecialchars($teacher['surname']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <input type="email" name="email" value="<?php echo htmlspecialchars($teacher['email']); ?>" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="update-teacher" value="<?php echo $teacher['id']; ?>" class="btn btn-sm me-2"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir modifier cet enseignant ?')">
                                                            <i class="fa-regular fa-floppy-disk"></i> Modifier
                                                    </button>
                                                    <button type="submit" name="delete-teacher" value="<?php echo $teacher['id']; ?>" class="btn btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet enseignant ?')">
                                                            <i class="fa-solid fa-trash"></i> Supprimer
                                                    </button>
                                                </div>
                                            </td>
                                        </form>
                                    </tr>
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
