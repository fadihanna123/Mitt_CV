<?php
	
	// Starta session
	session_start(); 
	$title = "Kontakta oss";
	// Importera sidhuvud
	require "includes/header.php"; 
	require "includes/config.php"; 

?>
<!-- Definera mittsdelen -->
<div class="contactmain">
	<!-- Definera centerdelen -->
	<div class="center" style="border: none;">
		<!-- Definera kontaktformulär -->
			<h3>Kontakta oss</h3>
			<p>Du kan kontakta oss genom det här formuläret.</p>
				
			<form action="contact.php" method="post">
				<div class="row">
					<div class="labelcol">
						<label for="fullname" class="bold">Fullständigt namn: </label>
					</div>	
					<div class="col">
						<input placeholder="Fullname" type="text" id="fullname" name="fullname" autocomplete="off" required />
					</div>
				</div>

				<div class="row">
					<div class="labelcol">
						<label for="epost" class="bold">E-postadress: </label>
					</div>
					<div class="col">
						<input placeholder="Email" type="email" name="epost" id="epost" autocomplete="off" required />
					</div>
				</div>

				<div class="row">
					<div class="labelcol">
						<label for="msg" class="bold"> Meddelande: </label>
					</div>
					<div class="col">
						<textarea id="msg" cols="21" name="msg" rows="5" required></textarea>
					</div>
				</div>

						<input type="submit" class="contactbtn" name="contactbtn" value="Skicka" />
				</form>
			<?php 

					if (isset($_POST['contactbtn'])) {
						// Om man tryckte på skicka knappen
						if (
							isset($_POST['fullname']) &&
							isset($_POST['epost']) &&
							isset($_POST['msg'])
						) {
							// Om det finns värde i dessa textfält: fullständigt namn, e-postadress och meddelande.
							// Anropa kontaktsfunktionen
							$anrop->Contact($_POST['fullname'], $_POST['epost'], $_POST['msg']);
							// Visa bekräftelsesmeddelande
							echo "<div class='green'>Meddelande har skickats</div>";
						}
						// Slut om det finns värde i dessa textfält: fullständigt namn, e-postadress och meddelande.
						else {
							// Om det inte finns värde i dessa textfält: fullständigt namn, e-postadress och meddelande.
							echo "<br /><span class='error'>Du behöver fylla in alla nödvändiga fält.</span><br />";
						} // Slut det inte finns värde i dessa textfält: fullständigt namn, e-postadress och meddelande.
					}
					// Slut om man tryckte på skicka knappen

			?>
	</div>
	
</div>

<hr />
<!-- Definera sidfoten och inkludera den -->
<?php require "includes/footer.php"; ?>
