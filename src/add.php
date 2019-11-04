<?php
// Starta session
	session_start(); 
?>
<?php $title = "Lägg till data"; ?>
<!-- Importera sidhuvud -->
<?php require "includes/header.php"; ?>
<?php
	// Importera klassen Admin och anropa den
	require "includes/config.php";
	$anrop = new Admin();
?>
<?php
			if(!isset($_SESSION['loginepost']) && !isset($_SESSION['loginpsw']))
			{ // Om det inte finns session då visa felmeddelande om inloggning
				echo "<script>alert('Du måste vara inloggad först för att kunna redigera eller ändra något. Var vänlig och logga in.'); window.location='login.php';</script>";


			} // Slut om det inte finns session då visa felmeddelande om inloggning
?>
<!-- Definera mittsdelen -->
<div class="main">
	<!-- Definera centerdelen -->
	<div class="center" style="border: none; margin-left: 30%;">
		<!-- Lägg till rubriken lägg till data -->
		<h1 id="spech11">Lägga till data</h1>
		<p style='margin-left: 14%;'>Här kan du lägga till nya data.</p>
		<?php 
		if($_GET['tabell'] == "cv_studie")
		{ // Om det skickade tabellnamn i adressraden är cv_studie
		
			echo "<form>
		<table>
			<tr>
				<td>Lärosäte: </td>
				<td><input type='text' id='addstudiesschool' placeholder='School'/></td>
			</tr>
			<tr>
				<td>Kursnamn: </td>
				<td><input type='text' id='addcourse_name' placeholder='course name' /></td>
			</tr>

			<tr>
				<td>Starttid: </td>
				<td><input type='text' id='addStarttime_studies' placeholder='Starttime' /></td>
			</tr>
			<tr>
				<td>Sluttid: </td>
				<td><input type='text' id='addStoptime_studies' placeholder='Stoptime' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='button' id='add1' value='Lägg till data' name='add1' />

			</tr>
		</table>
		</form>";
		} // Slut om det skickade tabellnamn i adressraden är cv_studie
   


		if($_GET['tabell'] == "cv_work")
		{ // Om det skickade tabellnamn i adressraden är cv_work
			echo "<form style='margin-left: 10%;'>
		<table>
			<tr>
				<td>Arbetsställe: </td>
				<td><input type='text' id='addworkplace' placeholder='Workplace' /></td>
			</tr>
			<tr>
				<td>Jobbtitel: </td>
				<td><input type='text' id='addwork_title' placeholder='Worktitle' /></td>
			</tr>

			<tr>
				<td>Starttid: </td>
				<td><input type='text' id='addStarttime_work' placeholder='Starttime' /></td>
			</tr>
			<tr>
				<td>Sluttid: </td>
				<td><input type='text' id='addStoptime_work' placeholder='Stoptime' /></td>
			</tr>

			<tr>
				<td></td>
				<td><input type='button' id='add2' value='Lägg till data' name='add2' />

			</tr>
		</table>
		</form>";
		} // Slut om det skickade tabellnamn i adressraden är cv_studie
   
	

		if($_GET['tabell'] == "cv_webpages")
		{ // Om det skickade tabellnamn i adressraden är cv_webpages
		
			echo "<form id='specform22'>
		<table>
			<tr>
				<td>Titel: </td>
				<td><input type='text' size='70' id='addwebpage_title' placeholder='Title'  /></td>
			</tr>
			<tr>
				<td>Adress: </td>
				<td><input type='text' size='70' id='addwebpage_url' placeholder='Address' /></td>
			</tr>

			<tr>
				<td>Beskrivning: </td>
				<td><input type='text' size='70' id='addwebpage_des' placeholder='Description' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='button' id='add3' value='Lägg till data' name='add3' />

			</tr>
		</table>
		</form>";
		} // Slut om det skickade tabellnamn i adressraden är cv_studie
   
		
		?>
		<script>
			//  Koden för att lägg till studier 
			// Definera knappen lägg till studier
			let add1 = document.getElementById("add1");
			if(add1 !=null)
			{ 
				// Lägger till händelsehantering för knappen
			 add1.addEventListener("click", function(){
			// Deklarera studieformulärdata
        	let addstudiesschool = $("#addstudiesschool").val();
        	let addcourse_name = $("#addcourse_name").val();
        	let addStarttime_studies = $("#addStarttime_studies").val();
        	let addStoptime_studies = $("#addStoptime_studies").val();
        if( !(addstudiesschool != '' && addcourse_name != '' && addStarttime_studies != '' && addStoptime_studies != ''))
        	{ // Om det inte finns värde i alla studietextfält
        	// Uppdatera sidan.
        	 location.reload();
        	} // Slut om det inte finns värde i alla studietextfält

        let json =  {"studiesschool": addstudiesschool, "course_name": addcourse_name, "Starttime_studies": addStarttime_studies, "Stoptime_studies": addStoptime_studies};
        // Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
        // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("POST", "http://localhost/Projekt_data/index.php/cv_studie/", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
        // Skicka json data
        xmlhttp.send( JSON.stringify(json) );
        // När lyckas resultat skicka den till startsidan
        xmlhttp.onload = function() {

            location.href = "index.php";
        }
  })
			}



			//  Koden för att lägg till erfarenheter 
			// Definera knappen lägg till erfarenheter
			let add2 = document.getElementById("add2");
			if(add2 !=null)
			{
				// Lägger till händelsehantering för knappen
			 add2.addEventListener("click", function(){
			// Deklarera erfarenheterformulärdata
        	let addworkplace = $("#addworkplace").val();
        	let addwork_title = $("#addwork_title").val();
        	let addStarttime_work = $("#addStarttime_work").val();
        	let addStoptime_work = $("#addStoptime_work").val();
        if( !(addworkplace != '' && addwork_title != '' && addStarttime_work != '' && addStoptime_work != ''))
        	{ // Om det inte finns värde i alla erfarenhetersfält
        	// Uppdatera sidan.
        	 location.reload();
        	} // Slut om det inte finns värde i alla erfarenhetersfält

        let json =  {"workplace": addworkplace, "work_title": addwork_title, "Starttime_work": addStarttime_work, "Stoptime_work": addStoptime_work};
        // Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
        // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("POST", "http://localhost/Projekt_data/index.php/cv_work/", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
         // Skicka json data
        xmlhttp.send( JSON.stringify(json) );
 		// När lyckas resultat skicka den till startsidan
        xmlhttp.onload = function() {
            location.href = "index.php";
        }
  })
}

		
		//  Koden för att lägg till webbssidor 
		// Definera knappen lägg till webbssidor
		let add3 = document.getElementById("add3");
			if(add3 !=null)
			{
				// Lägger till händelsehantering för knappen
			 add3.addEventListener("click", function(){
			 	// Deklarera webbsidaformulärsdata
			let addwebpage_title = $("#addwebpage_title").val();
        	let addwebpage_url = $("#addwebpage_url").val();
        	let addwebpage_des = $("#addwebpage_des").val();
        if( !(addwebpage_title != '' && addwebpage_url != '' && addwebpage_des != ''))
        	{ // Om det inte finns värde i alla webbsidaformulärdata
        	// Uppdatera sidan.
        	 location.reload();
        	} // Slut om det inte finns värde i alla webbsidaformulärdata

        let json =  {"webpage_title": addwebpage_title, "webpage_url": addwebpage_url, "webpage_des": addwebpage_des};
         // Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
          // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("POST", "http://localhost/Projekt_data/index.php/cv_webpages/", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
        // Skicka json data
        xmlhttp.send( JSON.stringify(json) );
        // När lyckas resultat skicka den till startsidan
        xmlhttp.onload = function() {
            location.href = "index.php";
        }
  })
			}
		</script>
	</div>
</div>
	<!-- Definera sidfoten och inkludera den -->
	<?php require "includes/footer.php"; ?>