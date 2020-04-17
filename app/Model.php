<?php
include_once("UserModel.php");
include_once("Globals.php");
class Model{
    
    private $currentview = "";
    private $currentuser; 
    
    function __construct($currentview, $currentuser) { 
    
        $this->currentview = $currentview;
        $this->currentuser = $currentuser;
    
    }
    
    public function authenticateAdmin($uname, $pin_submitted){        
        
        global $model;
        global $conn;
        global $message;
        $sql = "SELECT * from admin WHERE username = '$uname'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $real_pin = $row['pin'];
        
        if($pin_submitted == $real_pin){
            $this->setCurrentView("AdminView");
        
        }else{
            $message = "Invalid username or password!";  
        }
    }

    
    
    public function addDoctorUser($user_name, $pin, $first, $last, $active) {
    
        global $conn;
        global $userModel;
        $userModel = new ModelUser();
        $doctor_id = $userModel->addDoctor($first, $last, $active);  //UserModel class
        
        if($doctor_id > 0){
        
            $sql = "INSERT INTO user (username, pin, doctor_id, patient_id, care_giver_id , active) values('$user_name' ,'$pin', '$doctor_id', NULL, NULL,'$active')";
        
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
        
        }else{
            return false;
        }
    }
    
    public function removeDoctorUser($user_name) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        
        $sql = "SELECT doctor_id from user WHERE username = '$user_name'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $doctor_id = $row['doctor_id'];
        $num = $userModel->removeDoctor($doctor_id);
        
        if($num == 1){
        
            $sql = "UPDATE user SET active = 0 WHERE username = '$user_name'";
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function activateDoctorUser($user_name) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        
        $sql = "SELECT doctor_id from user WHERE username = '$user_name'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $doctor_id = $row['doctor_id'];
        $num = $userModel->activateDoctor($doctor_id);
        
        if($num == 1){
        
            $sql = "UPDATE user SET active = 1 WHERE username = '$user_name'";
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        $patient_id = $modelUser->addPatient($first, $last, $date_of_birth, $active);
        
        if($patient_id > 0){
        
            $sql = "INSERT INTO user (username, pin, doctor_id, patient_id, care_giver_id , active) values('$user_name' ,'$pin', NULL, '$patient_id', NULL,'$active')";
            
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
            
        }else{
            return false;
        }
    }
    
    public function removePatientUser($user_name) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        
        $sql = "SELECT patient_id from user WHERE username = '$user_name'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $patient_id = $row['patient_id'];
        $num = $userModel->removePatient($patient_id);
        
        if($num == 1){
        
            $sql = "UPDATE user SET active = 0 WHERE username = '$user_name'";
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function activatePatientUser($user_name) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        
        $sql = "SELECT patient_id from user WHERE username = '$user_name'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $patient_id = $row['patient_id'];
        $num = $userModel->activatePatient($patient_id);
        
        if($num == 1){
        
            $sql = "UPDATE user SET active = 1 WHERE username = '$user_name'";
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function addCareGiverUser($user_name, $pin, $first, $last, $is_nurse, $active) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        $care_giver_id = $userModel->addCareGiver($first, $last, $is_nurse, $active);
        
        if($care_giver_id > 0){
        
            $sql = "INSERT INTO user (username, pin, doctor_id, patient_id, care_giver_id , active) values('$user_name' ,'$pin', NULL, NULL, '$care_giver_id', '$active')";
            
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
            
        }else{
            return false;
        }
    }
    
    public function removeCaregiverUser($user_name) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        
        $sql = "SELECT care_giver_id from user WHERE username = '$user_name'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $care_giver_id = $row['care_giver_id'];
        $num = $userModel->removeCaregiver($care_giver_id);
        
        if($num == 1){
        
            $sql = "UPDATE user SET active = 0 WHERE username = '$user_name'";
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function activateCaregiverUser($user_name) {
    
        global $conn;
        global $userModel;
        $userModel = new UserModel();
        
        $sql = "SELECT care_giver_id from user WHERE username = '$user_name'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $care_giver_id = $row['care_giver_id'];
        $num = $userModel->activateCaregiver($care_giver_id);
        
        if($num == 1){
        
            $sql = "UPDATE user SET active = 1 WHERE username = '$user_name'";
            if(!mysqli_query($conn, $sql)){
                return false;
            }else{
                
                return true;
            }
        }else{
            return false;
        }
    }
    
    public function updateUserUsername($username, $newusername) {
    
        global $conn;
        $sql = "UPDATE user SET  username = '$newusername' WHERE username = $username";
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    
    public function updateUserPin($username, $pin) {
    
        global $conn;
        $sql = "UPDATE user SET  pin = '$pin' WHERE username = $username";
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    
    /**
    * Method creates an Order using the form where Doctor enters in parameters
    */
    public function doctorCreatesOrder($order_id,$doctor_id, $patient_id) {
    
        global $conn;
        
        //notice care_giver_id is hardcoded to 0000, there is no caregiver with
        //this id number. It represents NULL. Which means we havent assigned a
        //care_giver yet.
        
        $sql = "INSERT INTO `order` (`order_id`,`doctor_id`, `patient_id`, `care_giver_id`, `date`) VALUES ('$order_id','$doctor_id', '$patient_id', '0000', CURDATE())";
        if(!mysqli_query($conn, $sql)){
           return false; 
        }else{
           return true;
        }
    }
    
  

    /**
    * Methods adds medications to an Order
    */
    public function addMeds2Order($order_id , $med_id, $med_qty){
        global $conn;
        
        //administertime is blank, when an order doesnt have a caregiver yet
        $sql = "INSERT INTO break_down(order_id, medication_id, quantity, administer_time) values('$order_id', '$med_id', '$med_qty', '')";
        
        if(!mysqli_query($conn, $sql)){
            return false;
        }else{
            return true;   
        }
    
    }

    /**Method takes in a medName and return the associated medID
    * 
    */
    public function getMedID($medName){        
        
        global $model;
        global $conn;
        global $message;
        $sql = "SELECT medication_id from medication WHERE name = '$medName'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $real_name = $row['name'];
        
        if($medName == $real_name){
            $this->setCurrentView("DoctorDisplaysOrdersView");
            $medID = $row['medication_id'];
            return $medID;
        
        }else{
            $message = "MedID could not be found ";  
        }
    }
    
   
    
    public function setCurrentView($newView) {
        
        $this->currentView = $newView;
        
        if($newView == "AdminLoginView"){
            header("Location: AdminLoginView.php");
        }else if($newView == "HomeView"){
            header("Location: index.php");
        }else if($newView == "AdminView"){
            header("Location: AdminView.php");
        }else if($newView == "DoctorDisplaysOrdersView"){     //redirect to list of all orders, after new order is made
            header("Location: DoctorDisplaysOrdersView.php");
        }
    }
    
    public function getCurrentview() {
        return($this->currentview);
    }
    
    public function setCurrentUser($newUser) {
        $this->currentUser = $newUser;   
    }
    
    public function getCurrentUser() {
        return($this->currentUser);
    }
}


?>

