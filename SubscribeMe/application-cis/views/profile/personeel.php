<h1><?php echo $title ?></h1>
<table>
	<tr>
		<td><b>Gebruikersnaam: </td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo $username ?></td>
	</tr>
	<tr>
		<td><b>Naam: </td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo $name ?></td>
	</tr>
	<tr>
		<td><b>E-mail: </td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td><?php echo $email ?></td>
	</tr>
</table>
<ul>
	<li><a href="<?php echo base_url()?>inschrijvingen">Inschrijvingen</a></li>
	<li><a href="<?php echo base_url()?>uitloggen">Uitloggen</a></li>
</ul>