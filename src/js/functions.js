"use strict";

// show visar alla data i startsida beror på detskickade tabellnamn.
const show = (tabell) => {
  if ((tabell = "cv_pres")) {
    // Om tabellnamn är cv_pres
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then((res) => res.json())
      .then((data) => {
        let output = '<span class="bold">Fullständigt namn: </span>';
        data.forEach((post) => {
          output += `${post.fullname}<br /> 
        			<span class="bold">Ålder:</span>
        		${post.age} år.   <br /> 
        		<span class="bold">Språk: </span>
        		${post.lang} <br />
        		<span class="bold">Beskrivs som: </span>${post.title} </a><br />
        		<span class="bold">Mobilnummer:</span><br />
        		${post.mobnr} <br /><br /><br />`;
        });
        document.getElementById("here1").innerHTML = output;
      });
  } // Slut om tabellnamn är cv_pres

  if ((tabell = "cv_studie")) {
    // Om tabellnamn är cv_studie
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then((res) => res.json())
      .then((data) => {
        let output = "";

        data.forEach((post) => {
          output += `<span class='bold'>Kursnamn: </span> ${post.course_name}
   				 <br/>
   				<span class='bold'>Lärosäte: </span>
        		${post.studiesschool} 
        		<br /><span class='bold'>Starttid: </span>${post.Starttime_studies} <br />
        		<span class='bold'>Sluttid: </span>
        		${post.Stoptime_studies}<br /> <a href='change.php?tabell=cv_studie&id=${post.id}'>Redigera denna del</a> <br /><br />`;
        });
        document.getElementById("here2").innerHTML =
          output +
          '<a href="add.php?tabell=cv_studie">Lägg till data</a><br />';
      });
  } // Slut om tabellnamn är cv_studie

  if ((tabell = "cv_work")) {
    // Om tabellnamn är cv_work
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then((res) => res.json())
      .then((data) => {
        let output = "";

        data.forEach((post) => {
          output += `<span class='bold'>Jobbtitel: </span>
   				${post.work_title} <br/>
   				<span class='bold'>Arbetsställe: </span>
        		${post.workplace} 
        		 <br /><span class='bold'>Starttid: </span>${post.Starttime_work} 
        		  <br /><span class='bold'>Sluttid: </span>${post.Stoptime_work}<br /> <a href='change.php?tabell=cv_work&id=${post.id}'>Redigera denna del</a><br /><br />`;
        });
        document.getElementById("here3").innerHTML =
          output + '<a href="add.php?tabell=cv_work">Lägg till data</a><br />';
      });
  } // Slut om tabellnamn är cv_work

  if ((tabell = "cv_webpages")) {
    // Om tabellnamn är cv_webpages
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then((res) => res.json())
      .then((data) => {
        let output = "";

        data.forEach((post) => {
          output += `<span class='bold'>Webbsidatitel: </span>${post.webpage_title} <br />
   				<span class='bold'>Adress: </span><a href='
        		${post.webpage_url}'>${post.webpage_title}</a> <br /><span class='bold'>Beskrivning: </span>${post.webpage_des} <br />
        		<a href='change.php?tabell=cv_webpages&id=${post.id}'>Redigera denna del</a><br /><br /><br />`;
        });
        document.getElementById("here4").innerHTML =
          output +
          '<a href="add.php?tabell=cv_webpages">Lägg till data</a><br />';
      });
  } // Slut om tabellnamn är cv_webpages
};
