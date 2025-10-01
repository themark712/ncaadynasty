<?php

class EditDynasty {
    use Controller;
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
        $this->id = $a;
        $this->view("editdynasty");
    }
}