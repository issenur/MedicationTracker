<?php

include_once("Globals.php");

class Patient {

/* instance var of a Patient*/
    private  $patientID;
    private  $firstname; 
    private  $lastname;
    private  $DOB;
    private  $isPatientActive; // 0 = inactive, 1 = active 


    public function __construct($patientID) {
        $this->setPatientID($patientID); //set the Patient id using the param

    }

    /*Method sets the patientid 
    *when admin create Patient as user, they can use this method
    */
    public function setPatientID(int $patientID1){
        $this->$patientID = $patientID1;  //set patientID for the object
        
    }

    /*Method gets patientID from the DB
    * Order will call this method to obtain ID from DB
    */
	public static function getPatientID($patientID){
        
       $model = Model::getInstance(); 
       $realPatientID =  $model->getPatientID($patientID);
       if($realPatientID !=0){ //check if we have the patientID instead of number 0,
        $this->$patientID =  $realPatientID;
        return $patientID;

       }
    
   }


    /*Method sets the firstname
    *
    */
    public function setPatientFirst(int $firstN1){
        $this->$firstname = $firstN1;
   }
   /*Method sets the lastname
    *
    */
	public function setPatientLast(int $lastN1){
		 $this->$lastname = $lastN1;
    }
    
    /*Method sets the DOB
    *
    */
	public function setPatientDOB(int $DOB1){
        $this->$DOB = $DOB1;
   }

    /*Method gets the DOB of a patient
    *
    */
	public function getPatientDOB(){
        return $this->$DOB;
   }
    /*Method sets the active status of a patient to a 0 or a 1
    *
    */
	public function setPatientStatus($newStatus){
        $this->$isPatientActive = $newStatus;
   }
    /*Method get the active status of a patient
    *
    */
	public function getPatientStatus(){
        return $this->$isPatientActive;
   }

}
?>