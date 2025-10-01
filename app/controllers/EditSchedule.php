<?php

class EditSchedule {
    use Controller;

    public $t;
    public $m;
    public $id;

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
        $this->id=$a;
        $this->t=$b;
        $this->m=$c;
        $this->view("editschedule");
    }
}