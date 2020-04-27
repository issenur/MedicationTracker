<?php
include_once("Globals.php");
include_once("DoctorAddsOrderView.php");
include_once("Order.php");


/**  
 * The purpose of this class is to do CRUD of an Order object
 * 
 * 
 */ 
class  OrderController {

   /* instance var of an OrderController */
    public $order ;
    public $ordersList;


    /**Constructor which creates order object
     * this method gets params from View, creates Order instance in this class
     */
    function construct(){
       
       //create list to hold all Order objects 
       $this->$ordersList = array();
    
    }

    
    /**Method get parameters from View, and creates an order in the DB
     * 
     * Doctor creates an Order
     */
    function createOrder($order_id,$doctor_id,$patient_id) { 

       // global $model;
        $model = Model::getInstance();
        //$model->setCurrentAuthorizationLevel(1);
        //$model->setCurrentView("DoctorAddsOrderView");
        global $conn;

        //validate the data
        if(strlen($doctor_id) != 4 || strlen($patient_id) != 4){
            $message = "Sorry the Doctor and PatientIDs must be equal to 4";

        }
        

        //create Order object
        $this->order = new Order($order_id,$doctor_id,$patient_id);
        //$this->$ordersList.add($order); //add new order to our list of orders
        array_push($ordersList,$order);
  
        //OrderController redirects to the page where all Orders are displayed
        $model = Model::getInstance();
        $model->setCurrentView("DoctorDisplaysOrdersView");
    } 


    /**Method add additional medication via medID to an order
     * returns boolean succesful addition = true, failure to add = false
     */
    function addMeds2Order($order_id, $medName,$medQty,$medUnit){
        //validate medid, medQty,medUnit
    if(strlen($medQty > 3) || strlen($medQty == 0) ) {
        echo "Sorry the Medication Qty entered must between 1 and equal to 999";

    }
    //check if orderID is equal to this order
    if($this->$order->getOrderID() == $order_id){
        //add Medications to Order list and the DB as well
        $this->$order->addMeds2Order($medName,$medQty,$medUnit);
        return true;
    }
    else{
        return false;
    }
        
    

    }



}
?>
