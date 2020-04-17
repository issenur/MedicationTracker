<?php

class Medication{

    /* instance var of an Medication */
	public  $medID;
	public  $medQty;
    public  $medUnit;
    

    public function __construct($medID1,$medQty1,$medUnit1) { 
        $this->medID = $medID1;
        $this->medQty= $medQty1;
        $this->medUnit = $medUnit1;
    }

    public function getMedID(){
        return $this->medID;
    }

   
    public function getMedQty(){
        return $this->medQty;
    }

    public function getMedUnit(){
        return $this->medUnit;
    }

}