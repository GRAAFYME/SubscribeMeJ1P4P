<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>Uw bestand is succesvol in de database gezet</h3>
<p>U hebt : <?php echo $file?> aan de database toegevoegd</p>
<p><?php echo anchor('upload', 'Upload Another File!',array('class'=>'default_button')); ?></p>

</body>
</html>