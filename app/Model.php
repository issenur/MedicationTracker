<?php
include_once("ModelUser.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicationtracker";
$conn = new mysqli($servername, $username, $password, $dbname);

class Model{

    private $currentview = "";
    private $currentuser; 
    
    function __construct($currentview, $currentuser) { 
    
        $this->currentview = $currentview;
        $this->currentuser = $currentuser;
    
    }
   
    
    public function addDoctorUser($user_name, $pin, $first, $last, $active) {
    
        global $conn;
        
        $mdUser = new ModelUser();
        $doctor_id = $mdUser->addDoctor($first, $last, $active);
        
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
    
    public function removeDoctorUser($user_name, $doctor_id) {
        
        global $conn;
        $mdUser = new ModelUser();
        $num = $mdUser->removeDoctor($doctor_id);
       
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
    
    public function addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active) {
    
        global $conn;
        
        $mdUser = new ModelUser();
        $patient_id = $mdUser->addPatient($first, $last, $date_of_birth, $active);
        
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
    
    public function removePatientUser($user_name, $patient_id) {
        
        global $conn;
        $mdUser = new ModelUser();
        $num = $mdUser->removePatient($patient_id);
       
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
    
    public function addCareGiverUser($user_name, $pin, $first, $last, $is_nurse, $active) {
    
        global $conn;
        
        $mdUser = new ModelUser();
        $care_giver_id = $mdUser->addCareGiver($first, $last, $is_nurse, $active);
        
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
    
    public function removeCareGiverUser($user_name, $care_giver_id) {
        
        global $conn;
        $mdUser = new ModelUser();
        $num = $mdUser->removePatient($care_giver_id);
       
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
    
    public function setCurrentView($newView) {
        
        $this->currentView = $newView;
        
        if($newView == "AdminLoginView"){
             header("Location: AdminLoginView.php");
        }else if($newView == "HomeView"){
             header("Location: index.php");
        }else if($newView == "AdminView"){
            header("Location: AdminView.php");
        }else if($newView == "DoctorDisplayOrders"){     //redirect to list of all orders, after new order is made
            header("Location: DoctorDisplaysOrders.php");
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

$md = new Model("LoginView", 0);
///$result = $md->addDoctorUser("MackOdo", 2300, "Mack", "Odell", 1);
//echo $result;

//$result = $md->addPatientUser("JayJackson", 0303, "Jay", "Jackson", '1990-09-27', 1);
//echo $result;

//$result = $md->doctorCreatesOrder(36, 63);
//echo $result;

//$result = $md->getCurrentView();
//echo $result;
//$result = $md->addDoctorUser("DocJohnson", 8980, "Mitchell", "Johnson", 1);
//echo $result;
//$result = $md->removeDoctorUser("JoseNunez", 34);
//echo $result;
//$result = $md->addPatientUser("Unicorn", 1232, "Uni", "Corn", '1990-08-27', 1);
//echo $result;
//$result = $md->removePatientUser("Billy6000", 2);
//$result = $md->addCareGiverUser("SeanCarter", 0003, "Sean", "Carter", 1, 1);
//$result = $md->removePatientUser("IkeMink2019", 2);


//$result = $md->createOrder(7,36, 4, 1, 200.00, '22:23:05');
//echo $result;


?>

