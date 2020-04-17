<?php
include_once("Medication.php");
include_once("Model.php");
global $model;
$model = new Model("DoctorAddsOrderView" , 1);
$currentV = $model->getCurrentView();

class Order implements IteratorAggregate {

	/* instance var of an Order */
	private  $orderID;
	private  $doctorID;
	//private Doctor $doctor
	private  $patientID;
	private  $caregiverID;
	public   $orderMeds;  //3d array {Med, Med, Med, Med etc}
	

	//Meds 
	
	public function __construct($orderID,$doctorID,$patientID) { 
		$this->setOrderID($orderID);
		$this->setOrderDoctorID($doctorID);
		$this->setOrderPatientID($patientID);
		$orderMeds = array(); //create new array to be filled with Medications objects
		//model.doctorcreates(); // add the order to DB
	
	}

	//Function to be implemeted so that we can iterate over Med objects
	function getIterator()
    {
		return new ArrayIterator($this->orderMeds);

	}

	 /**Method add medication to an order
     * returns boolean, succesful addition = true, failure to add = false
     */
    private function addMeds2Order($medID,$medQty,$medUnit){

		//creates Med object 
		$newMed = new Medication($medID,$medQty,$medUnit);

		$this->orderMeds[] = $newMed; //add newMed to the Order

		//attach the med to the Order in the DB
		$model->addMeds2Order($this->$order_id,$medID,$medQty);
    
	}
	
	public function setOrderID(int $orderID1){
		$this->orderID = $orderID1;
   }
	public function setOrderDoctorID(int $doctorID1){
		 $this->doctorID = $doctorID1;
	}
	public function setOrderPatientID(int $patientID1){
		$this->patientID= $patientID1;
	}
	public function setOrderCaregiverID(int $caregiverID1){
		 $this->$caregiverID = $caregiverID1;
	}

	 /**Method returns an entire order details to the View
     * returns order details
     */
	function printOrderDetails(){
    
        
    }

	
}
?>