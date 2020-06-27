<?php

// CHECK IF LOGGED IN
if(!isset($_SESSION['username'])) {
  header("Location: overview");
  exit();
}

?>

<section class="account-page-title">
    <h2>Account overzicht</h2>
    <h3><?php echo $session_full_name; ?></h3>
</section>
<section class="account-page-content">
    <aside>
        <nav>
            <ul>
                <li>
                    <a href="account" class="account-link active">Account overzicht</a>
                </li>
                <li>
                    <a href="account-edit" class="account-link">Account bewerken</a>
                </li>
                <li>
                    <a href="account-password" class="account-link">Wachtwoord wijzigen</a>
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
        <h3>Algemeen</h3>
        <p>Een overzicht van je algemene gegevens.</p>
        <div class="account-overview">
            <ul>
                <li>Naam</li>
                <li>Gebruikersnaam</li>
                <li>E-mail</li>
                <li>Thema</li>
                <li>Registratiedatum</li>
            </ul>
            <ul>
                <?php
                $getAccountDetails = "SELECT * FROM cmdeel_users WHERE username='$session_username'";
                $resultAccountDetails = mysqli_query($dbc, $getAccountDetails) or die ('Hmm, hier gaat iets niet helemaal goed...');

                while($row = mysqli_fetch_array($resultAccountDetails)) {
                    $account_name = $row['name'];
                    $account_mail = $row['mail'];
                    $account_appearance = $row['appearance'];
                    $account_date = $row['creation_date'];

                    if ($account_appearance == "light") {
                        $account_theme = "Licht";
                    } else {
                        $account_theme = "Donker";
                    }

                    echo '
                        <li>' . $account_name . '</li>
                        <li>' . $session_username . '</li>
                        <li>' . $account_mail . '</li>
                        <li>' . $account_theme . '</li>
                        <li>' . $account_date . '</li>
                    ';
                }?>
            </ul>
        </div>
        <hr/>
        <a href="account-edit" class="button button-secondary">Account bewerken</a>
    </div>
</section>

