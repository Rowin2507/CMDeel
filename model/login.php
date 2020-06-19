<?php 

// CONFIGURATION
include '../assets/includes/config.php';

// CHECK IF FORM IS SUBMITTED
if (isset($_POST['login_submit'])) {
    $mail = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['login_mail']));
    $password = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['login_password']));

    // CHECK USER MAIL FROM DATABASE
    $query = "SELECT * FROM cmdeel_users WHERE mail='$mail'" or die('<div class="alert alert-error">Er is een fout opgetreden tijdens het communiceren met de Database!</div>');
    $result = mysqli_query($dbc,$query) or die ("Fout! Query is mislukt");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        $password_hashed = $row['password'];
        $username = $row['username'];

        // LOGIN IF PASSWORD IS CORRECT
        if (password_verify($password, $password_hashed)) {
            $_SESSION['username'] = $username;
            $session_username = $_SESSION['username'];
            header("Location: overview");
        } else {
            // IF PASSWORD IS INCORRECT
            $_SESSION['alert'] = '<div class="alert alert-error">Deze gegevens lijken niet helemaal te kloppen..</div>';
            header("Location: login");
            exit();
        }

    } else {
        // IF MAIL IS NOT IN DATABASE
        $_SESSION['alert'] = '<div class="alert alert-error">Deze gegevens lijken niet helemaal te kloppen..</div>';
        header("Location: login");
        exit();
    }

} else {
    header("Location: overview");
    exit();
}




?>


