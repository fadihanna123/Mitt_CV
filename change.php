<?php

// Starta session
session_start();
$title = (string) "Ändra data";
// Importera sidhuvud
require "includes/header.php";

// Importera klassen Admin och anropa den
require "config/config.php";

if (!isset($_SESSION['loginepost']) && !isset($_SESSION['loginpsw'])) {
    // Om det inte finns session då visa felmeddelande om inloggning
    echo "<script>alert('Du måste vara inloggad först för att kunna redigera eller ändra något. Var vänlig och logga in.'); window.location='login.php';</script>";
}
// Slut om det inte finns session då visa felmeddelande om inloggning

?>
<!-- Definera mittsdelen -->
<div class="changemain">
    <!-- Lägg till rubriken ändra data -->
    <h1>Ändra data</h1>
    <p>Här kan du ändra data.</p>

    <?php

if ($_GET['tabell'] == "cv_pres") {
    // Om det skickade tabellnamn i adressraden är cv_pres
    // Ansluta till databasen och importera formulärsdata från databasen
    $con = (object)mysqli_connect('localhost', 'root', '', 'test');
    mysqli_set_charset($con, "utf8");
    $sql = (string) "SELECT * FROM cv_pres";
    $result = (object)mysqli_query($con, $sql);
    $fetch = (array)mysqli_fetch_array($result);
    echo "<form>
							<div class='row'>
								<div class='labelcol'>
									<label for='fullname' class='bold'>Fullständigt namn: </label>
								</div>
								<div class='col'>
									<input type='text' id='fullname' placeholder='Fullname' value='$fetch[fullname]' />
								</div>
							</div>
							<div class='row'>
								<div class='labelcol'>
									<label for='epost' class='bold'>E-postadress:</label>
								</div>
								<div class='col'>
									<input type='email' id='epost' placeholder='Email' value='$fetch[epost]' />
								</div>
							</div>
							<div class='row'>
								<div class='labelcol'>
									<label for='mobnr' class='bold'>Mobilnummer: </label>
								</div>
								<div class='col'>
									<input type='text' id='mobnr' placeholder='Mobilnummer' value='$fetch[mobnr]' />
								</div>
							</div>

							<div class='row'>
								<div class='labelcol'>
									<label for='age' class='bold'>Ålder:</label>
								</div>
								<div class='col'>
									<input type='text' id='age' placeholder='Age' value='$fetch[age]' />
								</div>
							</div>

							<div class='row'>
								<div class='labelcol'>
									<label for='age' class='bold'>Språk: </label>
								</div>
								<div class='col'>
									<input type='text' id='lang' placeholder='Language' value='$fetch[lang]' />
								</div>
							</div>
							<div class='row'>
								<div class='labelcol'>
									<label for='title' class='bold'>Titel: </label>
								</div>
								<div class='col'>
									<input type='text' id='title' placeholder='Titel' value='$fetch[title]' />
								</div>
							</div>
									<input type='hidden' id='hid' value='$fetch[id]' />
									<input type='button' id='change1' class='btn' value='Ändra' name='change1' />

					</form><br />";
} // Slut om det skickade tabellnamn i adressraden är cv_pres
if ($_GET['tabell'] == "cv_studie") {
    // Om det skickade tabellnamn i adressraden är cv_studie
    // Ansluta till databasen och importera formulärsdata från databasen
    $con = (object)mysqli_connect('localhost', 'root', '', 'test');
    mysqli_set_charset($con, "utf8");
    $sql = (string) "SELECT * FROM cv_studie WHERE id=" . $_GET['id'] . ";";
    $result = (object)mysqli_query($con, $sql);
    while ($fetch = (array)mysqli_fetch_array($result)) {
        echo "<form>
							<div class='row'>
								<div class='labelcol'>
									<label class='bold' for='studiesschool'>Lärosäte: </label>
								</div>
								<div class='col'>
									<input type='text' size='40' id='studiesschool' placeholder='School' value='$fetch[studiesschool]' />
								</div>
							</div>
							<div class='row'>
								<div class='labelcol'>
									<label class='bold' for='course_name'>Kursnamn:</label>
								</div>
								<div class='col'>
									<input type='text' size='40' id='course_name' placeholder='course name' value='$fetch[course_name]' />
								</div>
							</div>
							<div class='row'>
								<div class='labelcol'>
									<label class='bold' for='Starttime_studies'>Starttid: </label>
								</div>
								<div class='col'>
									<input type='text' size='40' id='Starttime_studies' placeholder='Starttime' value='$fetch[Starttime_studies]' />
								</div>
							</div>
							<div class='row'>
								<div class='labelcol'>
									<label class='bold' for='Stoptime_studies'>Sluttid: </label>
								</div>
								<div class='col'>
									<input type='text' size='40' id='Stoptime_studies' placeholder='Stoptime' value='$fetch[Stoptime_studies]' />
								</div>
							</div>
									<input type='hidden' id='hid3' value='$fetch[id]' />
									<input type='hidden' id='raderahid1' value='cv_studie' />
									<div class='btnrow'>
										<input type='button' class='btn' id='change2' value='Ändra' name='change2' />
										<input type='button' class='dangerbtn' id='radera' value='Radera' />
									</div>
						</form><br />";
    }
} // Slut om det skickade tabellnamn i adressraden är cv_studie
if ($_GET['tabell'] == "cv_work") {
    // Om det skickade tabellnamn i adressraden är cv_work
    // Ansluta till databasen och importera formulärsdata från databasen
    $con = (object)mysqli_connect('localhost', 'root', '', 'test');
    mysqli_set_charset($con, "utf8");
    $sql = (string) "SELECT * FROM cv_work WHERE id=" . $_GET['id'] . ";";
    $result = (object)mysqli_query($con, $sql);
    while ($fetch = (array)mysqli_fetch_array($result)) {
        echo "<form>
						<div class='row'>
							<div class='labelcol'>
								<label class='bold' for='workplace'>Arbetsställe: </label>
							</div>
							<div class='col'>
								<input type='text' id='workplace' placeholder='Workplace' value='$fetch[workplace]' />
							</div>
						</div>
						<div class='row'>
							<div class='labelcol'>
								<label for='work_title' class='bold'>Jobbtitel: </label>
							</div>
							<div class='col'>
								<input type='text' id='work_title' placeholder='Worktitle' value='$fetch[work_title]' />
							</div>
						</div>
						<div class='row'>
							<div class='labelcol'>
								<label class='bold' for='Starttime_work'>Starttid: </label>
							</div>
							<div class='col'>
								<input type='text' id='Starttime_work' placeholder='Starttime' value='$fetch[Starttime_work]' />
							</div>
						</div>
						<div class='row'>
							<div class='labelcol'>
								<label class='bold' for='Stoptime_work'>Sluttid: </label>
							</div>
							<div class='col'>
								<input type='text' id='Stoptime_work' placeholder='Stoptime' value='$fetch[Stoptime_work]' />
							</div>
						</div>
								<input type='hidden' id='hid5' value='$fetch[id]' />
								<input type='hidden' id='raderahid2' value='cv_work' />
						<div class='btnrow'>
								<input type='button' class='btn' id='change3' value='Ändra' name='change3' />
								<input type='button' class='dangerbtn' id='radera2' value='Radera' />
						</div>


					</form><br/>";
    }
} // Slut om det skickade tabellnamn i adressraden är cv_work
if ($_GET['tabell'] == "cv_webpages") {
    // Om det skickade tabellnamn i adressraden är cv_webpages
    // Ansluta till databasen och importera formulärsdata från databasen
    $con = (object)mysqli_connect('localhost', 'root', '', 'test');
    mysqli_set_charset($con, "utf8");
    $sql = (string) "SELECT * FROM cv_webpages WHERE id=" . $_GET['id'] . ";";
    $result = (object)mysqli_query($con, $sql);
    while ($fetch = (array)mysqli_fetch_array($result)) {
        echo "<form>
							<div class='row'>
								<div class='labelcol'>
									<label class='bold' for='webpage_title'>Titel: </label>
								</div>
								<div class='col'>
									<input type='text' id='webpage_title' placeholder='Title' value='$fetch[webpage_title]' />
								</div>
							</div>

							<div class='row'>
								<div class='labelcol'>
									<label class='bold' for='webpage_url'>Adress:</label>
								</div>
								<div class='col'>
									<input type='url' id='webpage_url' placeholder='Address' value='$fetch[webpage_url]' />
								</div>
							</div>
							<div class='row'>
								<div class='labelcol'>
									<label class='bold' for='webpage_des'>Beskrivning: </label>
								</div>
								<div class='col'>
									<input type='text' id='webpage_des' placeholder='Description' value='$fetch[webpage_des]' />
								</div>
							</div>
									<input type='hidden' id='hid7' value='$fetch[id]' />
									<input type='hidden' id='raderahid3' value='cv_webpages' />
							<div class='btnrow'>
								<input type='button' class='btn' id='change4' value='Ändra' name='change4' />
								<input type='button' class='dangerbtn' id='radera3' value='Radera' />
							</div>
					</form><br />";
    }
}

// Slut om det skickade tabellnamn i adressraden är cv_webpages

?>
    <!-- Här ska den visas resultat efter ändring -->
    <div id="here"></div>
    <script>
    // Koden för att ändra personliga uppgifter
    // Definera knappen ändra personliga uppgifter
    let change1 = document.getElementById("change1");
    if (change1 != null) {
        // Lägger till händelsehantering för knappen
        change1.addEventListener("click", () => {
            // Deklarera de önskade data från formulärdata
            let fullname = document.getElementById("fullname").value;
            let epost = document.getElementById("epost").value;
            let mobnr = document.getElementById("mobnr").value;
            let age = document.getElementById("age").value;
            let title = document.getElementById("title").value;
            let lang = document.getElementById("lang").value;
            let id = document.getElementById("hid").value;
            let json = {
                "id": id,
                "fullname": fullname,
                "epost": epost,
                "mobnr": mobnr,
                "age": age,
                "lang": lang,
                "title": title
            };
            // Starta Ajax förfrågan
            let xmlhttp = new XMLHttpRequest();
            // Definera HTTP-metoden och länken som skickas
            xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_pres/1", true);
            xmlhttp.setRequestHeader('Content-Type', 'application/json');
            // Skicka json data
            xmlhttp.send(JSON.stringify(json));
            // När lyckas resultatet visa då ändringsbekräftelse.
            xmlhttp.onload = function() {
                // Omvandla json data till Javascript objekt
                let jsonData = JSON.parse(this.responseText);
                // Itrera dessa objektsdata
                for (let i = 0; i < jsonData.length; i++) {
                    // Visa ändringsbekräftelse
                    document.getElementById("here").innerHTML +=
                        "<div class='green'>Ändringar har sparats.</div>";
                }
            }
        })
    }



    // Koden för att ändra studieuppgifter
    // Definera knappen ändra studieuppgifter
    let change2 = document.getElementById("change2");
    if (change2 != null) {
        // Lägger till händelsehantering för knappen
        change2.addEventListener("click", () => {
            // Deklarera de önskade data från formulärdata
            let studiesschool = $("#studiesschool").val();
            let course_name = $("#course_name").val();
            let Starttime_studies = $("#Starttime_studies").val();
            let Stoptime_studies = $("#Stoptime_studies").val();
            let id2 = $("#hid3").val();
            let json = {
                "id": id2,
                "studiesschool": studiesschool,
                "course_name": course_name,
                "Starttime_studies": Starttime_studies,
                "Stoptime_studies": Stoptime_studies
            };
            // Starta Ajax förfrågan
            var xmlhttp = new XMLHttpRequest();
            // Definera HTTP-metoden och länken som skickas
            xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_studie/" + id2, true);
            xmlhttp.setRequestHeader('Content-Type', 'application/json');
            // Skicka json data
            xmlhttp.send(JSON.stringify(json));
            // När lyckas resultatet visa då ändringsbekräftelse.
            xmlhttp.onload = () => {
                // Omvandla json data till Javascript objekt.
                let jsonData = JSON.parse(this.responseText);
                // Itrera dessa objektsdata.
                for (let i = 0; i < jsonData.length; i++) {
                    // Visa ändringsbekräftelse.
                    document.getElementById("here").innerHTML +=
                        "<div class='green'>Ändringar har sparats.</div>";
                }
            }
        })

    }



    // Koden för att ändra erfarenhetersuppgifter
    // Definera knappen ändra erfarenhetersuppgifter
    let change3 = document.getElementById("change3");
    if (change3 != null) {
        // Lägger till händelsehantering för knappen
        change3.addEventListener("click", () => {
            // Deklarera de önskade data från formulärdata
            let workplace = $("#workplace").val();
            let work_title = $("#work_title").val();
            let Starttime_work = $("#Starttime_work").val();
            let Stoptime_work = $("#Stoptime_work").val();
            let id3 = $("#hid5").val();
            let json = {
                "id": id3,
                "workplace": workplace,
                "work_title": work_title,
                "Starttime_work": Starttime_work,
                "Stoptime_work": Stoptime_work
            };
            // Starta Ajax förfrågan
            let xmlhttp = new XMLHttpRequest();
            // Definera HTTP-metoden och länken som skickas
            xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_work/" + id3, true);
            xmlhttp.setRequestHeader('Content-Type', 'application/json');
            // Skicka json data
            xmlhttp.send(JSON.stringify(json));
            // När lyckas resultatet visa då ändringsbekräftelse.
            xmlhttp.onload = () => {
                // Omvandla json data till Javascript objekt.
                let jsonData = JSON.parse(this.responseText);
                // Itrera dessa objektsdata.
                for (let i = 0; i < jsonData.length; i++) {
                    // Visa ändringsbekräftelse.
                    document.getElementById("here").innerHTML +=
                        "<div class='green'>Ändringar har sparats.</div>";
                }
            }
        })

    }


    // Koden för att ändra webbssidorsuppgifter.
    // Definera knappen ändra webbssidorsuppgifter.
    let change4 = document.getElementById("change4");
    if (change4 != null) {
        // Lägger till händelsehantering för knappen.
        change4.addEventListener("click", () => {
            // Deklarera de önskade data från formulärdata.
            let webpage_title = $("#webpage_title").val();
            let webpage_url = $("#webpage_url").val();
            let webpage_des = $("#webpage_des").val();
            let id4 = $("#hid7").val();
            let json = {
                "id": id4,
                "webpage_title": webpage_title,
                "webpage_url": webpage_url,
                "webpage_des": webpage_des
            };
            // Starta Ajax förfrågan
            let xmlhttp = new XMLHttpRequest();
            // Definera HTTP-metoden och länken som skickas
            xmlhttp.open("PUT", "http://localhost/Projekt_data/index.php/cv_webpages/" + id4, true);
            xmlhttp.setRequestHeader('Content-Type', 'application/json');
            // Skicka json data
            xmlhttp.send(JSON.stringify(json));
            // När lyckas resultatet visa då ändringsbekräftelse.
            xmlhttp.onload = () => {
                // Omvandla json data till Javascript objekt.
                let jsonData = JSON.parse(this.responseText);
                // Itrera dessa objektsdata.
                for (let i = 0; i < jsonData.length; i++) {
                    // Visa ändringsbekräftelse.
                    document.getElementById("here").innerHTML +=
                        "<div class='green'>Ändringar har sparats.</div>";
                }
            }
        })

    }



    // Koden för att radera studieuppgiften.
    // Definera knappen radera studieuppgiften.
    let radera = document.getElementById("radera");
    if (radera != null) {
        // Lägger till händelsehantering för knappen.
        radera.addEventListener("click", () => {
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
            xmlhttp.onload = () => {
                location.href = "index.php";
            }
        })
    }



    // Koden för att radera erfarenhetersuppgiften.
    // Definera knappen radera erfarenhetersuppgiften.
    let radera2 = document.getElementById("radera2");
    if (radera2 != null) {
        // Lägger till händelsehantering för knappen.
        radera2.addEventListener("click", function() {
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
    if (radera3 != null) {
        // Lägger till händelsehantering för knappen.
        radera3.addEventListener("click", function() {
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

<hr />
<!-- Definera sidfoten och inkludera den -->
<?php require "includes/footer.php"; ?>