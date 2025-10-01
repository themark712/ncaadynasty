<?php

class EditPlayerInfo {
    use Controller;

    public $pid;

    public function index($a="", $b="", $c="", $d="") {
        // $user = new User;
        // $arr["username"] = "testnew";
        // $arr["password"] = "newpass";
        // $arr["email"] = "newuser@test.com";
        // $result = $user->findAll();

        // show($result);
        // show($a);
        // show($b);
        // show($c);
        $this->pid = $a;
        $this->view("editplayerinfo");
    }
}