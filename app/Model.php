<?php

/*Purpose of this class is to make insert,update, or delete info to our DB 
 * 
 * This class includes methods that deal with User functions and Order functions
 */
class Model{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "medicationtracker";
    private $currentview = "";
    private $conn;
    
    function __construct($currentview) {
       $this->currentview = $currentview;
    }
   
  
    //Adds the order a Doctor makes to the DB
    public function createOrder($order_id,$order_creationdate,$doctor_id,$patient_id,$med_id,$med_type, $med_qty, $med_unit){

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        //INclude ordercreationdate in 
        $sql = "INSERT INTO order(order_id,doctor_id, patient_id, caregiver_id,order_creationdate) values('$order_id''$doctor_id', '$patient_id',
         '00000',$order_creationdate)";

         //Add a Loop for each medication to be entered for 1 single orderID
         //adminster_time can be left as optional right?
        $sql = "INSERT INTO break_down(order_id,medication_id,med_ quantity,) values('$order_id', '$med_id', '$med_qty')";
        
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }

    public function addUser($first, $last, $role, $active) {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "INSERT INTO user(first, last, role, active) values('$first', '$last', '$role', '$active')";
        
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    public function removeUser($user_id) {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE user SET  active = 0 WHERE user_id = $user_id";
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    public function updateUserFirst($user_id, $first) {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE user SET  first = '$first' WHERE user_id = $user_id";
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    
    public function updateUserLast($user_id, $last) {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE user SET  last = '$last' WHERE user_id = $user_id";
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    
    public function updateUserRole($user_id, $role) {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        $sql = "UPDATE user SET  role = '$role' WHERE user_id = $user_id";
        if(!mysqli_query($this->conn, $sql)){
            return false;
        }else{
            return true;    
        }
    }
    
    public function setCurrentView($newview) {
        $this->currentview = $newview;
        
    }
    
    public function getCurrentView() {
        return($this->currentview);
    }
}

$md = new Model("LoginView");
$result = $md->addUser("John", "mike", "nurse", 1);
$result = $md->removeUser(3);
$result = $md->updateUserFirst(1, "Johnathan");
$result = $md->getCurrentView();

echo $result;
?>
