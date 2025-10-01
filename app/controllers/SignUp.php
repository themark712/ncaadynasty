<?php

// signup class

class SignUp {
    use Controller;
    
    public function index() {
        $this->view("signup");
    }
}