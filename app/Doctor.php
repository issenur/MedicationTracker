<?php

include_once("Globals.php");

class Doctor {

/* instance var of a Doctor*/
    private  $doctorID;
    private  $firstname; 
    private  $lastname;
    private  $isDoctorActive; // 0 = inactive, 1 = active 


    public function __construct($doctorID) {
        $this->setDoctorID($doctorID); //set the doctor id using the param
    }


    /*Method sets the doctorID
    *when admin create Doctor as user, they can use this method
    */
    public function setDoctorID($doctorID1){
        $doctorID = $doctorID1;  
        
    }

    /*Method gets doctorID from the DB
    * Order will call this method to obtain doctorID from DB
    */
	public static function getDoctorID($doctorID){
        
        global $model;
        $realDoctorID = $model->getDoctorID($doctorID);
        if($realDoctorID !=0){ //check if we have the doctorID instead of number 0,
            $doctorID = $realDoctorID;
         return $doctorID;
 
        }
     
    }

    /*Method sets the firstname
    *
    */
    public function setDoctorFirst(int $firstN1){
        $this->$firstname = $firstN1;
   }
   /*Method sets the lastname
    *
    */
	public function setDoctorLast(int $lastN1){
		 $this->$lastname = $lastN1;
    }
    
    /*Method sets the active status of a Doctor to a 0 or a 1
    *
    */
	public function setDoctorStatus($newStatus){
        $this->$isDoctorActive = $newStatus;
   }
    /*Method get the active status of a Doctor
    *
    */
	public function getDoctorStatus(){
        return $this->$isDoctorActive;
   }



}
?> 