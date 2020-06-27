<?php

// CHECK IF LOGGED IN
if(!isset($_SESSION['username'])) {
  header("Location: overview");
  exit();
}

?>

<section class="account-page-title">
    <h2>Account bewerken</h2>
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
                    <a href="account-edit" class="account-link active">Account bewerken</a>
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
        <form class="edit-form" action="proces-account" method="post">
            <?php
                $getAccountDetails = "SELECT * FROM cmdeel_users WHERE username='$session_username'";
                $resultAccountDetails = mysqli_query($dbc, $getAccountDetails) or die ('Hmm, hier gaat iets niet helemaal goed...');

                while($row = mysqli_fetch_array($resultAccountDetails)) {
                    $account_name = $row['name'];
                    $account_mail = $row['mail'];
                    $account_bio = $row['description'];

                    echo '
                    <h3>Naam</h3>
                    <p>Wat is je volledige naam?</p>
                    <input type="text" name="edit_name" autocomplete="new-password" value="'. $account_name .'" placeholder="Hoe heet je?" required/>

                    <h3>E-mail</h3>
                    <p>Wat is je mailadres?</p>
                    <input type="email" name="edit_mail" autocomplete="new-password" value="'. $account_mail .'" placeholder="Wat is je mailadres?" required/>

                    <h3>Bio</h3>
                    <p>Vertel iets over jezelf..</p>
                    <textarea name="edit_bio" autocomplete="new-password" placeholder="Een korte beschrijving.. Niet verplicht." required>' . $account_bio . '</textarea>
                                
                    ';
                }?>
            <hr/>
            <input class="button button-primary" type="submit" name="edit_submit" value="Toepassen">
        </form>
    </div>
</section>

