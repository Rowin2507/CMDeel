<?php

// CONFIGURATION
include '../assets/includes/config.php';

// CHECK IF FORM IS SUBMITTED
if (isset($_POST['comment_text'])) {
    $comment_shot_id = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['shot_id']));
    $comment_text = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['comment_text']));

    // // GET CURRENT DATE + TIME
    $date_day = date("j");
    $date_month = date("n");
    $date_year = date("Y");
    $date = $date_day . '-' . $date_month . '-' . $date_year;
    $time = date("H:i");
    $comment_date = $date . ',' . $time;

    // INSERT COMMENT INTO DATABASE
    $query = "INSERT INTO cmdeel_comments VALUES(0, '$comment_shot_id', '$session_user_id', '$comment_text', '$comment_date', '0', '')";
    $result = mysqli_query($dbc, $query) or die('<div class="alert alert-error">Oops, daar ging iets niet helemaal goed tijdens het registreren.</div>');

} else {
    header("Location: ../overview");
    exit();
}


?>