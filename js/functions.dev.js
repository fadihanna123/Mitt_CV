"use strict"; // show visar alla data i startsida beror på detskickade tabellnamn.

var show = function show(tabell) {
  if ((tabell = "cv_pres")) {
    // Om tabellnamn är cv_pres
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then(function (res) {
        return res.json();
      })
      .then(function (data) {
        var output = '<span class="bold">Fullständigt namn: </span>';
        data.forEach(function (post) {
          output += ""
            .concat(
              post.fullname,
              '<br /> \n        \t\t\t<span class="bold">\xC5lder:</span>\n        \t\t'
            )
            .concat(
              post.age,
              ' \xE5r.   <br /> \n        \t\t<span class="bold">Spr\xE5k: </span>\n        \t\t'
            )
            .concat(
              post.lang,
              ' <br />\n        \t\t<span class="bold">Beskrivs som: </span>'
            )
            .concat(
              post.title,
              ' </a><br />\n        \t\t<span class="bold">Mobilnummer:</span><br />\n        \t\t'
            )
            .concat(post.mobnr, " <br /><br /><br />");
        });
        document.getElementById("here1").innerHTML = output;
      });
  } // Slut om tabellnamn är cv_pres

  if ((tabell = "cv_studie")) {
    // Om tabellnamn är cv_studie
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then(function (res) {
        return res.json();
      })
      .then(function (data) {
        var output = "";
        data.forEach(function (post) {
          output += "<span class='bold'>Kursnamn: </span> "
            .concat(
              post.course_name,
              "\n   \t\t\t\t <br/>\n   \t\t\t\t<span class='bold'>L\xE4ros\xE4te: </span>\n        \t\t"
            )
            .concat(
              post.studiesschool,
              " \n        \t\t<br /><span class='bold'>Starttid: </span>"
            )
            .concat(
              post.Starttime_studies,
              " <br />\n        \t\t<span class='bold'>Sluttid: </span>\n        \t\t"
            )
            .concat(
              post.Stoptime_studies,
              "<br /> <a href='change.php?tabell=cv_studie&id="
            )
            .concat(post.id, "'>Redigera denna del</a> <br /><br />");
        });
        document.getElementById("here2").innerHTML =
          output +
          '<a href="add.php?tabell=cv_studie">Lägg till data</a><br />';
      });
  } // Slut om tabellnamn är cv_studie

  if ((tabell = "cv_work")) {
    // Om tabellnamn är cv_work
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then(function (res) {
        return res.json();
      })
      .then(function (data) {
        var output = "";
        data.forEach(function (post) {
          output += "<span class='bold'>Jobbtitel: </span>\n   \t\t\t\t"
            .concat(
              post.work_title,
              " <br/>\n   \t\t\t\t<span class='bold'>Arbetsst\xE4lle: </span>\n        \t\t"
            )
            .concat(
              post.workplace,
              " \n        \t\t <br /><span class='bold'>Starttid: </span>"
            )
            .concat(
              post.Starttime_work,
              " \n        \t\t  <br /><span class='bold'>Sluttid: </span>"
            )
            .concat(
              post.Stoptime_work,
              "<br /> <a href='change.php?tabell=cv_work&id="
            )
            .concat(post.id, "'>Redigera denna del</a><br /><br />");
        });
        document.getElementById("here3").innerHTML =
          output + '<a href="add.php?tabell=cv_work">Lägg till data</a><br />';
      });
  } // Slut om tabellnamn är cv_work

  if ((tabell = "cv_webpages")) {
    // Om tabellnamn är cv_webpages
    fetch("http://localhost/Projekt_data/index.php/" + tabell)
      .then(function (res) {
        return res.json();
      })
      .then(function (data) {
        var output = "";
        data.forEach(function (post) {
          output +=
            "<span class='bold'>Webbsidatitel:</span> <span>".concat(
              post.webpage_title,
              "</span>\n            <br />\n             <span class='bold'>Adress: </span>\n             <a href='"
            ) +
            ("".concat(post.webpage_url) ? "".concat(post.webpage_url) : "#") +
            "'>"
              .concat(
                post.webpage_title,
                "</a> <br /><span class='bold'>Beskrivning: </span>"
              )
              .concat(
                post.webpage_des,
                " <br /> <a href='change.php?tabell=cv_webpages&id="
              )
              .concat(post.id, "'>Redigera denna del</a><br /><br /><br />");
        });
        document.getElementById("here4").innerHTML =
          output +
          '<a href="add.php?tabell=cv_webpages">Lägg till data</a><br />';
      });
  } // Slut om tabellnamn är cv_webpages
};
