<?php
include_once("Controller.php");
include_once("UserModel.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicationtracker";
$conn = new mysqli($servername, $username, $password, $dbname);
$controller = new Controller();
$userModel = new UserModel();
?>
