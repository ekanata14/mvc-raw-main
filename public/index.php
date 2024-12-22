<?php

session_start();

require_once("../app/init.php"); // Getting init.php from the app folder to take the system from App.php Class

$App = new App(); // Instantiate the class to be an object