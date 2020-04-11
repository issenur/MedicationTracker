<?php

include_once("Globals.php");


class Controller{

    public function __construct() { }
    
    
    public function authenticateAdmin($input_name, $input_pin){
        global $model;
        
        $result = $model->authenticateAdmin($input_name, $input_pin);
        
        if ($result == 1){
          $model->setCurrentView("AdminDashboard");
        }else{
          $model->setCurrentView("AdminLoginView");
        }
    }
    
    public function addDoctorUser($user_name, $pin, $first, $last, $active) { 
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(1);
        $model->addDoctorUser($user_name, $pin, $first, $last, $active);
    }
    
    public function removeDoctorUser($user_name) {
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(1);
        $model->removeDoctorUser($user_name);
    }
    
    public function activateDoctorUser($user_name) {
        global $model;
        $model->activateDoctorUser($user_name);
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(1);
        
    }
    
    public function addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active) { 
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(2);
        $model->addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active);
    }
    
    public function removePatientUser($user_name) {
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(2);
        $model->removePatientUser($user_name);
    }
    
    public function activatePatientUser($user_name) {
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(2);
        $model->activatePatientUser($user_name);
    }
    
    public function addCaregiverUser($user_name, $pin, $first, $last, $is_nurse, $active){ 
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(3);
        $model->addCaregiverUser($user_name, $pin, $first, $last, $is_nurse, $active);
    }
    
    public function removeCaregiverUser($user_name) {
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(3);
        $model->removeCaregiverUser($user_name);
    }
    
    public function activateCaregiverUser($user_name) {
        global $model;
        $model->setCurrentView("AdminDashboard");
        $model->setCurrentAuthorizationLevel(3);
        $model->activateCaregiverUser($user_name);
    }
    
    public function changeView($viewName) {
        global $model;
        if($viewName == "AdminLoginView"){
            $model->setCurrentView("AdminLoginView");     
        }else if($viewName == "HomeView"){
            $model->setCurrentView("HomeView");
        }else if($viewName == "AdminDashboard"){
            $model->setCurrentView("AdminDashboard");
        }else if($viewName == "DoctorDisplaysOrders"){
            $model->setCurrentView("DoctorDisplaysOrders");
        }else{}
    }
}

?>

