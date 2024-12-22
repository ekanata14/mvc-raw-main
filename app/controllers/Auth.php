<?php

class Auth extends Controller{ // Auth class is Controller for authentication like login, register, logout, etc
    public function index(){ // function/method named index for controlling what will be shown at the view, and also you can request data from model
        // Example for requesting data from model 
        $data['user'] = $this->model("User_model")->getAllUsers();
        $this->view("templates/header");
        // After getting the data from model, put it inside the view function, take a look below this line
        $this->view("auth/login", $data); // If you have more than one $data['example'] variable, you don't have to write it all on the view function, just write $data, and your all datas will be included
        $this->view("templates/footer");       
    }

    public function register(){
        $this->view("templates/header");
        $this->view("auth/register");
        $this->view("templates/footer");
    }

    public function login(){
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin'){
            header("Location: " . BASE_URL . "/admin");
        } else{
            $user = $this->model("User_model")->getUserByUsername($_POST['username']);
            if($this->model("User_model")->authByUsername($_POST) > 0){
                if($user['role'] == '1'){
                    header("Location: " . BASE_URL . "/petugas");
                } else{
                    header("Location: " . BASE_URL . "/home");
                }
            } else{
                header("Location: ". BASE_URL . "/auth");
            }
        }
    }

    public function regisUser(){
        if($this->model("User_model")->addUser($_POST) > 0){
            header("Location: " . BASE_URL . "/login");
        } else{
            header("Location: ". BASE_URL . "/auth");
        }
    }

    public function logout(){
        session_unset();
        session_destroy();
        header("Location: " . BASE_URL . "/auth/login");
    }
}