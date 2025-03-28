<?php
include_once "../common/header.php";
include_once "../database/create/db-support.php";
?>

<main class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card bg-white border-0 shadow p-4 rounded">

                    <h3 class="text-center text-secondary mb-4">Demande de support</h3>

                    <?php if (isset($message_sent)): ?>
                        <?php if ($message_sent): ?>
                            <div class="alert alert-success" role="alert">
                                Votre message a été envoyé avec succès.
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger" role="alert">
                                Une erreur est survenue lors de l'envoi du message.
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <form action="support.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Votre nom" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn rounded-pill w-50">Envoyer</button>
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