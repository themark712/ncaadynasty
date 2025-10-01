<?php

class EditRoster {
    use Controller;

    public $tid;
    public $pid;
    public $m;

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
        $this->tid=$a;
        $this->pid=$b;
        $this->m=$c;
        $this->view("editroster");
    }
}