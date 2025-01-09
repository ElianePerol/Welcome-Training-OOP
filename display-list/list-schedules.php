<?php 
include_once "../common/header.php";
include_once "../database/db-connection.php";
include_once "../database/update/db-update-schedule.php";
include_once "../database/delete/db-delete-entry.php";
include_once "../classes/getter/fetch-all-schedules.php";
include_once "../classes/getter/fetch-all-classes.php";
include_once "../classes/getter/fetch-all-subjects.php";
include_once "../classes/getter/fetch-all-teachers.php";

$fetchSchedules = new FetchAllSchedules($pdo);
$schedules = $fetchSchedules->fetchAllSchedules();

$fetchClasses = new FetchAllClasses($pdo);
$classes = $fetchClasses->fetchAllClasses();

$fetchSubjects = new FetchAllSubjects($pdo);
$subjects = $fetchSubjects->fetchAllSubjects();

$fetchTeachers = new FetchAllTeachers($pdo);
$teachers = $fetchTeachers->fetchAllTeachers();
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-14 col-lg-12">
                <div class="card bg-white border-0 shadow">

                    <div class="schedule-header rounded-top py-2">
                        <h1 class="fs-2 mb-2 text-center p-2 text-white">Liste des plannings</h1>
                    </div>

                    <div class="table-responsive rounded-bottom">
                        <table class="table table-bordered mb-0">
                            
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th scope="col" class="text-center">Date</th>
                                    <th scope="col" class="text-center">Heure de début</th>
                                    <th scope="col" class="text-center">Heure de fin</th>
                                    <th scope="col" class="text-center">Classe</th>
                                    <th scope="col" class="text-center">Matière</th>
                                    <th scope="col" class="text-center">Enseignant</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($schedules as $schedule): ?>
                                    <tr>
                                        <form action="" method="POST">
                                            <!-- Date -->
                                            <td class="text-center">
                                                <input type="date" class="form-control" name="start_date" 
                                                    value="<?php echo date('Y-m-d', strtotime($schedule['start_datetime'])); ?>">
                                            </td>
    
                                            <!-- Heure début -->
                                            <td class="text-center">
                                                <input type="time" class="form-control" name="start_time" 
                                                    value="<?php echo date('H:i', strtotime($schedule['start_datetime'])); ?>">
                                            </td>
    
                                            <!-- Heure fin -->
                                            <td class="text-center">
                                                <input type="time" class="form-control" name="end_time" 
                                                    value="<?php echo date('H:i', strtotime($schedule['end_datetime'])); ?>">
                                            </td>
                                            
                                            <!-- Classe -->
                                            <td class="text-center">
                                                <select class="form-control custom-select form-select" id="class_id" name="class_id">
                                                    <option value="<?php echo ($schedule['class_id']); ?>"><?php echo $schedule['class_name']; ?></option>
                                                    <?php foreach($classes as $class): ?>
                                                        <option value=<?php echo($class["id"]); ?>> 
                                                            <?php  echo($class["name"]); ?> 
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select> 
                                            </td>

                                            <!-- Matière -->
                                            <td class="text-center">
                                                <select class="form-control custom-select form-select" id="subject_id" name="subject_id">
                                                    <option value="<?php echo ($schedule['subject_id']); ?>"><?php echo $schedule['subject_name']; ?></option>
                                                    <?php foreach($subjects as $subject): ?>
                                                        <option value=<?php echo($subject["id"]); ?>> 
                                                            <?php  echo($subject["name"]); ?> 
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <!-- Enseignant -->
                                            <td class="text-center">
                                                <select class="form-control custom-select form-select" id="teacher_id" name="teacher_id">
                                                    <option value="<?php echo ($schedule['teacher_id']); ?>">
                                                        <?php echo ($schedule['teacher_first_name'] . " " . $schedule['teacher_surname']); ?>
                                                    </option>
                                                    <option value=""></option>
                                                    <?php foreach($teachers as $teacher): ?>
                                                        <option value="<?php echo $teacher['id']; ?>"> 
                                                            <?php echo $teacher['first_name'] . " " . $teacher['surname']; ?> 
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <!-- Actions -->
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" name="update-schedule" value="<?php echo $schedule['id']; ?>" class="btn btn-sm me-2"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir modifier ce cours ?')">
                                                            <i class="fa-regular fa-floppy-disk"></i> Modifier
                                                    </button>
                                                    <button type="submit" name="delete-schedule" value="<?php echo $schedule['id']; ?>" class="btn btn-sm"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce cours ?')">
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
