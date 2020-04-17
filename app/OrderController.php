<?php

include_once("Model.php");
include_once("Order.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicationtracker";
$conn = new mysqli($servername, $username, $password, $dbname);


/** Takes user input data from Model, the model returns value 
 * The purpose of this class is to do CRUD of an order
 * 
 * 
 */ 
class  OrderController {

    //instance of the Model class called Order
    public $order;

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
     * param orignall medid and medqty
     */
    function createOrder($order_id,$doctor_id,$patient_id) { 

        global $model;
        $model = new Model("DoctorAddsOrderView", 1);
        global $conn;
        global $controller;

        //NOTE**CaregiverID will be given an initial value of 0 when order is made
        $model->doctorCreatesOrder($order_id, $doctor_id,$patient_id);

       // $model->addMeds2Order($order_id,$med_id,$medQty);
        $this->$order = new Order($order_id,$doctor_id,$patient_id); //create Order object 

        
        //OrderController redirects to the page where all Orders are displayed
        $model->setCurrentView("DoctorDisplaysOrdersView");
        
    } 

   /** Method  adds Med info from Doctor into the Order list
     * 
     */
    function addMeds($order_ID, $medName, $med_Qty, $med_Unit){

        global $model;
        $model = new Model("DoctorAddsOrderView", 1);
        global $conn;
        
        //get the medID from the medName
        $medID1 = $model->getMedID($medName);
       
        //Add meds to the Order object, and save the meds to the DB!
        $this->order.addMeds2Order($order_ID, $medID1,$med_Qty, $med_Unit);

        //make sure medif is 6 digits long
        // $model->addMeds2Order($order_id,$med_id,$medQty);

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
