<!DOCTYPE html>
<html lang="sv">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0" />
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>	
	<script src="./js/functions.prod.js"></script>
    <link rel="stylesheet" href="./css/main.min.css" type="text/css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Mitt CV - <?php echo $title; ?></title>
</head>

<body>
	<div id="container">
		<!-- Definera sidhuvud -->
		<div class="header">
				<!-- Definera logobild -->
			<div class="logobox">
				<a href="./index.php">
					<!-- Lägg till logobilden -->
					<img src="./Images/Logo.jpg" alt="Logobild" id="logobild" />
				</a>
			</div>
		<!-- Definera länkmeny -->
			<div class="meny">
					<a href="index.php">Startsida</a>
					<a href="contact.php">Kontakta oss</a>
					<?php

                    if (isset($_SESSION['loginepost']) && isset($_SESSION['loginpsw'])) {
                        // Om det finns session(inloggad) visa då logga ut
                        echo "<a href='logout.php'>Logga ut</a>";
                    }
                    // Slut om det finns session(inloggad) då visa logga ut
                    else {
                        // Om det inte finns session(inloggad) visa då logga in
                        echo "<a href='login.php'>Logga in</a>";
                    }
                    // Slut om det inte finns session(inloggad) visa då logga in
                    
                    ?>
			</div>

		</div>

		