<?php

class GameStatsM {
    use Model;

    protected $table = "dyngamestats";
    protected $allowedColumns = [
        'schid','teamid','name','category','value',
    ];
}