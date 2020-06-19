<?php

// START GLOBAL SESSION
session_start();

// PREVENT OR ALLOW ERROR REPORTING
// error_reporting(0);
// error_reporting(E_ALL | E_STRICT);

// LOCALHOST - MAMP
define('DB_HOST','localhost');
define('DB_NAME','cmdeel');
define('DB_USERNAME','root');
define('DB_PASSWORD','root');

// ONLINE - OEGE
// ... TJA :D

// SET UP DEFAULT CONNECTION QUERY
$dbc = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die ('Er is iets goed fout gegaan!');

// SANITIZE DATA (GET & POST)
$_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

// FORCE UTF-8 CHARSET (OEGE)
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
mb_http_input('UTF-8');
mb_regex_encoding('UTF-8');

// IF USER IS LOGGED IN
if(isset($_SESSION['username'])) {
    $session_username = $_SESSION['username'];

    // GET FULL NAME OF LOGGED IN USER
    $get_full_name = "SELECT user_id, name FROM cmdeel_users WHERE username='$session_username'";
    $result_full_name = mysqli_query($dbc,$get_full_name) or die ("Fout! Query is mislukt");
    while($row_user_details = mysqli_fetch_array($result_full_name)) {
        $session_user_id = $row_user_details['user_id'];
        // GET FIRST VALUE OF STRING - https://stackoverflow.com/questions/2476789/how-to-get-the-first-word-of-a-sentence-in-php
        $session_full_name = $row_user_details['name'];
        $session_first_name_explode = explode(' ',trim($session_full_name));
        $session_first_name = $session_first_name_explode[0];
    }
}


?>

