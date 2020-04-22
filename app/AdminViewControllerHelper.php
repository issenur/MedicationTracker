<?php
    
    include_once("Globals.php");
    global $controller;
    
    if(isset($_GET["logout"])){
      header("Location: index.php");
        
    }
    
   
    
    if(isset($_POST["enter"])){
        
        if($_POST["username"] == "" || $pin = $_POST["pin"]){
            //header("Location: AdminLoginView.php");
        }
      
        
        $username = $_POST["username"];
        $pin = $_POST["pin"];
        $controller->authenticateAdmin($username, $pin);
    }
    
    if(isset($_GET['delete_doctor'])){
        
         $user_name = $_GET['delete_doctor'];
         $controller->removeDoctorUser($user_name);
    }
    
   if(isset($_GET['delete_patient'])){
         $user_name = $_GET['delete_patient'];
         $controller->removePatientUser($user_name);
    }  
    
    if(isset($_GET['delete_care_giver'])){
         $user_name = $_GET['delete_care_giver'];
         $controller->removeCaregiverUser($user_name);
    }
    
    if(isset($_GET['activate_doctor'])){
        
         $user_name = $_GET['activate_doctor'];
         $controller->activateDoctorUser($user_name);
    }
    
   if(isset($_GET['activate_patient'])){
         $user_name = $_GET['activate_patient'];
         $controller->activatePatientUser($user_name);
    }  
    
    if(isset($_GET['activate_care_giver'])){
         $user_name = $_GET['activate_care_giver'];
         $controller->activateCaregiverUser($user_name);
    }  
     
?>