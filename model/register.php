<?php
    // CONFIGURATION
    include '../assets/includes/config.php';

    // HEAD
    $page_title = 'Registreren - CMDeel';
    include '../views/head.php';

    // CHECK IF FORM IS SUBMITTED
    if (isset($_POST['register_submit'])) {
        $mail = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['register_mail']));
        $name = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['register_name']));
        $username = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['register_username']));

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

        // HASHCODE - ACCOUNT VERIFICATION
        $random_hash = rand(1000, 9999);
        $hashcode = hash('sha512', $random_hash);

        // GET FIRST VALUE OF STRING - https://stackoverflow.com/questions/2476789/how-to-get-the-first-word-of-a-sentence-in-php
        $first_name_explode = explode(' ',trim($name));
        $first_name = $first_name_explode[0];

        // RANDOM DEFAULT PROFILE PICTURE
        $random_number = rand(1, 10);
        
        // INSERT ACCOUNT INTO DATABASE
        $query = "INSERT INTO cmdeel_users VALUES(0, '$mail', '$username', '$name', '', '$hashcode', 'created', '$date', '', '', '', '', 'default-pictures/default-profile-$random_number.png', 'light', '')";
        $result = mysqli_query($dbc, $query) or die('<div class="alert alert-error">Oops, daar ging iets niet helemaal goed tijdens het registreren.</div>');


        // CONFIRMATION MAIL
        $to = $mail;
        $subject = 'Registratie afronden - CMDeel';
        $msg = '
          <!DOCTYPE html>
          <html xmlns="http://www.w3.org/1999/xhtml" lang="nl">
          
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Registratie - CMDeel</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
          </head>
          
          <body bgcolor="#efefef" style="margin: 0; padding: 75px 0 45px 0; font-family: Open Sans, sans-serif; font-size: 16px; background-image: url(https://oege.ie.hva.nl/~schmidr1/cmdeel/assets/site-content/branding/cmd_icons_pattern-v2.jpg); background-repeat: no-repeat; background-size: cover;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width: 90%; max-width: 550px;">
              <tr>
                <td align="center" bgcolor="#fff" style="padding: 55px 0 30px 0; border-radius: 15px 15px 0px 0px;">
                  <img src="https://oege.ie.hva.nl/~schmidr1/cmdeel/assets/site-content/branding/cmdeel-logo-black_yellow.jpg" style="width:35%; min-width: 150px;" alt="CMDeel logo">
                </td>
              </tr>
              <tr>
                <td align="center" bgcolor="#fff" style="padding: 5px 55px 50px 55px; border-radius: 0px 0px 15px 15px;">
                  <h1 style="font-weight: 700; font-size: 28px; color: #000000;">Hey ' . $first_name . ',</h1>
                  <p><img src="https://oege.ie.hva.nl/~schmidr1/cmdeel/assets/site-content/branding/cmd-lamp-loop.gif" width="100" alt="CMD icoon" style="padding: 10px 0px 8px 0px;" /></p>
                  <p style="color: rgba(0, 0, 0, 0.5); font-weight: 600;">Leuk dat je een CMDeel account hebt aangemaakt!</p>
                  <p style="margin-top: 25px; line-height: 22px; color: rgba(0, 0, 0, 0.5);">
                    Je account moet alleen nog even geverifieerd worden, daarna kan je van alle functies gebruik maken.
                  </p>
                  <a href="https://oege.ie.hva.nl/~schmidr1/cmdeel/confirm-account?mail=' . $mail . '&hashcode=' . $hashcode . '" target="_blank" style="display: inline-block; margin-top: 15px; background-color: #FFF021; border: 1px solid #FCE724;font-weight: 600; cursor: pointer; padding: 15px 50px;border-radius: 3px;font-size: 18px; line-height: 28px; text-decoration: none; color: #000;">Account verifiëren</a>
                  <p style="margin-top: 35px; color: rgba(0, 0, 0, 0.5);">Werkt de bovenstaande knop niet? Kopieer dan de onderstaande link en open deze in je browser.</p>
                  <a href="https://oege.ie.hva.nl/~schmidr1/cmdeel/confirm-account?mail=' . $mail . '&hashcode=' . $hashcode . '" target="_blank" style="text-decoration: none; color: rgba(0, 0, 0, 0.25); word-break: break-word;">https://oege.ie.hva.nl/~schmidr1/cmdeel/confirm-account?mail=' . $mail . '&hashcode=' . $hashcode . '</a>
                </td>
              </tr>
              <tr>
                <td align="center" style="padding-top: 50px; display: block; color: rgba(0, 0, 0, 0.5);">
                  Copyright © 2020 <a href="https://rowinschmidt.nl/" target="_blank" style="color: #000; text-decoration: none;">Rowin Schmidt</a>
                </td>
              </tr>
            </table>
          </body>
          </html>
            ';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From:CMDeel <noreply@cmdeel.hva.nl>' . "\r\n";
        $headers .= '' . "\r\n";

        if (mail($to, $subject, $msg, $headers)) {
          echo (' 
            <div class="notification">
              <div class="notification-content">
                <h2>Verzonden!</h2>
                <img src="assets/site-content/branding/cmd-sunglasses.gif" alt="CMDeel icon - sunglasses" />
                <p>Er is een bevestigingsmail verzonden naar <strong>' . $mail . '</strong></p>
                <p>Volg daar de instructies om je accountregistratie af te ronden.</p>
                <p class="additional-info">Check ook even je spam of ongewenste mail.</p>
              </div>
            </div>');
        } else {
          echo ('<div class="alert alert-error">Er is een fout opgetreden tijdens het verzenden van de mail.</div>');
        }
        
    } else {
        header("Location: overview");
        exit();
    }

    ?>

<script src="assets/scripts/main.js"></script>