<?php
include_once("Model.php");
include_once("Globals.php");


class Controller{

    public function __construct() { }
    
    
    public function authenticateAdmin($input_name, $input_pin){
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->authenticateAdmin($input_name, $input_pin);
        
    }
    
    public function addDoctorUser($user_name, $pin, $first, $last, $active) { 
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->addDoctorUser($user_name, $pin, $first, $last, $active);
        header("Location: AdminView.php");
    }
    
    public function removeDoctorUser($user_name) {
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->removeDoctorUser($user_name);
        header("Location: AdminView.php");
    }
    
    public function activateDoctorUser($user_name) {
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->activateDoctorUser($user_name);
        header("Location: AdminView.php");
    }
    
    public function addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active) { 
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->addPatientUser($user_name, $pin, $first, $last, $date_of_birth, $active);
        header("Location: AdminView.php");
    }
    
    public function removePatientUser($user_name) {
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->removePatientUser($user_name);
        header("Location: AdminView.php");
    }
    
    public function activatePatientUser($user_name) {
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->activatePatientUser($user_name);
        header("Location: AdminView.php");
    }
    
    public function addCaregiverUser($user_name, $pin, $first, $last, $is_nurse, $active){ 
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->addCaregiverUser($user_name, $pin, $first, $last, $is_nurse, $active);
        header("Location: AdminView.php");
    }
    
    public function removeCaregiverUser($user_name) {
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->removeCaregiverUser($user_name);
        header("Location: AdminView.php");
    }
    
    public function activateCaregiverUser($user_name) {
        global $model;
        $model = new Model("AdminLoginView", -1);
        $model->activateCaregiverUser($user_name);
        header("Location: AdminView.php");
    }
    
    public function changeView($viewName) {
        global $model;
        if($viewName == "AdminLoginView"){
            $model->setCurrentView("AdminLoginView");     
        }else if($viewName == "HomeView"){
            $model->setCurrentView("HomeView");
        }else if($viewName == "AdminView"){
            $model->setCurrentView("AdminView");
        }else if($viewName == "DoctorDisplaysOrders"){
            $model->setCurrentView("DoctorDisplaysOrders");
        }else{}
    }
}



?>

