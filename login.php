<?php

	// Starta session
	session_start(); 
	$title = "Logga in";
	// Importera sidhuvud
	require "includes/header.php";

?>
<?php

	// Importera klassen Admin och anropa den
	require "includes/config.php";

?>
<!-- Definera mittsdelen -->

<div class="loginmain">
		<!-- Definera centerdelen -->
	<div class="center" style="border: none;">
		<?php 
		
		if (isset($_SESSION['loginepost']) && isset($_SESSION['loginepsw'])) {
      // Om det finns session(inloggad)
      header("location: index.php");
  }
// Slut om det finns session(inloggad)

?>
		<!-- Definera inloggningsformulär -->
		<div class="myfrm2">
			<h3>Logga in</h3>
			<p>Här kan du logga in och administrera din egen cv.</p>
			
			<form action="login.php" method="post">
  				<div class="row">
  					<div class="labelcol">
						<label for="logepost" class="bold">E-postadress: </label>
					</div>
					<div class="col">
						<input placeholder="Email" type="email" id="logepost" name="logepost" autocomplete="off" required />
					</div>
				</div>

				<div class="row">
					<div class="labelcol">
						<label for="logpsw" class="bold">Lösenord: </label>
					</div>
					<div class="col">
						<input type="password" name="logpsw" id="logpsw" placeholder="Password" autocomplete="off" required />
					</div>
				</div>
				

						<input type="submit" class="loginbtn" name="loginbtn" value="Logga in" />
			</form>
		</div>
			<?php if (isset($_POST['loginbtn'])) {
       // Om man tryckte på logga in knappen
	if (!empty($_POST['logepost']) || !empty($_POST['logpsw'])) {
           // Om det finns värde i dessa textfält: e-postadress och lösenord.
           $anrop->login($_POST['logepost'], $_POST['logpsw']);
       }
       // Slut om det finns värde i dessa textfält: e-postadress och lösenord.
       else {
           // Om det inte finns värde i dessa textfält: e-postadress och lösenord.
           echo "<br /><span class='error' style='position: relative;
					left: 100px;'>Du behöver fylla in alla nödvändiga fält.</span><br />";
       } // Slut om det inte finns värde i dessa textfält: e-postadress och lösenord.
   } ?>

	</div>
</div>

<hr />
<!-- Definera sidfoten och inkludera den -->
<?php require "includes/footer.php"; ?>
