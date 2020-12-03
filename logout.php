<?php

// Starta session.
session_start();
// Ta bort alla session data.
session_destroy();
// Skicka sidan till startsidan.
header("location: index.php");
