<br /><br />
<h1>Maak een account</h1>
<?php
echo form_open('login/create_member');
echo form_input('first_name', '', 'placeholder="Voornaam" class="boxes"');
echo form_input('last_name', '', 'placeholder="Achternaam" class="boxes"');
echo form_input('email', '', 'placeholder="E-mail" class="boxes"');
echo form_input('username', '', 'placeholder="Gebruikersnaam" class="boxes"');
echo form_password('password', '', 'placeholder="Wachtwoord" class="boxes"');
echo form_password('password_confirm', '','placeholder="Bevestig wachtwoord" class="boxes"') ."<br /><br />";
echo form_submit('submit', 'Create Account >>', 'class="button"');
echo form_close();
echo validation_errors(); 
if($show_error_message == TRUE)
{
	echo $error_message;
}
?>
<h3>Storing of vraag? Bel support 058-251 2552</h3>