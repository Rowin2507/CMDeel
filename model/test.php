<?php

// session_start();

if(isset($_SESSION['username'])) {
  $query = "SELECT * FROM cmdeel_users WHERE username='$session_username' ORDER BY user_id DESC";
  $result = mysqli_query($dbc, $query) or die ('Hmm, hier gaat iets niet helemaal goed...');

  while($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $appearance = $row['appearance'];

    echo '<h1>Hey, ' . $name . '</h1>';
    echo '<h4>Je gekozen thema is: "' . $appearance . '" </h4></h1>';
    echo '<a href="logout">Uitloggen</a>';
  }
} else {
  echo '<a href="login">Inloggen</a>';
}






  // $get_projecten = "SELECT * FROM cmdeel_users ORDER BY user_id DESC";
  // $show_projecten = mysqli_query($dbc, $get_projecten) or die ('Hmm, hier gaat iets niet helemaal goed...');

  // while($row = mysqli_fetch_array($show_projecten)) {
  //   $id = $row['user_id'];
  //   $naam = $row['naam'];
  //   $leeftijd = $row['mail'];
  //   $land = $row['creation_date'];

  //   echo '<p>' . $id . ' ' . $naam . ' ' . $leeftijd . ' ' . $land . '</p>';
  // }




?>


<!-- 
<form method="post" action="https://oege.ie.hva.nl/~schmidr1/cmdeel/" id="upload-form">
  <input type="text" name="naam" placeholder="naam" />
  <input type="number" name="leeftijd" placeholder="leeftijd" />
  <input type="text" name="land" placeholder="land" />
  <input type="submit" name="submit" class="uploaden" value="&#xf093; Uploaden" />
</form>
 -->




<?php


  // if(isset($_POST['submit'])) {
  //   $naam = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['naam']));
  //   $leeftijd = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['leeftijd']));
  //   $land = mysqli_real_escape_string($dbc,htmlspecialchars($_POST['land']));

  //   $query = "INSERT INTO cmdeel_test VALUES(0, '$naam', '$leeftijd')";
  //   $result = mysqli_query($dbc, $query) or die("Er iets fout gegaan!");

  //   }



?>




