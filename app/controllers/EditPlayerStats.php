<?php

class EditPlayerStats {
    use Controller;

    public $sid;
    public $cid;
    public $m;
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
        $this->sid = $a;
        $this->cid = $b;
        $this->m = $c;
        $this->pid = $d;
        $this->view("editplayerstats");
    }
}