<?php $title = "Kontakta oss"; ?>
<!-- Importera sidhuvud -->
<?php require "includes/header.php"; ?>
<?php
require "includes/config.php"; // Importera klassen Admin och anropa den
require "includes/classes/admin.class.php";
$anrop = new Admin();
?>
<!-- Definera mittsdelen -->
<div class="main">
	<!-- Definera centerdelen -->
	<div class="center" style="border: none; margin-left: 33%;">
		<!-- Definera kontaktformulär -->
		<div class="myfrm">
		<h3>Kontakta oss</h3>
		<p>Du kan kontakta oss genom det här formuläret.</p>
			
		<form action="contact.php" method="post">
			<table>
				<tr>
					<td><label for="fullname"><span class="bold">Fullständigt namn: </span></label></td>
					<td><input placeholder="Fullname" type="text" id="fullname" name="fullname" autocomplete="off" required /></td>
				</tr>
				<tr>
					<td><label for="epost"><span class="bold">E-postadress: </span> </label></td>
					<td><input placeholder="Email" type="email" name="epost" id="epost" autocomplete="off" required /></td>
				</tr>
				<tr>
					<td><label for="msg"> <span class="bold">Meddelande: </span></label></td>
					<td><textarea id="msg" cols="21" name="msg" rows="5" required></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="contactbtn" value="Skicka" /></td>
				</tr>
			</table>
			</form>
			</div>
			<?php if (isset($_POST['contactbtn'])) {
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
           echo "<span class='green'>Meddelande har skickats</span>";
       }
       // Slut om det finns värde i dessa textfält: fullständigt namn, e-postadress och meddelande.
       else {
           // Om det inte finns värde i dessa textfält: fullständigt namn, e-postadress och meddelande.
           echo "<br /><span class='error' style='color: red;
	margin-left: 50%;'>Du behöver fylla in alla nödvändiga fält.</span><br />";
       } // Slut det inte finns värde i dessa textfält: fullständigt namn, e-postadress och meddelande.
   }
// Slut om man tryckte på skicka knappen
?>
	</div>
	
</div>

<hr />
<!-- Definera sidfoten och inkludera den -->
<?php require "includes/footer.php"; ?>
