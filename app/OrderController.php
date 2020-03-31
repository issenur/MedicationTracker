<?php

include_once("Model.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicationtracker";
$conn = new mysqli($servername, $username, $password, $dbname);

$md = new Model("DoctorView", 0); 


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
    function construct (){  
    }

    
    /**Method get parameters from View, and creates an order in the DB
     * 
     * Doctor creates an Order
     */
    function createOrder($order_id,$doctor_id,$patient_id,$med_id,$medQty) { 

        global $md;
        global $conn;
        global $controller;

         //NOTE**CaregiverID will be given an initial value of 0 when order is made
        $md->doctorCreatesOrder($order_id, $doctor_id,$patient_id);

        //we need orderID so that meds can be added to a specific order
        $md->addMeds2Order($order_id,$med_id,$medQty);

        //OrderController redirects to the page where all Orders are displayed
        //$md->setCurrentView("DoctorDisplaysOrders"); 
        $controller->changeView("DoctorDisplaysOrders");
        
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
