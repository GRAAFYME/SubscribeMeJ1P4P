<div id="Form">
	<div id="padding">
		<br /><br />
		<?php if (isset($account_created)) { ?>
				<h3><?php echo $account_created; ?></h3>
		<?php } else { ?>
				<h1>Log in met je NHL account</h1>
		<?php } ?>

		<?php
		echo form_open ('login/validate_credentials');
		echo "<h2>Gebruikersnaam</h2>" .'<img id="logo" src="/images/nhl_logo.png" alt="Logo">';
		echo form_input('username', '', 'placeholder="Gebruikersnaam", class="boxes"');
		echo "<h2>Wachtwoord</h2>";
		echo form_password('password', '', 'placeholder="Wachtwoord" class="boxes"') ."<br /><br />";
		echo form_submit('submit', 'Inloggen >>', 'class="button"');		
		echo " " .anchor('http://cpw.nhl.nl', 'Wachtwoord vergeten?');
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" .anchor('login/signup', 'Create Acount') ."<br /><br />";
		echo form_close();
		?>
		<h3>Storing of vraag? Bel support 058-251 2552</h3>
	</div><!--End login_form-->
</div>