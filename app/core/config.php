<?php

if ($_SERVER["SERVER_NAME"] == "localhost") {
    // Database config
    define("DBNAME", "1576537_mydb");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    
    define("ROOT", "http://localhost/ncaadynasty/public");
} else {
    // Database config
    define("DBNAME", "1576537_mydb");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    
    // production root
    define("ROOT", "https://www.mywebsite.com");
}

define("APP_NAME", "NCAA Football Pickem");
define("APP_DESC", "Online college football picks game");
define("IMAGE_DIR","assets/img/users/");

// true means show errors
define("DEBUG", true);

const PASSINGSTATS = array('completions', 'attempts', 'yards', 'tds');
const RUSHINGSTATS = array('rush', 'yards', 'tds');
const RECEIVINGSTATS = array('receptions', 'yards', 'tds');
const DEFENSESTATS = array('tackles', 'tfl', 'sacks', 'forcedfumbles','fumblerecoveries', 'tds');
const TURNOVERSTATS = array('interceptions','fumbles','fumbleslost');
