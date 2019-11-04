<?php
// Starta session

session_start(); 
?>
<?php $title = "Logga in"; ?>
<!-- Importera sidhuvud -->
<?php require "includes/header.php"; ?>
<?php
	// Importera klassen Admin och anropa den
	require "includes/config.php";
	require "includes/classes/admin.class.php";
	$anrop = new Admin();
?>
<!-- Definera mittsdelen -->

<div class="main">
		<!-- Definera centerdelen -->
	<div class="center" style="border: none;
	margin-left: 5%;">
		<?php 
			if(isset($_SESSION['loginepost']) && isset($_SESSION['loginepsw']))
			{ // Om det finns session(inloggad)
				header("location: index.php");
			} // Slut om det finns session(inloggad)
		?>
		<!-- Definera inloggningsformulär -->
		<div class="myfrm2" style="
		margin-left: 50%;">
		<h3>Logga in</h3>
		<p>Här kan du logga in och administrera din egen cv.</p>
		
		<form action="login.php" method="post">
			<table>
				<tr>
					<td><label for="logepost"><span class="bold">E-postadress: </span></label></td>
					<td><input placeholder="Email" type="email" id="logepost" name="logepost" autocomplete="off" required /></td>
				</tr>
				<tr>
					<td><label for="logpsw"><span class="bold">Lösenord: </span> </label></td>
					<td><input type="password" name="logpsw" id="logpsw" placeholder="Password" autocomplete="off" required /></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="loginbtn" value="Logga in" /></td>
				</tr>
			</table>
			</form>
			</div>
			<?php
				if(isset($_POST['loginbtn']))
				{ // Om man tryckte på logga in knappen
					if(isset($_POST['logepost']) && isset($_POST['logpsw']))
					{ // Om det finns värde i dessa textfält: e-postadress och lösenord.
						$anrop->login($_POST['logepost'], $_POST['logpsw']);
						

					}  // Slut om det finns värde i dessa textfält: e-postadress och lösenord.
					else
					{  // Om det inte finns värde i dessa textfält: e-postadress och lösenord.
						echo "<br /><span class='error' style='position: relative;
					left: 100px;'>Du behöver fylla in alla nödvändiga fält.</span><br />";
					} // Slut om det inte finns värde i dessa textfält: e-postadress och lösenord.
				}

			?>

	</div>
</div>

<hr />
<!-- Definera sidfoten och inkludera den -->
<?php require "includes/footer.php"; ?>