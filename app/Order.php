<?php
include_once("Medication.php");
include_once("Model.php");
include_once("Doctor.php");
include_once("Patient.php");

class Order implements IteratorAggregate {

	/* instance var of an Order */
	private  $orderID;
	private  $doctor;
	private  $patient;
	private  $caregiver;
	public   $orderMeds;  //3d array {Med, Med, Med, Med etc}
	

	
	public function __construct($orderID,$doctorID,$patientID) { 
		$this->setOrderID($orderID);
		$this->assignOrder2Doctor($orderID,$doctorID);
		$this->assignOrder2Patient($orderID,$patientID);
		
		$model = Model::getInstance();
		$model->doctorCreatesOrder($orderID,$doctorID,$patientID); // add the order to DB
		$orderMeds = array(); //create new array to be filled with Medications objects
	}

	//Function to be implemeted so that we can iterate over Med objects
	function getIterator()
    {
		return new ArrayIterator($this->orderMeds);

	}

	 /**Method add medication to an order
     * returns boolean, succesful addition = true, failure to add = false
     */
    private function addMeds2Order($medName,$medQty,$medUnit){

		//get correct medication ID , given the med name
		$model = Model::getInstance();
		$medID = $model ->getMedID($medName);

		//create new Med object 
		$newMed = new Medication($medID,$medQty,$medUnit);

		$this->orderMeds[] = $newMed; //add newMed to the Order

		//attach the med to the Order in the DB
		$model = Model::getInstance();
		$model->addMeds2Order($this->$order_id,$medID,$medQty,$medUnit);
    
	}

	 /** Method  assigns a Doctor object to this Order
     * 
     */
    function assignOrder2Doctor($AnOrderID, $doctorID){

		//get Doctor from the DB
		$realDoctorID = Doctor::getDoctorID($doctorID);
		if($realDoctorID != 0){
			$doctor = new Doctor($realDoctorID); //assign the Doctor to this order
			
		}
		else{
			
		}
		  
	}

	 /** Method  assigns a Patient object to this Order
     * 
     */
    function assignOrder2Patient($AnOrderID, $patientID){

		//get Patient from the DB
		$realPatientID = Patient::getPatientID($patientID);
		if($realPatientID != 0){
			$this->patient = new Patient($realPatientID); //assign the Doctor to this order
		}
		  
	}

	
	public function setOrderID(int $orderID1){
		$this->orderID = $orderID1;
   }
	
	

	 /**Method returns an entire order details to the View
     * returns order details
     */
	function printOrderDetails(){
        
    }

	
}
?>