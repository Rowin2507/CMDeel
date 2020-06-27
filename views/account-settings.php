<?php

// CHECK IF LOGGED IN
if(!isset($_SESSION['username'])) {
  header("Location: overview");
  exit();
}

?>

<section class="account-page-title">
    <h2>Algemene instellingen</h2>
    <h3><?php echo $session_full_name; ?></h3>
</section>
<section class="account-page-content">
    <aside>
        <nav>
            <ul>
                <li>
                    <a href="account" class="account-link">Account overzicht</a>
                </li>
                <li>
                    <a href="account-edit" class="account-link">Account bewerken</a>
                </li>
                <li>
                    <a href="account-password" class="account-link">Wachtwoord wijzigen</a>
                </li>
                <li>
                    <a href="account-settings" class="account-link active">Algemene instellingen</a>
                </li>
                <li>
                    <a href="account-data" class="account-link">Gegevens opvragen</a>
                </li>
                <li>
                    <a href="logout" class="account-link logout">Uitloggen</a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="account-content-right">
        <h3>Weergave</h3>
        <p>Pas het uiterlijk van het platform aan.</p>
        <form class="appearance-form" action="proces-account" method="post">
            <input id="appearance-light" type="radio" value="light" name="appearance"/>
            <label for="appearance-light" id="appearance-light-label">
                <strong>Lichte weergave</strong>
                <span>Licht, modern en vooral wit..</span>
            </label>
            <input id="appearance-dark" type="radio" value="dark" name="appearance"/>
            <label for="appearance-dark" id="appearance-dark-label">
                <strong>Donkere weergave</strong>
                <span>Betreed de duisternis.. </span>
            </label>
            <hr/>
            <input class="button button-primary" type="submit" name="appearance_submit" value="Toepassen">
        </form>
    </div>
</section>






<?php 
// SET CHECKBOX CHECKED
if ($site_appearance == 'dark') {echo "<script>document.getElementById('appearance-dark').checked = true;</script>";}
else {echo "<script>document.getElementById('appearance-light').checked = true;</script>";}
?>