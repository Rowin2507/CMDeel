<?php

// CONFIGURATION
include '../assets/includes/config.php';

if (isset($_POST['appearance_submit'])) {

  // SET APPEARANCE TOGGLE
  if (isset($_POST['appearance']) && $_POST['appearance'] == 'dark') {
    $appearance = 'dark';
  } else {
    $appearance = 'light';
  }

  // INSERT INTO DATABASE
  $query = "UPDATE cmdeel_users SET appearance='$appearance' WHERE username='$session_username'";
  $result = mysqli_query($dbc,$query) or die ('<div class="alert alert-error">Daar ging iets fout tijdens het activeren..</div>');
  
  header("Location: account-settings");
} else if (isset($_POST['password_submit'])) {
  $password_old = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['password_old']));

  // GET USER INFO
  $query = "SELECT password FROM cmdeel_users WHERE username='$session_username'";
  $result = mysqli_query($dbc,$query) or die ("Fout! Query is mislukt");

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $password_old_hashed = $row['password'];

    // CHECK IF OLD PASSWORD IS CORRECT
    if (password_verify($password_old, $password_old_hashed)) {
      $password_new = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['password_new']));
      $password_new_hashed = password_hash($password_new, PASSWORD_DEFAULT, ['cost' => 12]);
      
      // INSERT INTO DATABASE
      $query = "UPDATE cmdeel_users SET password='$password_new_hashed' WHERE username='$session_username'";
      $result = mysqli_query($dbc,$query) or die ('<div class="alert alert-error">Daar ging iets fout tijdens het activeren..</div>');

      $_SESSION['alert'] = '<div class="alert alert-succes">Het wachtwoord is succesvol gewijzigd!</div>';
      header("Location: account-password");
      exit();
    } else {
      // IF PASSWORD IS INCORRECT
      $_SESSION['alert'] = '<div class="alert alert-error">Het oude wachtwoord is incorrect.. Probeer een andere.</div>';
      header("Location: account-password");
      exit();
    }
  }
} else if (isset($_POST['edit_submit'])) {
  $name = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['edit_name']));
  $mail = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['edit_mail']));
  $bio = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['edit_bio']));

  // INSERT INTO DATABASE
  $query = "UPDATE cmdeel_users SET name='$name', mail='$mail', description='$bio' WHERE username='$session_username'";
  $result = mysqli_query($dbc,$query) or die ('<div class="alert alert-error">Daar ging iets fout tijdens het activeren..</div>');

  $_SESSION['alert'] = '<div class="alert alert-succes">Je accountgegevens zijn succesvol gewijzigd!</div>';
  header("Location: account-edit");
  exit();



} else {
  header("Location: overview");
  exit();
}


?>