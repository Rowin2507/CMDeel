<?php

// CONFIGURATION
include '../assets/includes/config.php';

// CHECK IF FORM IS SUBMITTED
if (isset($_POST['upload_submit'])) {
    $title = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['upload_title']));
    $category = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['upload_category']));
    $tags = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['upload_tags']));
    $description = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['upload_description']));

    // OTHER STUDENTS INVOLVED - TOGGLE
    if (isset($_POST['upload_students']) && $_POST['upload_students'] == 'yes') {
        $students = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['upload_other_students']));
    } else {
        $students = '';
    }

    // CHANGE FILE NAME
    // https://stackoverflow.com/questions/18705639/how-to-rename-uploaded-file-before-saving-it-into-a-directory
    $temp_file_name = explode(".", $_FILES["upload_file"]["name"]);
    $file_name = round(microtime(true)) . '.' . end($temp_file_name);
    $new_file_name = $session_username . '_' . $file_name;

    // GET USER ID
    $username_query = "SELECT user_id FROM cmdeel_users WHERE username='$session_username'";
    $username_result = mysqli_query($dbc, $username_query) or die ('Hmm, hier gaat iets niet helemaal goed...');
    while($username_row = mysqli_fetch_array($username_result)) {
        $user_id = $username_row['user_id'];
    }

    // GET CURRENT DATE
    $date_day = date("j");
    $date_month = date("n");
    $date_year = date("Y");
    if ($date_month == '1') {
        $date_month = 'januari';
    } else if ($date_month == '2') {
        $date_month = 'februari';
    } else if ($date_month == '3') {
        $date_month = 'maart';
    } else if ($date_month == '4') {
        $date_month = 'april';
    } else if ($date_month == '5') {
        $date_month = 'mei';
    } else if ($date_month == '6') {
        $date_month = 'juni';
    } else if ($date_month == '7') {
        $date_month = 'juli';
    } else if ($date_month == '8') {
        $date_month = 'augustus';
    } else if ($date_month == '9') {
        $date_month = 'september';
    } else if ($date_month == '10') {
        $date_month = 'oktober';
    } else if ($date_month == '11') {
        $date_month = 'november';
    } else if ($date_month == '12') {
        $date_month = 'december';
    }
    $date = $date_day . ' ' . $date_month . ' ' . $date_year;
    
    // UPLOAD FILE AND ADD TO DATABASE
    if (!empty($title)) {
        if (move_uploaded_file($_FILES["upload_file"]["tmp_name"], "../assets/user-uploads/user-content/" . $new_file_name)) {
            $query = "INSERT INTO cmdeel_uploads VALUES(0, '$user_id', '$date', 'image', '$new_file_name', '$title', '$category', '$tags', '$description', '$students', '0', '')";
            $result = mysqli_query($dbc, $query) or die("Er iets fout gegaan!");

            $_SESSION['alert'] = '<div class="alert alert-succes">En toen was daar.. een geslaagde upload!</div>';
            header("Location: overview");
            exit();
        } else {
            $_SESSION['alert'] = '<div class="alert alert-error">Zo te zien ging het uploaden niet helemaal goed..</div>';
            header("Location: upload");
        }
    }
} else {
    header("Location: overview");
    exit();
}








// $fileName = $_FILES["upload_file"]["name"]; // The file name
// $fileTmpLoc = $_FILES["upload_file"]["tmp_name"]; // File in the PHP tmp folder
// $fileType = $_FILES["upload_file"]["type"]; // The type of file it is
// $fileSize = $_FILES["upload_file"]["size"]; // File size in bytes
// $fileErrorMsg = $_FILES["upload_file"]["error"]; // 0 for false... and 1 for true
// if (!$fileTmpLoc) { // if file not chosen
//     echo "ERROR: Please browse for a file before clicking the upload button.";
//     exit();
// }
// if(move_uploaded_file($fileTmpLoc, "../test/$fileName-test")){
//     echo "$fileName upload is complete";
// } else {
//     echo "move_uploaded_file function failed";
// }


?>