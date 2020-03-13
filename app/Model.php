<?php

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
  
