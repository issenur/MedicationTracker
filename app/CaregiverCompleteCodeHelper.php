<?php
   include_once("CaregiverFODetailView.php");

   // Get order data from the table
   if (isset($_POST["completed"])) {
     $completedValue = $_POST["completed"];
     $medName = $_POST["med_name"];

     if ($completedValue = 1){
       $Model-> $Model::getInstance();
       $medID = $Model-> getMedID($medName);
       $Model-> updateMedStatus($order_id);
     }


   }
   ?>
