<?php
include_once("Globals.php");
include_once("Patient.php");
include_once("Doctor.php");
include_once("Medication.php");
include_once("Model.php");
//include_once("Caregiver.php");


class Order implements IteratorAggregate {

	/* instance var of an Order */
	private  $orderID;
	private  $doctor; //should hold a Doctor object
	private  $patient; //will hold a Patient object
	private  $caregiver; //should hold a Caregiver object
	public   $orderMeds;  //3d array {Med, Med, Med, Med etc}
	public   $adminsitertime;
	
	
	public function __construct($orderID,$doctorID,$patientID) {

		$this->setOrderID($orderID);
		$this->setDoctor2Order($doctorID); //finds the doctor object, assigns to this order
		$this->setPatient2Order($patientID); //find the patient object, assign to this order
		$this->setCaregiver2Order($patientID); //find the patient object, assign to this order
		$orderMeds = array(); //create new array to be filled with Medications objects
		$model->doctorCreatesOrder($orderID,$doctorID,$patientID); // add the order to DB
	
	}

	/**
	 * Function to be implemeted so that we can iterate over Med objects
	 */ 
	function getIterator()
    {
		return new ArrayIterator($this->orderMeds);

	}

	 /**Method add medication to an order
     * returns boolean, succesful addition = true, failure to add = false
     */
    private function addMeds2Order($medName,$medQty,$medUnit){
		//check to see if Med is in DB
		$model = Model::getInstance();
		$medID = $model->getMedID($medName);

		//creates Med object 
		$newMed = new Medication($medID,$medQty,$medUnit);

		$this->orderMeds[] = $newMed; //add newMed to the Order

		//attach the med to the Order in the DB
		$model->addMeds2Order($this->$order_id,$medID,$medQty);
    
	}
	
	/**Method assigns a Patient to an order
     * method calls to check if Patient is in DB and is active
     */
	public  function setPatient2Order($patientID){

	//check DB and get the patientID
	$realID = Patient::getPatientID($patientID); 
	
	//if the IDs match, we can assign Patient object to this order
	if($realID == $patientID){
		$this->patient = new Patient($realID); //create Patient object to assign to this order
	}	
		
	}

	/**Method assigns a Caregiver to an order
     * method calls to check if caregiverID is in DB and is active
     */
	public  function setCaregiver2Order($orderID, $caregiverID){

		//check DB and get the patientID
		//$realID = getCaregiverID($caregiverID); //method should be in Caregiver.php
		
		//if($realID == $caregiverID){
			//$this->caregiver = new Caregiver($realID); //create Patient object to assign to this order
		//}	
			
	}


	
	/**Method sets doctorID for an order
     * 
     */
	public function setDoctor2Order(int $doctorID){
		
		//check DB and get the doctor who is active
	   $realID = Doctor::getDoctorID($doctorID); 
   
	   //if the IDs match, we can assign Doctor object to this order
	   if($realID == $doctorID){
		   $this->doctor = new Doctor($realID); //create Doctor object to assign to this order
	   }
	   
   }
	/**Method gets the orderID for an order
     * 
     */
	public  function getOrderID(){
		return $this->orderID;
    }
	/**Method sets orderID for an order
     * 
     */
	public function setOrderID($orderID1){
		$this->orderID = $orderID1;
   }

   
	 /**Method returns an entire order details to the View
     * returns order details
     */
	public function printOrderDetails(){   

    }

	
}
?>