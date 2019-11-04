<?php 
// Starta session
session_start(); 
?>
<?php $title = "Ändra data"; ?>
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
	<div class="center" id="speccenter">
		<!-- Lägg till rubriken ändra data -->
		<h1 id="spech1">Ändra data</h1>
		<p style='margin-left: 14%;'>Här kan du ändra data.</p>

		<?php 
		if($_GET['tabell'] == "cv_pres")
		{ // Om det skickade tabellnamn i adressraden är cv_pres
		// Ansluta till databasen och importera formulärsdata från databasen
		$con = mysqli_connect('localhost', 'root', '', 'test');
		mysqli_set_charset($con, "utf8");			
		$sql = "SELECT * FROM cv_pres";
		$result = mysqli_query($con, $sql);
		$fetch = mysqli_fetch_array($result);
			echo "<form>
		<table>
			<tr>
				<td>Fullständigt namn: </td>
				<td><input type='text' id='fullname' placeholder='Fullname' value='$fetch[fullname]' /></td>
			</tr>
			<tr>
				<td>E-postadress: </td>
				<td><input type='email' id='epost' placeholder='Email' value='$fetch[epost]' /></td>
			</tr>

			<tr>
				<td>Mobilnummer: </td>
				<td><input type='text' id='mobnr' placeholder='Mobilnummer' value='$fetch[mobnr]' /></td>
			</tr>
			<tr>
				<td>Ålder: </td>
				<td><input type='text' id='age' placeholder='Age' value='$fetch[age]' /></td>
			</tr>
			<tr>
				<td>Språk: </td>
				<td><input type='text' id='lang' placeholder='Language' value='$fetch[lang]' /></td>
			</tr>
			<tr>
				<td>titel: </td>
				<td><input type='text' id='title' placeholder='Titel' value='$fetch[title]' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='hidden' id='hid' value='$fetch[id]' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='button' id='change1' value='Ändra' name='change1' /></td>
			</tr>
		</table>
		</form>";
   
		}  // Slut om det skickade tabellnamn i adressraden är cv_pres
		if($_GET['tabell'] == "cv_studie")
		{ // Om det skickade tabellnamn i adressraden är cv_studie
		// Ansluta till databasen och importera formulärsdata från databasen
		$con = mysqli_connect('localhost', 'root', '', 'test');
		mysqli_set_charset($con, "utf8");			
		$sql = "SELECT * FROM cv_studie WHERE id=" . $_GET['id'] . ";";
		$result = mysqli_query($con, $sql);
		while($fetch = mysqli_fetch_array($result))
		{
			echo "<form id='specform1'>
		<table>
			<tr>
				<td>Lärosäte: </td>
				<td><input type='text' size='40' id='studiesschool' placeholder='School' value='$fetch[studiesschool]' /></td>
			</tr>
			<tr>
				<td>Kursnamn: </td>
				<td><input type='text' size='40' id='course_name' placeholder='course name' value='$fetch[course_name]' /></td>
			</tr>

			<tr>
				<td>Starttid: </td>
				<td><input type='text' size='40' id='Starttime_studies' placeholder='Starttime' value='$fetch[Starttime_studies]' /></td>
			</tr>
			<tr>
				<td>Sluttid: </td>
				<td><input type='text' size='40' id='Stoptime_studies' placeholder='Stoptime' value='$fetch[Stoptime_studies]' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='hidden' id='hid3' value='$fetch[id]' /></td>
				<td><input type='hidden' id='raderahid1' value='cv_studie' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='button' id='change2' value='Ändra' name='change2' />
				<input type='button' id='radera' value='Radera' /></td>

			</tr>
		</table>
		</form>";
		}
   
		}  // Slut om det skickade tabellnamn i adressraden är cv_studie


		if($_GET['tabell'] == "cv_work")
		{  // Om det skickade tabellnamn i adressraden är cv_work
		// Ansluta till databasen och importera formulärsdata från databasen
		$con = mysqli_connect('localhost', 'root', '', 'test');
		mysqli_set_charset($con, "utf8");			
		$sql = "SELECT * FROM cv_work WHERE id=" . $_GET['id'] . ";";
		$result = mysqli_query($con, $sql);
		while($fetch = mysqli_fetch_array($result))
		{
			echo "<form style='margin-left: 10%;'>
		<table>
			<tr>
				<td>Arbetsställe: </td>
				<td><input type='text' id='workplace' placeholder='Workplace' value='$fetch[workplace]' /></td>
			</tr>
			<tr>
				<td>Jobbtitel: </td>
				<td><input type='text' id='work_title' placeholder='Worktitle' value='$fetch[work_title]' /></td>
			</tr>

			<tr>
				<td>Starttid: </td>
				<td><input type='text' id='Starttime_work' placeholder='Starttime' value='$fetch[Starttime_work]' /></td>
			</tr>
			<tr>
				<td>Sluttid: </td>
				<td><input type='text' id='Stoptime_work' placeholder='Stoptime' value='$fetch[Stoptime_work]' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='hidden' id='hid5' value='$fetch[id]' /></td>
				<td><input type='hidden' id='raderahid2' value='cv_work' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='button' id='change3' value='Ändra' name='change3' />
				<input type='button' id='radera2' value='Radera' /></td>

			</tr>
		</table>
		</form>";
		}
   
		} // Slut om det skickade tabellnamn i adressraden är cv_work

		if($_GET['tabell'] == "cv_webpages")
		{ // Om det skickade tabellnamn i adressraden är cv_webpages
		// Ansluta till databasen och importera formulärsdata från databasen
		$con = mysqli_connect('localhost', 'root', '', 'test');
		mysqli_set_charset($con, "utf8");			
		$sql = "SELECT * FROM cv_webpages WHERE id=" . $_GET['id'] . ";";
		$result = mysqli_query($con, $sql);
		while($fetch = mysqli_fetch_array($result))
		{
			echo "<form id='specform2'>
		<table>
			<tr>
				<td>Titel: </td>
				<td><input type='text' size='70' id='webpage_title' placeholder='Title' value='$fetch[webpage_title]' /></td>
			</tr>
			<tr>
				<td>Adress: </td>
				<td><input type='text' size='70' id='webpage_url' placeholder='Address' value='$fetch[webpage_url]' /></td>
			</tr>

			<tr>
				<td>Beskrivning: </td>
				<td><input type='text' size='70' id='webpage_des' placeholder='Description' value='$fetch[webpage_des]' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='hidden' id='hid7' value='$fetch[id]' /></td>
				<td><input type='hidden' id='raderahid3' value='cv_webpages' /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type='button' id='change4' value='Ändra' name='change4' />
				<input type='button' id='radera3' value='Radera' /></td>

			</tr>
		</table>
		</form>";
		}
   
		}   // Slut om det skickade tabellnamn i adressraden är cv_webpages   
		?>
		<!-- Här ska den visas resultat efter ändring -->
	<div id="here"></div>
	<script>
		// Koden för att ändra personliga uppgifter 
		// Definera knappen ändra personliga uppgifter 
	let change1 = document.getElementById("change1");
	if(change1 !=null)
	{
		// Lägger till händelsehantering för knappen
	change1.addEventListener("click", function(){
		// Deklarera de önskade data från formulärdata
		tabellname = document.getElementById("hid2").value;
        let fullname = document.getElementById("fullname").value; 
        let epost = document.getElementById("epost").value; 
        let mobnr = document.getElementById("mobnr").value; 
        let age = document.getElementById("age").value; 
        let title = document.getElementById("title").value; 
        let lang = document.getElementById("lang").value; 
        let id = document.getElementById("hid").value; 
        let json =  {"id": id, "fullname": fullname, "epost": epost, "mobnr": mobnr, "age": age, "lang": lang, "title": title};
        // Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
         // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_pres/1", true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
         // Skicka json data
        xmlhttp.send( JSON.stringify(json) );
         // När lyckas resultatet visa då ändringsbekräftelse.
        xmlhttp.onload = function() {
        // Omvandla json data till Javascript objekt
		 let jsonData = JSON.parse( this.responseText );
		 // Itrera dessa objektsdata
        for(let i=0; i < jsonData.length; i++){
        		// Visa ändringsbekräftelse
                  document.getElementById("here").innerHTML += "<div class='green'>Ändringar har sparats.</div>";    
        }
        }  
  })
}



	// Koden för att ändra studieuppgifter 
	// Definera knappen ändra studieuppgifter 
	let change2 = document.getElementById("change2");
	if(change2 !=null)
	{
		// Lägger till händelsehantering för knappen
	change2.addEventListener("click", function(){
			// Deklarera de önskade data från formulärdata
			let studiesschool = $("#studiesschool").val();
        	let course_name = $("#course_name").val();
        	let Starttime_studies = $("#Starttime_studies").val();
        	let Stoptime_studies = $("#Stoptime_studies").val();
        	let id2 = $("#hid3").val();
        	let json =  {"id": id2, "studiesschool": studiesschool, "course_name": course_name, "Starttime_studies": Starttime_studies, "Stoptime_studies": Stoptime_studies};
        // Starta Ajax förfrågan
        var xmlhttp = new XMLHttpRequest();
         // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_studie/" + id2, true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
         // Skicka json data
        xmlhttp.send( JSON.stringify(json) );
        // När lyckas resultatet visa då ändringsbekräftelse.
        xmlhttp.onload = function() {
        	// Omvandla json data till Javascript objekt.
		 let jsonData = JSON.parse( this.responseText );
		 // Itrera dessa objektsdata.
        for(let i=0; i < jsonData.length; i++){
        			// Visa ändringsbekräftelse.
                  document.getElementById("here").innerHTML += "<div class='green'>Ändringar har sparats.</div>";    
        }
        }  
  })

}



	// Koden för att ändra erfarenhetersuppgifter 
	// Definera knappen ändra erfarenhetersuppgifter 
	let change3 = document.getElementById("change3");
	if(change3 !=null)
	{
		// Lägger till händelsehantering för knappen
	change3.addEventListener("click", function(){
			// Deklarera de önskade data från formulärdata
			let workplace = $("#workplace").val();
        	let work_title = $("#work_title").val();
        	let Starttime_work = $("#Starttime_work").val();
        	let Stoptime_work = $("#Stoptime_work").val();
        	let id3 = $("#hid5").val();
        	let json =  {"id": id3, "workplace": workplace, "work_title": work_title, "Starttime_work": Starttime_work, "Stoptime_work": Stoptime_work};
        	// Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
         // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_work/" + id3, true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
         // Skicka json data
        xmlhttp.send( JSON.stringify(json) );
         // När lyckas resultatet visa då ändringsbekräftelse.
        xmlhttp.onload = function() {
        	// Omvandla json data till Javascript objekt.
		 let jsonData = JSON.parse( this.responseText );
		  // Itrera dessa objektsdata.
        for(let i=0; i < jsonData.length; i++){
        			// Visa ändringsbekräftelse.
                  document.getElementById("here").innerHTML += "<div class='green'>Ändringar har sparats.</div>";    
        }
        }  
  })

}


	// Koden för att ändra webbssidorsuppgifter.
	// Definera knappen ändra webbssidorsuppgifter.
	let change4 = document.getElementById("change4");
	if(change4 !=null)
	{
		// Lägger till händelsehantering för knappen.
	change4.addEventListener("click", function(){
			// Deklarera de önskade data från formulärdata.
			let webpage_title = $("#webpage_title").val();
        	let webpage_url = $("#webpage_url").val();
        	let webpage_des = $("#webpage_des").val();
        	let id4 = $("#hid7").val();
        	let json =  {"id": id4, "webpage_title": webpage_title, "webpage_url": webpage_url, "webpage_des": webpage_des};
        	// Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
         // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_webpages/" + id4, true);
        xmlhttp.setRequestHeader('Content-Type', 'application/json');
          // Skicka json data
        xmlhttp.send( JSON.stringify(json) );
         // När lyckas resultatet visa då ändringsbekräftelse.
        xmlhttp.onload = function() {
        	// Omvandla json data till Javascript objekt.
		 let jsonData = JSON.parse( this.responseText );
		 // Itrera dessa objektsdata.
        for(let i=0; i < jsonData.length; i++){
        			// Visa ändringsbekräftelse.
                  document.getElementById("here").innerHTML += "<div class='green'>Ändringar har sparats.</div>";    
        }
        }  
  })

}



// Koden för att radera studieuppgiften.
// Definera knappen radera studieuppgiften.
let radera = document.getElementById("radera");
	if(radera !=null)
	{
	// Lägger till händelsehantering för knappen.
	radera.addEventListener("click", function(){ 
		// Deklarera de önskade data från formulärdata.
		let id3 = $("#hid3").val();
		let tabell = $("#raderahid1").val();
		// Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
         // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("DELETE", "http://localhost/Projekt_data/index.php/" + tabell + "/" + id3, true);
        // Skicka begäran.
        xmlhttp.send();
         // När lyckas resultatet skicka den till startsidan.
        xmlhttp.onload = function() {
            location.href = "index.php";
        }
    })	
}



	// Koden för att radera erfarenhetersuppgiften.
	// Definera knappen radera erfarenhetersuppgiften.
	let radera2 = document.getElementById("radera2");
	if(radera2 !=null)
	{
		// Lägger till händelsehantering för knappen.
    radera2.addEventListener("click", function(){ 
    	// Deklarera de önskade data från formulärdata.
		let id5 = $("#hid5").val();
		let tabell = $("#raderahid2").val();
		// Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
         // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("DELETE", "http://localhost/Projekt_data/index.php/" + tabell + "/" + id5, true);
         // Skicka begäran.
        xmlhttp.send();
        // När lyckas resultatet skicka den till startsidan.
        xmlhttp.onload = function() {
            location.href = "index.php";
        }
    })	
}

		// Koden för att radera webbssidorsuppgiften.
		// Definera knappen radera webbssidorsuppgiften.
		let radera3 = document.getElementById("radera3");
	if(radera3 !=null)
	{
		// Lägger till händelsehantering för knappen.
    radera3.addEventListener("click", function(){
     	// Deklarera de önskade data från formulärdata.
		let id7 = $("#hid7").val();
		let tabell = $("#raderahid3").val();
		// Starta Ajax förfrågan
        let xmlhttp = new XMLHttpRequest();
         // Definera HTTP-metoden och länken som skickas
        xmlhttp.open("DELETE", "http://localhost/Projekt_data/index.php/" + tabell + "/" + id7, true);
         // Skicka begäran.
        xmlhttp.send();
         // När lyckas resultatet skicka den till startsidan.
        xmlhttp.onload = function() {
            location.href = "index.php";
        }
    })	
}


	</script>
	</div>

	</div>

<hr />
<!-- Definera sidfoten och inkludera den -->
<?php require "includes/footer.php"; ?>