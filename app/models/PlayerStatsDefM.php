<?php

class PlayerStatsDefM {
    use Model;

    protected $table = "dynpstatsdefense";
    protected $allowedColumns = [
        'schid','playerid','tackles','tfl','forcedfumbles', 'fumblerecoveries','tds'
    ];
}