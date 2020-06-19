<!DOCTYPE html>
<html lang="nl">
  <head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#fff021">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="apple-mobile-web-app-title" content="CMDeel">
    <meta name="author" content="Rowin Schmidt">
    <meta name="description" content="Een online platform voor CMD-studenten waar ze elkaar kunnen inspireren en feedback geven." />
    <title><?php echo $page_title; ?></title>
    <link rel="shortcut icon" type="image/png" href="./assets/site-content/branding/cmdeel-icon-black_yellow.png">
    <link rel="stylesheet" href="./assets/stylesheets/main.css">
    <link rel="stylesheet" href="./assets/stylesheets/main_darkmode.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script> -->
  </head>

  <body>
  <?php
    if(isset($_SESSION['username'])) {
      $query = "SELECT appearance FROM cmdeel_users WHERE username='$session_username'";
      $result = mysqli_query($dbc, $query) or die ('Hmm, hier gaat iets niet helemaal goed...');

      // GET APPEARANCE FROM DATABASE
      while($row = mysqli_fetch_array($result)) {
        $site_appearance = $row['appearance'];
        if ($site_appearance == 'dark') {echo "<script>document.querySelector('body').classList.add('darkmode');</script>";}
      }
    }
  ?>