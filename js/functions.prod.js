"use strict";var show=function(t){t="cv_pres",fetch("http://localhost/Projekt_data/index.php/"+t).then(function(t){return t.json()}).then(function(t){var n='<span class="bold">Fullständigt namn: </span>';t.forEach(function(t){n+="".concat(t.fullname,'<br /> \n        \t\t\t<span class="bold">Ålder:</span>\n        \t\t').concat(t.age,' år.   <br /> \n        \t\t<span class="bold">Språk: </span>\n        \t\t').concat(t.lang,' <br />\n        \t\t<span class="bold">Beskrivs som: </span>').concat(t.title,' </a><br />\n        \t\t<span class="bold">Mobilnummer:</span><br />\n        \t\t').concat(t.mobnr," <br /><br /><br />")}),document.getElementById("here1").innerHTML=n}),t="cv_studie",fetch("http://localhost/Projekt_data/index.php/"+t).then(function(t){return t.json()}).then(function(t){var n="";t.forEach(function(t){n+="<span class='bold'>Kursnamn: </span> ".concat(t.course_name,"\n   \t\t\t\t <br/>\n   \t\t\t\t<span class='bold'>Lärosäte: </span>\n        \t\t").concat(t.studiesschool," \n        \t\t<br /><span class='bold'>Starttid: </span>").concat(t.Starttime_studies," <br />\n        \t\t<span class='bold'>Sluttid: </span>\n        \t\t").concat(t.Stoptime_studies,"<br /> <a href='change.php?tabell=cv_studie&id=").concat(t.id,"'>Redigera denna del</a> <br /><br />")}),document.getElementById("here2").innerHTML=n+'<a href="add.php?tabell=cv_studie">Lägg till data</a><br />'}),t="cv_work",fetch("http://localhost/Projekt_data/index.php/"+t).then(function(t){return t.json()}).then(function(t){var n="";t.forEach(function(t){n+="<span class='bold'>Jobbtitel: </span>\n   \t\t\t\t".concat(t.work_title," <br/>\n   \t\t\t\t<span class='bold'>Arbetsställe: </span>\n        \t\t").concat(t.workplace," \n        \t\t <br /><span class='bold'>Starttid: </span>").concat(t.Starttime_work," \n        \t\t  <br /><span class='bold'>Sluttid: </span>").concat(t.Stoptime_work,"<br /> <a href='change.php?tabell=cv_work&id=").concat(t.id,"'>Redigera denna del</a><br /><br />")}),document.getElementById("here3").innerHTML=n+'<a href="add.php?tabell=cv_work">Lägg till data</a><br />'}),t="cv_webpages",fetch("http://localhost/Projekt_data/index.php/"+t).then(function(t){return t.json()}).then(function(t){var n="";t.forEach(function(t){n+="<span class='bold'>Webbsidatitel:</span> <span>".concat(t.webpage_title,"</span>\n            <br />\n             <span class='bold'>Adress: </span>\n             <a href='")+("".concat(t.webpage_url)?"".concat(t.webpage_url):"#")+"'>".concat(t.webpage_title,"</a> <br /><span class='bold'>Beskrivning: </span>").concat(t.webpage_des," <br /> <a href='change.php?tabell=cv_webpages&id=").concat(t.id,"'>Redigera denna del</a><br /><br /><br />")}),document.getElementById("here4").innerHTML=n+'<a href="add.php?tabell=cv_webpages">Lägg till data</a><br />'})};