<?php
   include_once("DoctorAddsOrderView.php"); //Doctor Creates Order Form is here
   include_once("OrderController.php");

    //get order data from the Form
    if ( isset( $_POST['submitOrder'] ) ) {  //check if submit button is clicked
        $orderID = $_POST["inputOrderID1"];
        $doctorID = $_POST["inputDoctor1"];
        $patientID = $_POST["inputPatientID1"];

       
        $medID = $_POST["inputMedicationID1"];
        $medName = $_POST["inputMedicationName1"];
        $medQty = $_POST["inputMedicationQty1"];
        $medUnit = $_POST["inputMedicationUnit1"];
 
        //create an Order
        $orderController = new OrderController();

        $orderController->createOrder($orderID,$doctorID,$patientID,$medID,$medQty);

    }

?>