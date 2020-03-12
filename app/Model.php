<?php
include('Order.php');
class Model{
    private $servername = "localhost";
    private $username = "admin";
    private $password = "admin";
    private $dbname = "laravel";
    private $currentview = "";
        
    function __construct($currentview) {
       $this->currentview = $currentview;
    }
    //mainly used by controller
    public function addOrder1($doctorId, $patientId, $date) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "INSERT INTO order(doctorId, patientId, careGiverId, date) values('$doctorId', '$patientId', 'NULL', '$date')";
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
            return true;    
        }
    }
    //mainly used by controller
    public function addOrder2($orderId, $medicationId) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "INSERT INTO orderBreakdown(orderId, medicationId) values('$orderId', '$medicationId')";
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
            return true;    
        }
    }
    //mainly used by controller
    public function addOrder3($orderId,$careGiverId) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "UPDATE order SET careGiverId ='$careGiverId', WHERE orderId=$orderId";
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
            return true;   
        }
    }
    
    //mainly used by controller
    public function updateOrder($orderId,$doctorId, $patientId, $careGiverId, $date) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "UPDATE order SET patientId = '$patientId', careGiverId ='$careGiverId', date = '$date' WHERE orderId = $orderId";
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
            return true;   
        }
    }
    
    //mainly used by contoller
    public function removeOrder($orderId) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "DELETE FROM order WHERE orderId = '$orderId'";
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
            true;      
        }
    }
    
    public function addUser($first, $last, $email, $tier) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "INSERT INTO user(first, last, email, tier) values('$first', '$last', '$email', '$tier')";
        
        if(!mysqli_query($conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    
    public function updateUser($orderId, $first, $last, $email, $tier) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "UPDATE user SET  first = '$first', last ='$last', tier = '$tier' WHERE userId = $userId";
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
            return true;   
        }
    }
    
    public function removeUser($userId) {
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "DELETE FROM user WHERE userId = '$userId'";
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
            true;      
        }
    }
    
    public function getOrder($orderId){
        $conn = new mysqli($servername, $username, $password, $dbname);
        $orderObject = new Order();
        $sql = "SELECT * FROM order";
        $result = $conn->query($sql);
        
        $orderObject->setOrderId($row['orderId']);
        
        $sql = "SELECT * FROM user WHERE userId =" . $row['doctorId'];
       
        $orderObject->setOrderDoctorFirst($row['first']);
        $orderObject->setOrderDoctorLast($row['last']);
        
        
        $sql = "SELECT * FROM user WHERE userId =" . $row['patientId'];
        
        $orderObject->setOrderPatientFirst($row['first']);
        $orderObject->setOrderPatientLast($row['last']);
        
        
        
        $sql = "SELECT * FROM user WHERE userId =" . $row['careGiverId'];
       
        $orderObject->setOrderCaregiverFirst($row['first']);
        $orderObject->setOrderCaregiverLast($row['last']);
        
        
        if(!mysqli_query($conn,$sql)){
            return false;
        }else{
           $sql = "SELECT medicationId FROM orderBreakDown where orderId = $orderId";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $sql = "SELECT * FROM medication WHERE medicationId =" . $row['medicationId'];
                    $orderObject->addMedicationName($row['name']);
                    $orderObject->addMedicationState($row['state']);
                    $orderObject->addMedicationUnits($row['units']);
                    $orderObject->addMedicationTime($row['time']);   
                }
            } else {
                return(false);
            }    
        }   
    }
    
    public function setCurrentView($newview) {
        $this->currentview = $newview;
        
    }
    
    public function getCurrentView() {
        return($this->currentview);
    }
}
?>