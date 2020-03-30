<?php
    include_once("AdminLoginView.php");
    include_once("Controller.php");
    
    if(isset($_POST["enter"])){
        $username = $_POST["username"];
        $pin = $_POST["pin"];
        $Controller = new Controller(); 
        $Controller->authenticateAdmin($username, $pin);
    }
     
?>