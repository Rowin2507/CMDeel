<?php

// CHECK IF LOGGED IN
if(!isset($_SESSION['username'])) {
  header("Location: overview");
  exit();
}

?>

<section class="account-page-title">
    <h2>Gegevens opvragen</h2>
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
                    <a href="account-settings" class="account-link">Algemene instellingen</a>
                </li>
                <li>
                    <a href="account-data" class="account-link active">Gegevens opvragen</a>
                </li>
                <li>
                    <a href="logout" class="account-link logout">Uitloggen</a>
                </li>
            </ul>
        </nav>
    </aside>
    <div class="account-content-right">
        <form class="edit-form" action="proces-account" method="post">
            <h3>Persoonlijke gegevens</h3>
            <p>Al je persoonlijke gegevens opvragen, die in de database zijn opgeslagen. Dit werkt vooralsnog nog niet. Later als de site écht gebruikt zou gaan worden is dit pas een verplichting volgens de AVG.</p>
            <hr/>
            <input class="button button-primary" type="submit" name="data_submit" value="Opvragen">
        </form>
    </div>
</section>

