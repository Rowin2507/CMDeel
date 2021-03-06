<?php

// CONFIGURATION
include 'assets/includes/config.php';

// HEAD
$page_title = 'CMDeel';
include 'views/head.php';

// HEADER
include 'views/header.php';

// SITE-CONTENT - SWITCH
$page = isset($_GET['page']) ? $_GET['page'] : 'index';

if(isset($_SESSION['alert'])) {
  echo $_SESSION['alert'];
  unset($_SESSION["alert"]);
  echo "<script>setTimeout(function(){document.querySelector('.alert').classList.add('hidden');}, 4500);</script>";
}

switch ($page) {
  case 'index':
    include 'views/overview.php';
  break;

  case 'upload':
    include 'views/upload.php';
  break;
  case 'user':
    include 'model/user.php';
  break;
  case 'useruploads':
    include 'model/useruploads.php';
  break;
  case 'account':
    include 'views/account.php';
  break;
  case 'account-password':
    include 'views/account-password.php';
  break;
  case 'account-edit':
    include 'views/account-edit.php';
  break;
  case 'account-settings':
    include 'views/account-settings.php';
  break;
  case 'account-data':
    include 'views/account-data.php';
  break;



  // DEFAULR PAGE: 404 ERROR
  // default:
  //   include 'error.html';
  // break;
}

// FOOTER
include 'views/footer.html';

?>
