<?php

class App{
    protected $controller = "auth"; // Controller variable, setting up your default controller file for your website
    protected $method = "index"; // Method variable, setting up your default method from controller file for your website
    protected $params = []; // Params variable

    
    public function __construct() // Construct function, it will be running when the class is instantiated
    {
        $url = $this->parseUrl(); // $url variable, a place for result that has been returned by parseURL
        if(isset($url[0])){ // Checking the url variable at index 0, whether the value exists or not (value for the controller)
            if(file_exists("../app/controllers/{$url[0]}.php")){ // Checking the controller file that named value at $url index 0
                $this->controller = $url[0]; // Input the $url index 0 value to controller variable
                unset($url[0]); // Unsetting the $url index 0 value
            }
        }

        require_once "../app/controllers/{$this->controller}.php"; // Getting the controller file
        $this->controller = new $this->controller; // Instantiating the controller class from controller file

        if(isset($url[1])){ // Checking the $url index 1 value (value for the method)
            if(method_exists($this->controller, $url[1])){ // Checking whether the method exists or not in controller file
                $this->method = $url[1]; // Insert the $url index 1 value to method variable
                unset($url[1]); // Unsetting the $url index 1 value
            }
        }

        if(!empty($url)){ // Checking if the $url value isn't empty and run the below command
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params); // Calling all the variables to be run
    }

    // Function for parsing url, it takes the url word that is separated by (/), and convert it into an array
    public function parseUrl(){
        if(isset($_GET["url"])){ // Checking the url whether it is exist or notj
            $url = rtrim($_GET["url"], "/"); // Remove the '/' character to just get the url word
            $url = filter_var($url, FILTER_SANITIZE_URL); // Remove all chars except letters, digits, and etc
            $url = explode("/", $url); // Explode function is used to breaks a string that has been got from the previous function
            return $url; // Return the $url variable as a result for parseUrl function
        }
    }
}