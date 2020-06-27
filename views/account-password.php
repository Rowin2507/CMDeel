<?php

// CHECK IF LOGGED IN
if(!isset($_SESSION['username'])) {
  header("Location: overview");
  exit();
}

?>

<section class="account-page-title">
    <h2>Wachtwoord wijzigen</h2>
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
                    <a href="account-password" class="account-link active">Wachtwoord wijzigen</a>
                </li>
                <li>
                    <a href="account-settings" class="account-link">Algemene instellingen</a>
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
        <form class="password-form" action="proces-account" method="post">
            <h3>Oude wachtwoord</h3>
            <p>Je oude wachwoord.. Weet je die nog?</p>
            <input type="password" name="password_old" autocomplete="true" autofocus="true" placeholder="Het oude wachtwoord.." required/>

            <h3>Nieuwe wachtwoord</h3>
            <p>Vertel het tegen niemand..</p>
            <input type="password" name="password_new" autocomplete="new-password" placeholder="Het nieuwe wachtwoord.." required/>

            <hr/>
            <input class="button button-primary" type="submit" name="password_submit" value="Toepassen">
        </form>
    </div>
</section>

