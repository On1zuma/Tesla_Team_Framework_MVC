<?php

require 'kernel/AutoLoad.php';

$S_urlADecortiquer = $_GET['url'] ?? null;
$A_postSettings = $_POST ?? null;

$O_controller = new Controller($S_urlADecortiquer, $A_postSettings);
$O_controller->execute();
