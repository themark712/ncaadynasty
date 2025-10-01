<?php

class SignIn {
    use Controller;

    public function index($a="", $b="", $c="") {
        //echo "This is the teams controller ";
        $this->view("signin");
    }
}