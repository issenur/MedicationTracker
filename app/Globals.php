<?php
include_once("Controller.php");
include_once("OrderController.php");
include_once("Model.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicationtracker";
$conn = new mysqli($servername, $username, $password, $dbname);

$orderController = new OrderController();
$controller = new Controller();
$model;
//$userModel = new UserModel();
//$orderModel= new OrderModel();
$message = "";
?>
