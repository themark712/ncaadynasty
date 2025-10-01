<?php

class PlayerStatsTOM {
    use Model;

    protected $table = "dynpstatsturnovers";
    protected $allowedColumns = [
        'schid','playerid','interceptions','fumbles', 'fumbleslost'
    ];
}