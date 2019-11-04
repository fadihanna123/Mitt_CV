
<!DOCTYPE html>

<html lang="sv">

<head>
	<meta charset="utf-8" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="./js/functions.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css" type="text/css" />
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
		</div>
		<!-- Definera länkmeny -->
			<div class="meny">
				<a href="index.php">Startsida</a>
				<a href="contact.php">Kontakta oss</a>
				<?php
				if(isset($_SESSION['loginepost']) && isset($_SESSION['loginpsw']))
				{ // Om det finns session(inloggad) visa då logga ut
					echo "
				
					<a href='logout.php'>Logga ut</a>

					";

				} // Slut om det finns session(inloggad) då visa logga ut
				else
				{ // Om det inte finns session(inloggad) visa då logga in
					echo "<a href='login.php'>Logga in</a>";
				} // Slut om det inte finns session(inloggad) visa då logga in
				?>
			</div>
		