<?php

class PlayerStatsRushM {
    use Model;

    protected $table = "dynpstatsrushing";
    protected $allowedColumns = [
        'schid','playerid','rush','yards','tds'
    ];
}