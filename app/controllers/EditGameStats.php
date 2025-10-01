<?php

class EditGameStats {
    use Controller;

    public $sid;

    public function index($a="", $b="", $c="") {
        // $user = new User;
        // $arr["username"] = "testnew";
        // $arr["password"] = "newpass";
        // $arr["email"] = "newuser@test.com";
        // $result = $user->findAll();

        // show($result);
        // show($a);
        // show($b);
        // show($c);
        $this->sid = $a;
        $this->view("editgamestats");
    }
}