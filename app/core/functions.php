<?php

function show($stuff)
{
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str)
{
    return htmlspecialchars($str);
}

function redirect($page)
{
    header('Location: ' . ROOT . "/" . $page);
    die;
}

function isUserLoggedIn()
{
    $bool = true;

    if (isset($_SESSION["userid"])) {
        if ($_SESSION["userid"] == "") {
            $bool = false;
        }
    } else {
        $bool = false;
    }

    return $bool;
}

function getDynastyOwner($dynid)
{
    $userid = 0;

    $dyn = new DynastyM;
    $aryd["id"] = $dynid;
    $result = $dyn->first($aryd);

    if ($result) {
        $userid = $result->userid;
    }

    return $userid;
}

function getDynastyName($id) {
    $name="";
    $dyn = new DynastyM;
    $aryd["id"]=$id;
    $result=$dyn->first($aryd);

    if ($result) {
        $name = $result->name;
    }

    return $name;
}

function readHTML($file)
{
    $html = file_get_contents($file);
    $lines = preg_split("/\r\n|\n|\r/", $html);
    $read = false;
    $firstline = str_replace("https://www.cbssports.com/college-football/teams/", "", $file);
    $firstline = str_replace("/roster/", "", $firstline);

    $content = $firstline;

    foreach ($lines as $line) {
        if (strpos($line, "Page-colMain") > 0) {
            $read = true;
        }
        if (strpos($line, "Page-colSecondary") > 0) {
            $read = false;
        }
        if ($read && strpos($line, "Shoulder") < 1 && strpos($line, "Undisclosed") < 1  && strpos($line, "Hip") < 1 && strpos($line, "Concussion") < 1 && strpos($line, "Offense") < 1 && strpos($line, "Defense") < 1 && strpos($line, "Special Teams") < 1) {
            $pattern = "/ class=..>[A-z]\. [A-z]/iu";
            $line = preg_replace($pattern, "okay dokay", $line);
            $line = str_replace("Soph", "SO", $line);
            $line = str_replace("Sr", "SR", $line);
            $line = str_replace("—", "", $line);
            $content .= $line;
        }
    }
    return $content . "<hr>";
}

function old_value($key, $default = '')
{
    if (!empty($_POST[$key])) {
        return $_POST[$key];
    }
    return $default;
}
