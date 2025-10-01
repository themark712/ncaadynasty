<?php

class DynastyM {
    use Model;

    protected $table = "dynasty";
    protected $allowedColumns = [
        'name','userid','type'
    ];
}