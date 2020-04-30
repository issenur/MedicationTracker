<?php
   include_once("DoctorAddsOrderView.php"); //Doctor Creates Order Form is here
   include_once("OrderController.php");
   //include_once("Globals.php");


    //get order data from the Form
    if (isset($_POST["submitOrder1"])) {  //check if submit button is clicked
        $orderID = $_POST["inputOrderID1"];
        $doctorID = $_POST["inputDoctorID1"];
        $patientID = $_POST["inputPatientID1"];

         //create an Order
        $orderController = new OrderController();
        $orderController->createOrder($orderID,$doctorID,$patientID);
      
        $medName1 = $_POST["inputMedication1"];
        $medQty1 = $_POST["inputMedicationQty1"];
        $medTime1 = $_POST["inputMedicationTime1"];

        //validate user entered data
        if($medName1 != "" && $medQty1 != ""){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName1,$medQty1,$medTime1);
        }
        else{
            echo "Sorry! The Med Quantity, Name, or  Time cannot be added!";
        }


        $medName2 = $_POST["inputMedication2"];
        $medQty2 = $_POST["inputMedicationQty2"];
        $medTime2 = $_POST["inputMedicationTime2"];

        if($medName2 != "" && $medQty2 != "" ){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName2,$medQty2,$medTime2 );
        }
        else{
            echo "Sorry! The Med Quantity, Name, or  Time cannot be added!";
        }

    

        $medName3 = $_POST["inputMedication3"];
        $medQty3 = $_POST["inputMedicationQty3"];
        $medTime3 = $_POST["inputMedicationTime3"];

        if($medName3 != "" && $medQty3 != "" ){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName3,$medQty3,$medTime3);
        }
        else{
            echo "Sorry! The Med Quantity, Name, or  Time cannot be added!";
        }
        
        $medName4 = $_POST["inputMedication4"];
        $medQty4 = $_POST["inputMedicationQty4"];
        $medTime4 = $_POST["inputMedicationTime4"];
        if($medName4 != "" && $medQty4 != "" ){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName4,$medQty4,$medTime4);
        }
        else{
            echo "Sorry! The Med Quantity, Name, or Time cannot be missed!";
        }
             

    }

?>