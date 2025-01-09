<?php 
include_once "database/db-connection.php";
include_once "database/db-user-auth.php";
?>


<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome training - Connexion</title>
    <link rel="stylesheet" href="assets/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body class="bg-light d-flex align-items-center vh-100">

  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card bg-white border-0 shadow p-4 rounded">

                    <div class="d-flex justify-content-center mb-3">
                        <img src="assets/img/logo.png" class="img-fluid w-50" alt="Logo Welcome Training">
                    </div>

                    <h3 class="text-center text-secondary mb-5">Connexion</h3>

                    <form action="database/db-user-auth.php" method="post">
                        <div class="mb-3">
                            <label for="email" class="mb-1">Identifiant : </label>
                            <input type="email" class="form-control" name="email" id="email" 
                                placeholder="exemple@campus-espl.org" required>
                        </div>
                        <div class="mb-5">
                            <label for="password" class="mb-1">Mot de passe : </label>
                            <input type="password" class="form-control" name="password" id="" required>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <button type="submit" class="btn rounded-pill w-50">Connexion</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>                    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>