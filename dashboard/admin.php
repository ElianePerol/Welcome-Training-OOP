<?php
include_once "../common/header.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container d-flex justify-content-center">
        <div class="row justify-content-center align-items-center">
            <div class="col-10 col-md-8 col-lg-6">
                
                <div class="col-10 col-md-8 col-lg-6">
                    <h2 class="text-center text-secondary mb-5">Tableau de bord</h2>
                </div>

                <div class="row g-4 gx-5">

                    <div class="col-6 mb-4 d-flex justify-content-center">
                        <a href="../create-form/create-user.php" class="text-decoration-none">
                            <div class="card beep text-secondary text-center shadow border-0 px-5 py-2">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h5 class="mb-0">Nouvel <br> utilisateur</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mb-4 d-flex justify-content-center">
                        <a href="../create-form/create-class.php" class="text-decoration-none">
                            <div class="card beep text-secondary text-center shadow border-0 px-5 py-2">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h5 class="card-title mb-0">Nouvelle <br> classe</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mb-4 d-flex justify-content-center">
                        <a href="../create-form/create-subject.php" class="text-decoration-none">
                            <div class="card beep text-secondary text-center shadow border-0 px-5 py-2">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h5 class="card-title mb-0">Nouvelle <br> matière</h5>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-6 mb-4 d-flex justify-content-center">
                        <a href="../create-form/create-schedule.php" class="text-decoration-none">
                            <div class="card beep text-secondary text-center shadow border-0 px-5 py-2">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h5 class="card-title mb-0">Nouveau <br> cours</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>


<?php 
include_once "../common/footer.php";
?>