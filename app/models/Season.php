<?php

class Season {
    use Model;

    protected $table = "dynseasons";
    protected $allowedColumns = [
        'name','userid','type'
    ];
}