<?php
// Avvia la sessione se non è già stata avviata
if (!isset($_SESSION)) {
  session_start();
}

// Controlla se l'email non è presente nella sessione
if (!isset($_SESSION["email"])) {
  // Se l'email non è presente, reindirizza l'utente alla pagina di iscrizione
  header("Location: ./index.php");
  die(); // Termina l'esecuzione dello script dopo il reindirizzamento
}

// Recupera l'email dalla sessione
$email = $_SESSION["email"];
?>

<?php include __DIR__ . "/partials/template/head.php"; // Include il template della parte superiore della pagina ?>
<main>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <!-- Messaggio di ringraziamento -->
            <h2>Grazie per esserti iscritto! <?php echo $email; ?></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include __DIR__ . "/partials/template/footer.php"; // Include il template della parte inferiore della pagina ?>