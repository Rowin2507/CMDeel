<?php

// CONFIGURATION
include '../assets/includes/config.php';

// HEAD
$page_title = 'Registreren - CMDeel';
include 'head.php';

// CHECK IF LOGGED IN
if(isset($_SESSION['username'])) {
  header("Location: overview");
  exit();
}

?>

<main class="register-page">
  <div class="alt-header-logo">
    <a href="overview">
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
    </a>
  </div>

  <section>
    <form method="post" action="proces-register">
      <div class="register-description">
        <h2>Registreren</h2>
        <h3>Je eigen CMDeel account!</h3>
      </div>
      <div class="register-content">
        <label for="mail">E-mail</label>
        <input id="mail" type="email" name="register_mail" autocomplete="new-password" autofocus="true" placeholder="Wat is je mail?" required />
        <label for="name">Naam</label>
        <input id="name" type="text" name="register_name" autocomplete="new-password" placeholder="Hoe heet je?" required />
        <label for="username">Gebruikersnaam</label>
        <input id="username" type="text" name="register_username" autocomplete="new-password" placeholder="Je gebruikersnaam is?" required />
        <input type="submit" name="register_submit" value="Registreren" />
      </div>
      <div class="register-login">
        <span>Heb je al een account?</span>
        <a href="login">Inloggen</a>
      </div>
    </form>
    <div class="register-illustration">
    <img src="./assets/site-content/images/register.svg" alt="">
    </div>
  </section>

  <div class="pattern-animation-horizontal">
    <div class="pattern-animation-horizontal-in"></div>
  </div>
</main>

<div class="footer-copyright"></div>
<script src="assets/scripts/main.js"></script>