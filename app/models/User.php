<?php

class User {
    use Model;

    protected $table = "dynuser";
    protected $allowedColumns = [
        'username','password','email','phone','isadmin'
    ];
}