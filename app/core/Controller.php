<?php

class Controller{ // Class Controller for controlling your website via url that has been got from App.php class
    public function view($view, $data = []){ // View function for choosing which view do you want to show in your website pages
        require_once "../app/views/{$view}.php"; // Getting the view file from views folder
    }

    public function model($model){ // Model function for choosing which model do you want to use for requesting a data
        require_once "../app/models/{$model}.php"; // Getting the model file from models folder
        return new $model; // Return an instantiated class as the result of model function, so that you can use it on your Controller Class
    }
}