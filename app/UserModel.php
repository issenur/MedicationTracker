
<?php

include_once("Globals.php");

//
class UserModel{
    
    function __construct() {
        //Empty
    }
    
    public function addDoctor($first, $last, $active){
        
        global $conn;
        $sql = "INSERT INTO doctor(first , last, active) values('$first' , '$last', '$active')";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
        
            $sql = "SELECT MAX(doctor_id) from  doctor WHERE first = '$first' AND last = '$last' AND active = '$active' ";
            $result = $conn->query($sql);
            $row = $result -> fetch_array();
            $doctor_id = (int)$row['MAX(doctor_id)'];
        
            return $doctor_id;
        }
    }
    
    public function removeDoctor($doctor_id){
        
        global $conn; 
        $sql = "UPDATE doctor SET active = 0 WHERE doctor_id = $doctor_id";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
            return 1;
        }
    }
    
    public function activateDoctor($doctor_id){
        
        global $conn; 
        $sql = "UPDATE doctor SET active = 1 WHERE doctor_id = $doctor_id";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
            return 1;
        }
    }
    
    public function addPatient($first, $last, $date_of_birth,  $active){
        
        global $conn;
        $sql = "INSERT INTO patient(first , last, date_of_birth, active) values('$first' , '$last', '$date_of_birth', '$active')";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
        
            $sql = "SELECT MAX(patient_id) from  patient WHERE first = '$first' AND last = '$last' AND date_of_birth = '$date_of_birth'  AND active = '$active' ";
            $result = $conn->query($sql);
            $row = $result -> fetch_array();
            $patient_id = (int)$row['MAX(patient_id)'];
    
            return $patient_id;
        }
    }
    
    public function removePatient($patient_id){
        
        global $conn; 
        $sql = "UPDATE patient SET active = 0 WHERE patient_id = $patient_id";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
            
            return 1;
        }
    }
    
    public function activatePatient($patient_id){
        
        global $conn; 
        $sql = "UPDATE patient SET active = 1 WHERE patient_id = $patient_id";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
            return 1;
        }
    }
    
    public function addCareGiver($first, $last, $is_nurse,  $active){
        
        global $conn;
        $sql = "INSERT INTO care_giver(first , last, is_nurse, active) values('$first' , '$last', '$is_nurse', '$active')";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
        
            $sql = "SELECT MAX(care_giver_id) from  care_giver WHERE first = '$first' AND last = '$last' AND is_nurse = '$is_nurse'  AND active = '$active' ";
            $result = $conn->query($sql);
            $row = $result -> fetch_array();
            $care_giver_id = (int)$row['MAX(care_giver_id)'];
    
            return $care_giver_id;
        }
    }
    
    public function removeCareGiver($care_giver_id){
        
        global $conn; 
        $sql = "UPDATE care_giver SET active = 0 WHERE care_giver_id = $care_giver_id";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
            return 1;
        }
    }
    
     public function activateCaregiver($care_giver_id){
        
        global $conn; 
        $sql = "UPDATE care_giver SET active = 1 WHERE care_giver_id = $care_giver_id";
        
        if(!mysqli_query($conn, $sql)){
            return 0;
        }else{
            return 1;
        }
    }
}
?>

