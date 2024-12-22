<?php

class Petugas extends Controller{
    public function index(){
        $this->view("templates/header");
        $this->view("petugas/index");
        $this->view("templates/footer");
    }
}