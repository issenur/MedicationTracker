<?php
class order{
	private $doctorFirst;
	private $doctorLast;
	private $patientFirst;
	private $patientLast;
	private $careGiverFirst;
	private $careGiverLast;
	
	public function setOrderDoctorFirst($doctorFirst){
		 $this->doctorFirst = $doctorFirst;
	}
	public function setOrderDoctorLast($doctorLast){
		$this->patientLast = $doctorLast;
	}
	public function setOrderPatientFirst($patientFirst){
		 $this->doctorFirst = $patientFirst;
	}
	public function setOrderPatientLast($patientLast){
		$this->patientLast = $patientLast;
	}
	public function setOrderCareFirst($careGiverFirst){
		 $this->doctorFirst = $careGiverFirst;
	}
	public function setOrderCareGiverLast($careGiverLast){
		$this->careGiverLast = $careGiverLast;
	}
	
}
?>