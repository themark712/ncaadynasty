<?php

class CreatedTeamM {
    use Model;

    protected $table = "dyncrteams";
    protected $allowedColumns = [
        'name','mascot','location','color','confid','logo','rank'
    ];
}