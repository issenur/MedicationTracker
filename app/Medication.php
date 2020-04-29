<?php

include_once("Globals.php");

/**Class stores data relating to a single Medication object
 * 
 */
class Medication {

/* instance var of an Med */
    private  $medID;
    private  $medQty;
    private  $medUnit;  //ml, mg, tablet, capsule

    public function __construct($medID,$medQty,$medUnit) {

		$this->setMedID($medID);
		$this->setMedQty($medQty);
		$this->setMedUnit($medUnit);
	
	}

    /*Method sets the medID
   */
    public function setMedID(int $medID1){
		$this->medID = $medID1;
   }
   
   /*Method returns medID
   */
   public function getMedID(){
	return $this->medID;
   }

	/*Method sets the quantity of a Med
    */
	public function setMedQty(int $medQty1){
		 $this->medQty = $medQtyD1;
	}

   /*Method returns medication quantity
   */
   public function getMedQty(){
	 return $this->medQty;
   }

	/*Method sets the units(g,ml) of a Med
    */
	public function setMedUnit(int $medUnitID1){
		$this->medUnit = $medUnitID1;
	}

	/*Method returns medication units
    */
  	public function getMedUnits(){
		return $this->medUnit;
  	}

	

}
?>
