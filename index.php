<?php
require_once __DIR__ . "/partials/functions.php";

// Avvia la sessione se non è già stata avviata
if (!isset($_SESSION)) {
  session_start();
}

// Se il form non è ancora stato inviato, l'array $_POST non conterrà la chiave 'email'
var_dump($_POST);
$result;
if (isset($_POST["email"])) {
  
  // Se l'utente ha cliccato su invia ma l'input era vuoto, la chiave 'email' sarà presente ma con un valore di stringa vuota
  $user_email = $_POST["email"];
  $result = control_email($user_email); // Chiama la funzione per controllare l'email
  
  // In caso di successo, salva l'email nella sessione e reindirizza l'utente alla pagina di ringraziamento
  if ($result["success"]) {
    $_SESSION["email"] = $user_email;
    header("Location: ./thankyou.php");
    die(); // Termina
  }
}
?>

<?php include __DIR__ . "/partials/template/head.php"; // Includi il template della testa ?>
<main>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <h2>Iscriviti alla nostra newsletter</h2>
            
            <?php if (isset($result)) { // Controlla se il risultato è impostato per mostrare il messaggio ?>
              <div class="alert <?php echo $result["success"] ? 'alert-success' : 'alert-danger'; ?>">
                <?php echo $result["message"]; // Mostra il messaggio del risultato ?>
              </div>
            <?php } ?>
            
            <form action="index.php" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Indirizzo email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($result) && !$result["success"] ? $user_email : ""; // Mantieni il valore dell'email in caso di errore ?>">
              </div>
              <button type="submit" class="btn btn-primary">Invia</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include __DIR__ . "/partials/template/footer.php"; // Includi il template del footer ?>