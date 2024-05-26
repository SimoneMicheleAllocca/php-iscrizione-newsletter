<?php

// Funzione per verificare la validità dell'email
function email_valid($email) {
  // Controlla se l'email contiene un punto e una chiocciola
  return str_contains($email, ".") && str_contains($email, "@");
}

// Funzione per controllare l'email e restituire un risultato
function control_email($email) {
  $result = [];
  
  // Controlla se l'email è vuota
  if (empty($email)) {
    $result["success"] = false;
    $result["message"] = "Inserisci email"; // Messaggio di errore se l'email è vuota
  } 
  // Controlla se l'email non è valida
  else if (!email_valid($email)) {
    $result["success"] = false;
    $result["message"] = "Email deve contenere una @ e un punto"; // Messaggio di errore se l'email non è valida
  } 
  // Se l'email è valida
  else {
    $result["success"] = true;
    $result["message"] = "Grazie per esserti iscritto! Manderemo aggiornamenti alla tua email {$email}"; // Messaggio di successo
  }

  return $result; // Restituisce il risultato del controllo
}