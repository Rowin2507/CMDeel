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
    
    header("Location: overview");
  } 


?>