<?php

class Team {
    use Model;

    protected $table = "dynteams";
    protected $allowedColumns = [
        'name','mascot','location','color','logo','confid','rank'
    ];
}