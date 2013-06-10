<h3>U staat op het punt om: <?php echo $file?> in de database toe te voegen, druk op de de button om door te gaan ! </h3>
<?php echo form_open_multipart('xml_parser');?>
<input type="submit" value="Toevoegen" onClick="return confirm ('Weet u zeker dat u dit bestand aan de database wilt toevoegen?')" />