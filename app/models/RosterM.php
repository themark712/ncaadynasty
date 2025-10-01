<?php

class RosterM {
    use Model;

    protected $table = "dynroster";
    protected $allowedColumns = [
        'teamid','fname','lname','number','position','year','isredshirt','seasonid','OVR'
    ];
}