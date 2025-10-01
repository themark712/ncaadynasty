<?php

class ScheduleM {
    use Model;

    protected $table = "dynsch";
    protected $allowedColumns = [
        'seasonid','hid','aid','hscore','ascore','location','gamedate'
    ];
}