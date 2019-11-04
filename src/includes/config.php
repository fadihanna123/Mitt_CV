<?php
	//Visa alla möjliga och dolda fel 
	error_reporting(-1);
	ini_set("display_errors", 1);
	// Importera och läsa in Admin klassen.
	spl_autoload_register(function($class) {
	    include 'classes/' . $class . '.class.php';
	});

	
?>