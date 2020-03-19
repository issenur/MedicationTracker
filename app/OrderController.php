<?php
namespace App;
include Model.php;

/** Takes user input data from Model, the model returns value 
 * The purpose of this class is to do CRUD of an order
 * 
 * 
 */ 
class  OrderController {

    //instance of the Model class called Order
    //public Order $Order;

    //get an instance of our DB for this class.


    //get a list of All the Orders made
    //public array $ordersList; 
    /**Constructor which creates order object
     * this method gets params from View, creates Order instance in this class
     */
    function construct ( int $orderID, int $doctorID, int $patientID, int $caregiverID, array $medicationIDs ){
        
        //instantiate the Order object
        //$this->Order = new Order($orderID,$doctorID,$patientID,null,$medicationIDs);
       // $ordersList.add(Order);
    
    }

    
    /**Method get parameters from View, and creates an order in the DB
     * returns a message
     * Doctor should assign patientID here
     */
    function createOrder(int $orderID, int $doctorID, int $patientID,
     int $medicationID, int $medUnit, $medQty, int $medType, int $orderCreationDate ) { 

       //Get hmtl form where user types in the Order
        //$htmlContent = file_get_contents("/medicationtracker/app/index3.html");
        //$DOM->loadHTML($htmlContent);
        //$tableHeader= $DOM->getElementsByTagName('th');
        //$tableDetail = $DOM->getElementsByTagName('td');

       // if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
        //get order data from the Form
        if ( isset( $_POST['submit'] ) ) {  //check if submit button is clicked
            $orderID =  $_POST["inputOrder1"];
            $doctorID = $_POST["inputDoctor1"];
            $patientID = $_POST["inputPatientID1"];

            //place in for loop to get all med entered
            $medID = $_POST["inputMedicationID1"];
            $medQty = $_POST["inputMedicationQty1"];
            $medType = $_POST["inputMedicationType1"];
            $medUnit = $_POST["inputMedicationUnit1"];

            $orderCreationDate = $_POST["inputOrderDate1"];


            echo " Here are form data from Doctor ";
            echo  $orderID ;
            echo "/n";
            echo  $orderCreationDate ;
            echo "/n";
            echo  $doctorID ;
            echo "/n";
            echo  $patientID ;
            echo "/n";
            echo  $medID ;
            echo "/n";
            echo  $medDosage ;
            echo "/n";
            echo  $medType ;
            echo "/n";
            echo  $medUnit;


        }


         //NOTE**CaregiverID will be given an initial value of 0 when order is made
        Model.createOrder($order_id,$order_creationdate,$doctor_id,$patient_id,$med_id,$med_type, $med_qty, $med_unit);

       Model.setView("OrderCreated.html"); //this page has function that will have Model.getOrder(), 
        
    } 

    /**Method updates an Order's details?
     *  should we
     */
    function updateOrder($orderID, $orderIDToUpdate){
    //check to see which attribute of an order will be updated

    }

    /**Method add additional medication via medID to an order
     * returns boolean, succesful addition = true, failure to add = false
     */
    function addMeds2Order($theOrderID, array $MedicationID){
     
        //loop, add multipel medsto 1 order

        //
    

    }

    /** Method  allows a caregiver to assign themselves to an order
     * 
     */
    function assignOrder2Caregiver($AnOrderID, $caregiverID){
    
    //get the order out of the list of orders
    //for(Order: ordersList){

       // if(Order.getOrderID().equals($orderID)){
          //  $Order.setCaregiver($caregiverID); 
        //}
          
    }
    





    /**Method gets the caregiverID from View, and updates the status field of Order to "fufilled"
     * 
     * order status 0 = order created
     * order status 1 = order assigned caregiver
     * order status 2 = order fufilled 
     */
    function assignOrderToPatient($orderID, $patientID){
      

        //update Order Status field to the integer of 2 aka fufilled 
       // $this->Order.status = 2;
        

    }

    /**Method returns an entire order details to the View
     * returns a message of order details
     */
   function printOrderDetails(){
    
        //return this.order.orderDetails();
    }


}
?>
