<?php

class PlayerStatsRecM {
    use Model;

    protected $table = "dynpstatsreceiving";
    protected $allowedColumns = [
        'schid','playerid','receptions','yards','tds'
    ];
}