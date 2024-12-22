<?php

class Home extends Controller{ // It's not much different from the Auth Controller
    public function index(){
        $this->view("templates/header");
        $this->view("home/index");
        $this->view("templates/footer");
    }
}