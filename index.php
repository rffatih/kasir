<?php

session_start();

// ===========TAMPILKAN ERROR===========
// =====================================
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// =====================================
// =====================================

include "controller/dll/wot.php";
$Route = new Route;
$Route->routing();

?>
