<br /><br />
<h1>Log in met je NHL account</h1>

<?php
echo form_open ('login/validate_credentials');
echo "<h2>Gebruikersnaam</h2>" .'<img src="/images/nhllogob.png" alt="nhllogo" class="nhllogob">';
echo form_input('username', '', 'placeholder="Gebruikersnaam" class="boxes"');
echo "<h2>Wachtwoord</h2>";
echo form_password('password', '', 'placeholder="Wachtwoord" class="boxes"') ."<br /><br />";
echo form_submit('submit', 'Inloggen >>', 'class="button"');		
echo " " .anchor('http://cpw.nhl.nl', 'Wachtwoord vergeten?');
echo form_close();
?>

<h3>Storing of vraag? Bel support 058-251 2552</h3>