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
        $medUnit1 = $_POST["inputMedicationUnit1"];

        //validate user entered data
        if($medName1 != "" && $medQty1 != "" && $medUnit1 != ""){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName1,$medQty1,$medUnit1);
        }
        else{
            echo "Med Quantity cannot be greater than 999";
        }


        $medName2 = $_POST["inputMedication2"];
        $medQty2 = $_POST["inputMedicationQty2"];
        $medUnit2 = $_POST["inputMedicationUnit2"];

        if($medName2 != "" && $medQty2 != "" && $medUnit2 != ""){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName2,$medQty2,$medUnit2);
        }
        else{
            echo "Sorry! The Med Quantity, Name, or  Unit is missing!";
        }

    

        $medName3 = $_POST["inputMedication3"];
        $medQty3 = $_POST["inputMedicationQty3"];
        $medUnit3 = $_POST["inputMedicationUnit3"];

        if($medName3 != "" && $medQty3 != "" && $medUnit3 != ""){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName3,$medQty3,$medUnit3);
        }
        else{
            echo "Sorry! The Med Quantity, Name, or  Unit is missing!";
        }
        
        $medName4 = $_POST["inputMedication4"];
        $medQty4 = $_POST["inputMedicationQty4"];
        $medUnit4 = $_POST["inputMedicationUnit4"];
        if($medName4 != "" && $medQty4 != "" && $medUnit4 != ""){
            //add Meds to the order
            $orderController->addMeds2Order($order_id, $medName4,$medQty4,$medUnit4);
        }
        else{
            echo "Sorry! The Med Quantity, Name, or  Unit is missing!";
        }
        
        

    }

?>
