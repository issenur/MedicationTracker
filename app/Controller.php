<?php
include_once("Model.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "medicationtracker";
$conn = new mysqli($servername, $username, $password, $dbname);
$message = "";
$md = new Model("LoginView", 0);
class Controller{

   
    
    function __construct() { }
    
    public function authenticateAdmin($uname, $pin_submitted){        
       
        global $md;
        global $conn;
        global $message;
        $sql = "SELECT * from admin WHERE username = '$uname'";
        $result = $conn->query($sql);
        $row = $result -> fetch_array();
        $real_pin = $row['pin'];
        
        if($pin_submitted == $real_pin){
            $md->setCurrentView("AdminView");
            
        }else{
             $message = "Invalid username or password!";  
        }
    }
    
    
    public function changeView($viewName) {
        global $md;
        if($viewName == "AdminLoginView"){
             $md->setCurrentView("AdminLoginView");     
        }else if($viewName == "HomeView"){
             $md->setCurrentView("HomeView");
        }else if($viewName == "AdminView"){
          $md->setCurrentView("AdminView");
        }else if($viewName == "DoctorDisplaysOrders"){
          $md->setCurrentView("DoctorDisplaysOrders");
        }else{
            
        }
    }
}

//$md = new Model("LoginView", 0);

//$result = $md->getCurrentView();
//echo $result;
//$result = $md->addDoctorUser("DocJohnson", 8980, "Mitchell", "Johnson", 1);
//echo $result;
//$result = $md->removeDoctorUser("JoseNunez", 34);
//echo $result;
//$result = $md->addPatientUser("TyroneFFF", 1234, "Tyrone", "Taylor", '1985-08-27', 1);
//echo $result;
//$result = $md->removePatientUser("Billy6000", 2);
//$result = $md->addCareGiverUser("SeanCarter", 0003, "Sean", "Carter", 1, 1);
//$result = $md->removePatientUser("IkeMink2019", 2);
//echo $result;

?>

