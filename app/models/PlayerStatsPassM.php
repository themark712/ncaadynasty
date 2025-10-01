<?php

class PlayerStatsPassM {
    use Model;

    protected $table = "dynpstatspassing";
    protected $allowedColumns = [
        'schid','playerid','attempts','completions','yards','tds'
    ];
}