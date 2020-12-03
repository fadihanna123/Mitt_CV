<?php

    // Starta session
    session_start();
    $title = "Startsida";
    // Importera sidhuvud
    require "includes/header.php";
    // Importera klassen Admin och anropa den
    require "includes/config.php";

?>
<!-- Definera mittsdelen -->
<div class="main">
	<!-- Definera vänsterdelen -->
	<div class="left">
		<h1>Presentation</h1>
		<a href="change.php?tabell=cv_pres">Redigera delen</a>
		
			<div id='here1'>
			<!-- Visa presentationsdata -->
			<script>show('cv_pres');</script> <br />
			</div>
			
			
		
	</div>
	<!-- Definera centerdelen -->
	<div class="center">
		<h1>Mina studier</h1>
			
		
			<div id='here2'>
			<!-- Visa studiesdata -->
			<script>show('cv_studie');</script> <br />
			</div>
			 
			<br /><br />
			
		

	</div>
	<!-- Definera högerdelen -->
	<div class="right">
		<h1>Mina erfarenheter</h1>
		<div id='here3'>
			<!-- Visa erfarenhetersdata -->
			<script>show('cv_work');</script> <br />
		</div>
		
			
	</div>
</div>
<div class="left2">
	<h1>Mina skapade webbplatser</h1>
	<div id='here4'>
			<!-- Visa webbsidorsdata -->
			<script>show('cv_webpages');</script> <br />
		</div>
			
	
</div>

<hr />
<!-- Definera sidfoten och inkludera den -->
<?php

    require "includes/footer.php";

?>
