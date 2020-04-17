<?php
   include_once("DoctorAddsOrderView.php"); //Doctor Creates Order Form is here
   include_once("OrderController.php");

    //get order data from the Form
    if(isset($_POST["submitOrder1"])) {  //check if submit button is clicked
        $orderID = $_POST["inputOrderID1"];
        $doctorID = $_POST["inputDoctorID1"];
        $patientID = $_POST["inputPatientID1"];

        $orderController = new OrderController();
        $orderController->createOrder($orderID,$doctorID, $patientID);

        $med1 = $_POST["inputMedication1"];
        $medQty1 = $_POST["inputMedicationQty1"];
        $medUnit1 = $_POST["inputMedicationUnit1"];
        if($medID1 == "" || $medQty1 == "" || $medUnit1 == ""){ //make sure med1 is entered by Doctor
            echo "YOU MUST ENTER AT LEAST 1 MED";
        }
        $med2 = $_POST["inputMedication2"];
        $medQty2 = $_POST["inputMedicationQty2"];
        $medUnit2 = $_POST["inputMedicationUnit2"];
        if($medID2 != "" && $medQty2 != "" && $medUnit2 != "" ){
            $orderController->addMeds($orderID, $med2, $medQty2, $medUnit2);
        }

        $med3 = $_POST["inputMedication3"];
        $medQty3 = $_POST["inputMedicationQty3"];
        $medUnit3 = $_POST["inputMedicationUnit3"];
        if($medID3 != "" && $medQty3 != "" && $medUnit3 != "" ){
            $orderController->addMeds($orderID, $med3, $medQty3, $medUnit3);
        }

        $med4 = $_POST["inputMedication4"];
        $medQty4 = $_POST["inputMedicationQty4"];
        $medUnit4 = $_POST["inputMedicationUnit4"];
        if($medID4 != "" && $medQty4 != "" && $medUnit4 != "" ){
            $orderController->addMeds($orderID, $med4, $medQty4, $medUnit4);
        }

      
        //decode values from Jquery
       // $medIDarray = json_decode($_POST["medIDarray"]);
       // $medQarray = json_deocde($_POST['medQarray']);
       // $medUnitarray = json_decode($_POST['medUnitarray']);
       

       /*
        //Loop through meds array, insert the medications to the order
        for($i = 0; $i < sizeof($medIDarray); $i++){
            for($k = 0; $k < sizeof($medQarray); $k++){
                for($j =0; $j <sizeof($medUnitarray); $j++){

                    //adds meds 
                 $orderController->addMeds($orderID,$medIDarray[$i],$medQty[$k]);
                   echo $medIDarray[$i];
                   echo $medQarray[$k];
                   echo $medUnitarray[$j];
                   echo "  ";
                }
                
            }
            
        }
        */
    }

?>