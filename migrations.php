<?php

require_once __DIR__ . '/vendor/autoload.php';
$filepath = realpath(dirname(__FILE__));
require_once($filepath."/kernel/DbMigration.php");

//dirname, return the path of a parent folder, and send it to our application
$db = new DbMigration();
$db->applyMigrations();
