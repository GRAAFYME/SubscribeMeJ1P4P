<html>
<head>
	<title><?php echo $title ?> - SubscibeMe</title>

	<!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/menu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/crud.css" /> 

    <!-- favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="container"><!-- Start Container -->
		<div id="header"><!-- Start Header -->
				<img src="<?php echo base_url()?>images/submelogo.png" alt="submelogo" class="imgLeft" />
				<img src="<?php echo base_url()?>images/nhllogow.png" alt="nhllogo" class="imgRight"/>		
				<div id="menu">						
					<?php echo $menu ?>		
				</div>					
		</div><!-- End Header -->
		<div id="content"><!-- Start Content -->