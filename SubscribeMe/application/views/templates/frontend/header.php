<html>
<head>
	<title><?php echo $title ?> - SubscibeMe</title>

	<!-- stylesheets -->
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/css/menu.css" />
</head>
<body>
	<div id="container"><!-- Start Container -->
		<div id="header"><!-- Start Header -->
			<div id="menubar">
				<div id="menu"><!-- Start Menu -->
					<?php echo $menu ?><!-- Here we load the menu from the /libraries/menu.php -->
				</div><!-- End Menu -->
			</div>
			<div id="searchbar">
				<div id="search"><!-- Start Search -->
					<p>&nbsp;&nbsp;Zoeken..</p><!-- Temporary until we have a working search bar -->
				</div><!-- End Search -->
			</div>
		</div><!-- End Header -->
		<div id="content"><!-- Start Content -->