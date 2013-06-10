<br /><br />
<?php if (isset($account_created)) { ?>
			<h1><?php echo $account_created; ?></h1>
	<?php } else { ?>
			<h1>Log in met je NHL account</h1>
	<?php } ?>
<?php
$img_url = base_url()."images/nhllogob.png";
echo form_open ('login/validate_credentials');
echo "<h2>Gebruikersnaam</h2><img src=\"$img_url\" alt=\"nhllogo\" class=\"nhllogob\">";
echo form_input('username', '', 'placeholder="Gebruikersnaam" class="boxes"');
echo "<h2>Wachtwoord</h2>";
echo form_password('password', '', 'placeholder="Wachtwoord" class="boxes"') ."<br /><br />";
echo form_submit('submit', 'Inloggen >>', 'class="button"');		
echo " " .anchor('http://cpw.nhl.nl', 'Wachtwoord vergeten?');
echo form_close();
echo validation_errors(); 
if($show_error_message == TRUE)
{
	echo $error_message;
}
?>
<h3>Storing of vraag? Bel support 058-251 2552</h3>