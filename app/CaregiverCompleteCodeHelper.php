<?php
   include_once("CaregiverFODetailView.php");
   include_once("Model.php");
   include_once("Globals.php");

   // Get order data from the table
 if (isset($_POST["checkboxInput"])) {
     $completedValue = $_POST["checkboxInput"];
     $medName = $_POST["medNameInput"];

     if ($completedValue = 1){
       $Model-> $Model::getInstance();
       $medID = $Model-> getMedID($medName);
       $Model-> updateMedStatus($medID);
       header("location:CaregiverOrderConfirmView.php");
     }
   }
   ?>
