<?php

// This file in the entry point of the application

require 'kernel/AutoLoad.php';
require_once __DIR__ . '/vendor/autoload.php';

session_start();
if (!isset($_SESSION['user_id'])) session_unset();


/*
to use our MVC, you have to enter inside your navbar
    firstly : "index.php?url="
    secondly : "index.php?url=ControllerName/ActionName"
*/
// $S_controller = $_GET['ctrl'] ?? null;
// $S_action = isset($_GET['action']) ? $_GET['action'] : null;

$S_urlADecortiquer = $_GET['url'] ?? "";
$A_postSettings = $_POST ?? "";

// $S_url = isset($_GET['url']) ? $_GET['url'] : null;

View::openBuffer(); //  /kernel/View.php : we open the display buffer, controllers called the views
$O_controller = new Controller($S_urlADecortiquer, $A_postSettings);
$O_controller->execute();

// The few sub views were put inside the display buffer, we get them
$S_View = View::getBufferContent();
echo $S_View;
// We display the content in the template body
//View::show('template', array('body' => $A_content));
