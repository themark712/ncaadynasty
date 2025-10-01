<?php

class ArticleM {
    use Model;

    protected $table = "dynarticles";
    protected $allowedColumns = [
        'dynastyid','create','title'.'content','week'
    ];
}