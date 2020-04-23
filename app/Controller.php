<?php

include_once("Globals.php");

include_once("Model.php");
class Controller{

    public function __construct() { }
    
    
    public function authenticateAdmin($input_name, $input_pin){
        global $model;
        
        $result = $model->authenticateAdmin($input_name, $input_pin);
        
        if ($result == 1){
          $model->setCurrentView("AdminDashboardView");
        }else{
          $model->setCurrentView("AdminLoginView");
        }
    }
    
    public function addDoctorUser($user_name, $pin, $first, $last, $active) { 
        $model = Model::getInstance();
        $model->addDoctorUser($user_name, $pin, $first, $last, $active);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function removeDoctorUser($user_name) {
        $model = Model::getInstance();
        $model->removeDoctorUser($user_name);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function activateDoctorUser($user_name) {
        $model = Model::getInstance();
        $model->activateDoctorUser($user_name);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active) { 
        $model = Model::getInstance();
        $model->addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function removePatientUser($user_name) {
        $model = Model::getInstance();
        $model->removePatientUser($user_name);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function activatePatientUser($user_name) {
        $model = Model::getInstance();
        $model->activatePatientUser($user_name);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function addCaregiverUser($user_name, $pin, $first, $last, $is_nurse, $active){ 
        $model = Model::getInstance();
        $model->addCaregiverUser($user_name, $pin, $first, $last, $is_nurse, $active);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function removeCaregiverUser($user_name) {
        $model = Model::getInstance();
        $model->removeCaregiverUser($user_name);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function activateCaregiverUser($user_name) {
        $model = Model::getInstance();
        $model->activateCaregiverUser($user_name);
        $model->setCurrentView("AdminDashboardView");
    }
    
    public function changeView($viewName) {
        if($viewName == "AdminLoginView"){
            $model->setCurrentView("AdminLoginView");     
        }else if($viewName == "HomeView"){
            $model->setCurrentView("HomeView");
        }else if($viewName == "AdminDashboardView"){
            $model->setCurrentView("AdminDashboardView");
        }else if($viewName == "DoctorDisplaysOrders"){
            $model->setCurrentView("DoctorDisplaysOrders");
        }else{}
    }
}

?>

