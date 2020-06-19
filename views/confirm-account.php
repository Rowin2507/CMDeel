<?php

// CONFIGURATION
include '../assets/includes/config.php';

// HEAD
$page_title = 'Account bevestigen - CMDeel';
include 'head.php';

// CHECK IF LOGGED IN
if(isset($_SESSION['username'])) {
  header("Location: overview");
  exit();
}

// USER INFO
$mail = $_GET["mail"];
$hashcode = $_GET["hashcode"];

// GET USER INFO
$query = "SELECT * FROM cmdeel_users WHERE mail='$mail' AND hashcode='$hashcode'";
$result = mysqli_query($dbc,$query) or die ("Fout! Query is mislukt");

if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_array($result);

  // GET FIRST VALUE OF STRING - https://stackoverflow.com/questions/2476789/how-to-get-the-first-word-of-a-sentence-in-php
  $name = $row['name'];
  $first_name_explode = explode(' ',trim($name));
  $first_name = $first_name_explode[0];


  // CHECK IF FORM IS SUBMITTED
  if (isset($_POST['confirm_submit'])) {
    // HASH PASSWORD
    $password = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['confirm_password'])); 
    $password_hashed = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

    // SET APPEARANCE TOGGLE
    if (isset($_POST['confirm_appearance']) && $_POST['confirm_appearance'] == 'darkmode') {
      $appearance = 'dark';
      echo "<script>document.querySelector('body').classList.add('darkmode');</script>";
      $notification_gif = 'assets/site-content/branding/cmd-sunglasses_white.gif';
    } else {
      $appearance = 'light';
      $notification_gif = 'assets/site-content/branding/cmd-sunglasses.gif';
    }

    // INSERT INTO DATABASE
    $query = "UPDATE cmdeel_users SET status='activated', password='$password_hashed', appearance='$appearance', hashcode='' WHERE mail='$mail' AND hashcode='$hashcode'";
    $result = mysqli_query($dbc,$query) or die ('<div class="alert alert-error">Daar ging iets fout tijdens het activeren..</div>');
    echo '
      <div class="notification">
        <div class="notification-content">
          <h2>Bedankt ' . $first_name . '!</h2>
          <img src="' . $notification_gif . '" alt="CMDeel icon - sunglasses" />
          <p class="completed-text">Je inschrijving is volledig afgerond.</p>
          <p><a href="overview" class="button button-primary">Naar de beginpagina</a></p>
        </div>
      </div>
      <script src="assets/scripts/main.js"></script>';
    exit();
  } 

}else {
  echo'<div class="alert alert-error">Er is een fout opgetreden tijdens het voltooien van je inschrijving.</div>';
}
?>

<main class="confirm-page">
  <div class="alt-header-logo">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 680.68 154.65">
      <defs>
        <style>
          .cmd-clr1 {fill: #fff021;}
          .cmd-clr2 {fill: #fce724;}
          .cmd-clr3 {fill: #000;}
        </style>
      </defs>
      <g>
        <path class="cmd-clr3" d="M56.81,36.42q-14.51,0-22.44,10.89T26.42,77.66q0,40.49,30.39,40.49,12.75,0,30.88-6.38V133.3a85.75,85.75,0,0,1-33.29,6.21q-26.41,0-40.41-16t-14-46Q0,58.61,6.87,44.41A49.67,49.67,0,0,1,26.62,22.63q12.89-7.58,30.19-7.58,17.63,0,35.44,8.53L84,44.45A137.19,137.19,0,0,0,70.3,38.82,40.76,40.76,0,0,0,56.81,36.42Z"/>
        <path class="cmd-clr3" d="M164.7,137.86l-29.14-95h-.75q1.58,29,1.57,38.67v56.31H113.45V16.79h34.94L177,109.37h.5l30.39-92.58h34.94V137.86H218.94V80.55q0-4,.13-9.35T220.19,43h-.75l-31.22,94.82Z"/>
        <path class="cmd-clr1" d="M314.68,37.83H301v78.83h11q37.1,0,37.1-39.83Q349.13,37.83,314.68,37.83Z"/>
        <path class="cmd-clr2" d="M314.68,40.83c10.53,0,18.47,2.93,23.59,8.73s7.86,15.08,7.86,27.27c0,12.43-2.85,21.79-8.47,27.83s-14.19,9-25.63,9h-8V40.83h10.66m0-3H301v78.83h11q37.1,0,37.1-39.83,0-39-34.45-39Z"/>
        <path class="cmd-clr1" d="M665.68,0H273.54a15,15,0,0,0-15,15V139.65a15,15,0,0,0,15,15H665.68a15,15,0,0,0,15-15V15A15,15,0,0,0,665.68,0ZM358.78,122q-17,15.9-49.15,15.9H275.35V16.79h38q29.64,0,46,15.65t16.39,43.73Q375.79,106.05,358.78,122ZM467.61,37.83H423.55V64.41h41v21h-41v31.22h44.06v21.2H397.88V16.79h69.73Zm95,0H518.53V64.41h41v21h-41v31.22h44.06v21.2H492.86V16.79h69.73Zm100,100H587.84V16.79h25.67v99.87h49.11Z"/>
        <path class="cmd-clr2" d="M665.68,3a12,12,0,0,1,12,12V139.65a12,12,0,0,1-12,12H273.54a12,12,0,0,1-12-12V15a12,12,0,0,1,12-12H665.68M584.84,140.86h80.78v-27.2H616.51V13.79H584.84V140.86m-95,0h75.73v-27.2H521.53V88.44h41v-27h-41V40.83h44.06v-27H489.86V140.86m-95,0h75.73v-27.2H426.55V88.44h41v-27h-41V40.83h44.06v-27H394.88V140.86m-122.53,0h37.28c22.1,0,39.33-5.62,51.19-16.71s18-27.28,18-48c0-19.48-5.83-34.92-17.32-45.9s-27.65-16.48-48.11-16.48h-41V140.86M665.68,0H273.54a15,15,0,0,0-15,15V139.65a15,15,0,0,0,15,15H665.68a15,15,0,0,0,15-15V15a15,15,0,0,0-15-15ZM587.84,137.86V16.79h25.67v99.87h49.11v21.2Zm-95,0V16.79h69.73v21H518.53V64.41h41v21h-41v31.22h44.06v21.2Zm-95,0V16.79h69.73v21H423.55V64.41h41v21h-41v31.22h44.06v21.2Zm-122.53,0V16.79h38q29.64,0,46,15.65t16.39,43.73q0,29.88-17,45.79t-49.15,15.9Z"/>
      </g>
    </svg>
  </div>
  <section>
    <form method="post" action="">
      <div class="confirm-description">
        <h2>Laatste stap</h2>
        <h3>Hey <?php echo $first_name;?>, je bent bijna klaar!</h3>
      </div>
      <div class="confirm-content">
        <label for="password">Wachtwoord</label>
        <input id="password" type="password" name="confirm_password" autocomplete="new-password" autofocus="true" placeholder="Vertel het niemand!" required />
        <label for="password-confirm">Wachtwoord bevestigen</label>
        <input id="password-confirm" type="password" name="confirm_password_confirm" autocomplete="new-password" placeholder="Voor de zekerheid" required />
        <label class="toggle-slider confirm-darkmode">
          <input type="checkbox" name="confirm_appearance" value="darkmode">
          <span class="toggle-slider-in"></span>
        </label>
        <div class="toggle-slider-label">
          <span class="toggle-slider-name">Darkmode</span>
          <span class="toggle-slider-text">Betreed de duisternis..</span>
        </div>
        <input id="confirm-submit" type="submit" name="confirm_submit" value="Bevestigen" disabled="true" />
      </div>
    </form>
    <div class="confirm-illustration">
    <img src="./assets/site-content/images/login.svg" alt="">
    </div>
  </section>

  <div class="pattern-animation-horizontal">
    <div class="pattern-animation-horizontal-in"></div>
  </div>
</main>

<div class="footer-copyright"></div>
<script src="assets/scripts/main.js"></script>