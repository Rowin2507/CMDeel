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
      <svg version="1.1" id="Laag_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 645.6 461.2" style="enable-background:new 0 0 645.6 461.2;" xml:space="preserve">
      <style type="text/css">
        .st0{fill:url(#SVGID_1_);}
        .st1{fill:#FFF021;}
        .hair{fill:#F55F44;}
        .skin{fill:#FDA57D;}
        .st4{opacity:5.000000e-02;enable-background:new    ;}
        .st5{opacity:0.7;}
        .st6{fill:url(#SVGID_2_);}
        .st7{opacity:0.1;enable-background:new    ;}
        .st8{fill:#E0E0E0;}
        .st9{fill:url(#SVGID_3_);}
        .st10{fill:#535461;}
        .st11{fill:#FFFFFF;}
        .st12{fill:#EEEEEE;}
        .st13{fill:#3F3D56;}
      </style>
      <g>
        <g id="e96d43fc-c2ba-4d44-92c2-c0adf9da4e64">
          
            <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="491.815" y1="1985.86" x2="491.815" y2="1612.5553" gradientTransform="matrix(1 0 0 1 -168.58 -1612.55)">
            <stop  offset="0" style="stop-color:#808080;stop-opacity:0.25"/>
            <stop  offset="0.54" style="stop-color:#808080;stop-opacity:0.12"/>
            <stop  offset="1" style="stop-color:#808080;stop-opacity:0.1"/>
          </linearGradient>
          <path class="st0" d="M423.9,283.7c-6.7-24.3-43.9-42.2-72.9-46.9v-11.7l1.6-0.6c-0.1-2.3-0.6-4.6-1.4-6.9
            c12.4-5,23.1-13.5,30.9-24.4c30.3-31.7,29.1-81.9-2.6-112.2c-4-3.8-8.4-7.2-13.1-10.1c7.3-4.6,9.5-14.2,4.9-21.5
            c-2.6-4.1-7-6.8-11.9-7.2C366,26.8,358.7,9,343.3,2.4c-10.4-4.4-22.4-2.7-31.2,4.5c14.8-7.9,33.2-2.3,41.1,12.5
            c2.4,4.4,3.6,9.3,3.6,14.3c0,0.3,0,0.5,0,0.8c-0.5-16.8-14.5-30-31.3-29.5c-16.8,0.5-30,14.5-29.5,31.3c0.1,3.3,0.7,6.5,1.8,9.5
            c-8.2,1.8-13.4,9.8-11.6,18c0.3,1.5,0.9,2.9,1.6,4.2c-38.8,20.4-53.7,68.4-33.4,107.2c3.7,7,8.4,13.4,14,19.1
            c7.4,9.9,17.3,17.8,28.6,22.7v19.5c-29.3,4.2-67.9,22.4-74.7,47.4c-5.9,21.7-12.2,45.5-15.3,59.5c26.8,18.8,82.9,29.9,118.2,29.9
            c33.5,0,88.1-10,114.1-27.1C436.5,330.8,430.1,306,423.9,283.7z M370.3,59.1c0,0.3,0,0.5,0,0.8c-0.4-7.1-5.7-12.9-12.6-14.1
            c0.3-0.5,0.6-1,0.8-1.5C365.4,45.9,370.3,52,370.3,59.1z"/>
          <path class="st1" d="M325.2,368c32.5,0,85.6-9.7,110.9-26.3c-2.7-14.9-9-39.1-15-60.8c-7.6-27.6-55.5-46.7-84.1-46.7h-27.5
            c-28.7,0-76.7,19.2-84.2,46.9c-5.7,21.1-11.8,44.2-14.8,57.9C236.4,357.3,291,368,325.2,368z"/>
          <circle class="hair" cx="324.7" cy="139.8" r="77.1"/>
          <path class="skin" d="M303.9,193.4h40.3c3.3,0,6,2.7,6,6l0,0v41.2c0,13.7-11.1,24.8-24.8,24.8l0,0h-2.9
            c-13.7,0-24.8-11.1-24.8-24.8l0,0v-41.2C297.8,196.1,300.5,193.4,303.9,193.4L303.9,193.4z"/>
          <path class="st4" d="M326.5,228.3c8.7,0,17.3-1.6,25.3-4.9c-0.9-13.2-11.8-23.5-25-23.5h-2.2c-13,0-23.8,9.9-25,22.9
            C308.1,226.5,317.2,228.3,326.5,228.3z"/>
          <circle class="skin" cx="324.8" cy="153.6" r="68.2"/>
          <circle class="hair" cx="301.7" cy="64.4" r="14.8"/>
          <circle class="hair" cx="354.2" cy="64.4" r="14.8"/>
          <circle class="hair" cx="326.3" cy="39.8" r="29.5"/>
          <path class="hair" d="M357.5,46.3c-2.9,0-5.8,0.9-8.2,2.5c7.7-2.8,16.1,1.2,18.9,8.8c2.3,6.4,0,13.6-5.7,17.4
            c7.7-2.7,11.7-11.2,8.9-18.9C369.3,50.3,363.7,46.3,357.5,46.3L357.5,46.3z"/>
          <path class="hair" d="M331.2,5.3c-6.9,0-13.5,2.4-18.8,6.7c14.4-7.7,32.3-2.2,39.9,12.2c6.6,12.4,3.6,27.8-7.3,36.7
            c14.4-7.6,19.9-25.5,12.2-39.9C352.2,11.3,342.2,5.3,331.2,5.3z"/>
          <path class="hair" d="M275.5,92.2c0,0,8.2,54.1,111.5,24.6l-50.9-44.3L275.5,92.2z"/>
          <g class="st5">
            
              <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="743.7484" y1="2045.55" x2="743.7484" y2="1984.55" gradientTransform="matrix(1 0 0 1 -168.58 -1612.55)">
              <stop  offset="0" style="stop-color:#808080;stop-opacity:0.25"/>
              <stop  offset="0.54" style="stop-color:#808080;stop-opacity:0.12"/>
              <stop  offset="1" style="stop-color:#808080;stop-opacity:0.1"/>
            </linearGradient>
            <path class="st6" d="M595.1,382.9V372h-54.5v50.4c0,5.9,4.8,10.6,10.6,10.6h33.2c5.9,0,10.6-4.8,10.6-10.6v-11.1
              c7.8,0.2,14.3-6,14.5-13.8c0.2-7.8-6-14.3-13.8-14.5C595.6,382.9,595.4,382.9,595.1,382.9z M595.1,405.8v-17.4
              c4.8-0.2,8.8,3.6,9,8.4c0.2,4.8-3.6,8.8-8.4,9C595.5,405.8,595.3,405.8,595.1,405.8L595.1,405.8z"/>
          </g>
          <path class="st1" d="M593.4,384.6c-7.1,0-12.9,5.8-12.9,12.9s5.8,12.9,12.9,12.9c7.1,0,12.9-5.8,12.9-12.9l0,0
            C606.3,390.4,600.5,384.6,593.4,384.6z M593.4,405.5c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8l0,0
            C601.4,401.9,597.8,405.5,593.4,405.5L593.4,405.5z"/>
          <path class="st7" d="M593.4,384.6c-7.1,0-12.9,5.8-12.9,12.9s5.8,12.9,12.9,12.9c7.1,0,12.9-5.8,12.9-12.9l0,0
            C606.3,390.4,600.5,384.6,593.4,384.6z M593.4,405.5c-4.4,0-8-3.6-8-8s3.6-8,8-8s8,3.6,8,8l0,0
            C601.4,401.9,597.8,405.5,593.4,405.5L593.4,405.5z"/>
          <path class="st1" d="M543.6,374.7h49.7v46c0,5.4-4.4,9.8-9.8,9.8h-30.2c-5.4,0-9.7-4.4-9.8-9.8V374.7z"/>
          <rect y="430.4" class="st8" width="645.6" height="21.9"/>
          <g class="st5">
            
              <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="322.8" y1="1879.9299" x2="322.8" y2="1721.83" gradientTransform="matrix(1 0 0 1 0 -1449.55)">
              <stop  offset="0" style="stop-color:#808080;stop-opacity:0.25"/>
              <stop  offset="0.54" style="stop-color:#808080;stop-opacity:0.12"/>
              <stop  offset="1" style="stop-color:#808080;stop-opacity:0.1"/>
            </linearGradient>
            <path class="st9" d="M200,272.3h245.6c8,0,14.5,6.5,14.5,14.5v129.1c0,8-6.5,14.5-14.5,14.5H200c-8,0-14.5-6.5-14.5-14.5V286.8
              C185.5,278.8,192,272.3,200,272.3z"/>
          </g>
          <path class="st10" d="M217.3,275.2h210.9c14.8,0,26.8,12,26.8,26.8v101.5c0,14.8-12,26.8-26.8,26.8H217.3
            c-14.8,0-26.8-12-26.8-26.8V302C190.5,287.2,202.5,275.2,217.3,275.2z"/>
          <circle class="st11" cx="322.8" cy="352.8" r="9"/>
          <rect x="27.4" y="452.3" class="st8" width="590.9" height="9"/>
          <rect x="27.4" y="452.3" class="st7" width="590.9" height="3"/>
          <path class="st7" d="M584.4,374.7v46c0,5.4-4.3,9.7-9.7,9.7l0,0h5c5.4,0,9.7-4.3,9.7-9.7v0v-46H584.4z"/>
          <path class="st12" d="M553.5,337.6c-0.9,0-1.7,0.4-2.2,1.1c-0.7,1.2,0.5,2.5,1.6,3.3c2,1.5,4.1,3,5.5,5.1s1.8,5,0.3,7
            c-1.9,2.6-6.5,3.2-7,6.4c-0.3,2.1,1.5,3.8,3.3,4.9c4.5,2.6,10.3,3.2,13.5,7.3c1.3-2.8,4.3-4.4,7.3-5s6.1-0.6,9.1-1.1
            c1,0,1.9-0.5,2.5-1.3c0.8-1.7-1.6-3.8-0.7-5.5c0.6-1.3,2.5-1.2,3.9-1.7c2.2-0.9,3.1-3.7,2.5-6s-2.4-4.1-4.3-5.5
            c-5-4-11.1-6.3-17.2-8c-2.8-0.8-6.2-2-9.2-2.1S556.3,337.1,553.5,337.6z"/>
          <path class="st13" d="M97.7,378.1C93.2,395.3,77.4,406,77.4,406s-8.5-17.1-4-34.3c4.5-17.2,20.3-27.9,20.3-27.9
            S102.2,361,97.7,378.1z"/>
          <path class="st1" d="M90.9,374.5c-12.6,12.5-14,31.5-14,31.5s19.1-1.2,31.7-13.7c12.6-12.5,14-31.5,14-31.5S103.5,362,90.9,374.5z
            "/>
          <path class="st1" d="M57.3,401h49.4c5.4,0,9.8,4.4,9.8,9.8v9.8c0,5.4-4.4,9.8-9.8,9.8H57.3c-5.4,0-9.8-4.4-9.8-9.8v-9.8
            C47.5,405.4,51.9,401,57.3,401z"/>
        </g>
      </g>
      </svg>    
    </div>
  </section>

  <div class="pattern-animation-horizontal">
    <div class="pattern-animation-horizontal-in"></div>
  </div>
</main>

<div class="footer-copyright"></div>
<script src="assets/scripts/main.js"></script>