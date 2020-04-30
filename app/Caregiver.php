<?php

include_once("Globals.php");


class Caregiver{ // instance var of a Caregiver
  private $care_giver_id;
  private $firstname;
  private $lastname;
  private $is_nurse; //  0 =no, 1 = yes
  private $active; // 0 = inactive, 1 = active

  public function __construct($Care_Giver_ID){
    $this->setCare_Giver_ID($Care_Giver_ID); // sets the Caregiver ID using the param
  }

  # Method sets the Doctor ID
  # When Admin creates a Caregiver user, they will use this method
  public function setCare_Giver_ID($Care_Giver_ID1){
    $this->$Care_Giver_ID = $Care_Giver_ID1; // sets Caregiver ID for the object.
  }

  # Method will get the Caregiver ID from the Database
  # Order will call this method to obtain ID from Database
  public static function getCare_Giver_ID($Care_Giver_ID){
    $realCare_Giver_ID = $model->getCare_Giver_ID($Care_Giver_ID);
    if($realCare_Giver_ID !=0){ // Checks if we have the Care_Giver_ID insteaad of 0,
      $this->$Care_Giver_ID = $realCare_Giver_ID;
      return $Care_Giver_ID;
    }
  }

  # This method will set the first name for the Caregiver
  public function setCare_Giver_First(int $firstN1){
    $this->$firstname = $firstN1;
  }

  # This method will set the last name for the Caregiver
  public function setCare_Giver_Last(int $lastN1){
    $this->$lastname = $lastN1;
  }

  # This method will set the firstname for the Caregiver
  public function setCare_Giver_First(int $firstN1){
    $this->$firstname = $firstN1;
  }

  # This method will set the if the caregiver is a nurse or not
  public function setCare_Giver_Nurse_Status($newStatus){
        $this->$isCare_Giver_Is_Nurse = $newStatus;
   }

  # This method gets if Caregiver is a nurse
  public function getCare_Giver_Nurse_Status(){
        return $this->$isCare_Giver_Is_Nurse;
   }

  # This method will set the active status of a caregiver to a 0 or a 1
  public function setCare_Giver_Status($newStatus){
        $this->$isCare_Giver_Active = $newStatus;
   }

  # This method gets the active status of a caregiver
  public function getCare_Giver_Status(){
        return $this->$isCare_Giver_Active;
   }
}
?>
