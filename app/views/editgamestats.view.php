<?php
if (!isUserLoggedIn()) {
    redirect(ROOT . "/signin");
}

if (getDynastyOwner($_SESSION["dyn"]) != $_SESSION["userid"]) {
    redirect("home");
}

$hero_title = "Game Stats";
$hero_text = "Update your games's stats here";

include 'include/header.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $dyn = new DynastyM;
    $aryn["name"] = $_POST["dynastyname"];
    $aryn["userid"] = $_SESSION["userid"];
    $result = $dyn->insert($aryn);
}

$e = "";

if (isset($_REQUEST["e"])) {
    $e = $_REQUEST["e"];
}

// initialize variables
$homeid = 0;
$awayid = 0;
$home = "";
$away = "";
$homelogo = "";
$awaylogo = "";

$homefd = "";
$homepa = 0;
$homepc = 0;
$homety = 0;
$homery = 0;
$homepy = 0;
$home3a = 0;
$home3c = 0;
$hometop = "";

$awayfd = "";
$awaypa = 0;
$awaypc = 0;
$awayty = 0;
$awayry = 0;
$awaypy = 0;
$away3a = 0;
$away3c = 0;
$awaytop = "";

$arystat = array("3rd Down Attempts", "3rd Down Conversions", "Attempts", "Completions", "First Downs", "Pass Yards", "Rush Yards", "Time of Possession");

// get home team
$teams = new Team;
$queryt = "SELECT id, name, logo FROM dynteams WHERE id IN (SELECT homeid FROM dynsch WHERE id=" . $this->sid . ")";
$resultt = $teams->findAll($queryt);
if ($resultt) {
    foreach ($resultt as $x => $y) {
        $homeid = $y->id;
        $home = $y->name;
        $homelogo = $y->logo;
    }
}
// get away team
$teams = new Team;
$queryt = "SELECT id, name, logo FROM dynteams WHERE id IN (SELECT awayid FROM dynsch WHERE id=" . $this->sid . ")";
$resultt = $teams->findAll($queryt);
if ($resultt) {
    foreach ($resultt as $x => $y) {
        $awayid = $y->id;
        $away = $y->name;
        $awaylogo = $y->logo;
    }
}
$stats = new GameStatsM;
$query = "SELECT * ";
$query .= " FROM dyngamestats ";
$query .= " WHERE schid=" . $this->sid . " ORDER BY teamid, name";
$result = $stats->findAll($query);

if ($result) {
    foreach ($result as $x => $y) {
        if ($y->teamid == $homeid) {
            switch ($y->name) {
                case "First Downs":
                    $homefd = $y->value;
                    break;
                case "Attempts":
                    $homepa = $y->value;
                    break;
                case "Completions":
                    $homepc = $y->value;
                    break;
                case "Pass Yards":
                    $homepy = $y->value;
                    break;
                case "Rush Yards":
                    $homery = $y->value;
                    break;
                case "3rd Down Attempts":
                    $home3a = $y->value;
                    break;
                case "3rd Down Conversions":
                    $home3c = $y->value;
                    break;
                case "Time of Possession":
                    $hometop = $y->value;
                    break;
            }
        }
        if ($y->teamid == $awayid) {
            switch ($y->name) {
                case "First Downs":
                    $awayfd = $y->value;
                    break;
                case "Attempts":
                    $awaypa = $y->value;
                    break;
                case "Completions":
                    $awaypc = $y->value;
                    break;
                case "Pass Yards":
                    $awaypy = $y->value;
                    break;
                case "Rush Yards":
                    $awayry = $y->value;
                    break;
                case "3rd Down Attempts":
                    $away3a = $y->value;
                    break;
                case "3rd Down Conversions":
                    $away3c = $y->value;
                    break;
                case "Time of Possession":
                    $awaytop = $y->value;
                    break;
            }
        }
    }
    $homety=$homepy + $homery;
    $awayty=$awaypy + $awayry;
    
} else {
    $statsa = new GameStatsM;

    foreach ($arystat as $o => $s) {
        $arya["schid"] = $this->sid;
        $arya["teamid"] = $homeid;
        $arya["category"] = "";
        $arya["name"] = $s;
        $arya["value"] = '0';
        $resulta = $statsa->insert($arya);
    }

    foreach ($arystat as $o => $s) {
        $arya["schid"] = $this->sid;
        $arya["teamid"] = $awayid;
        $arya["category"] = "";
        $arya["name"] = $s;
        $arya["value"] = '0';
        $resulta = $statsa->insert($arya);
    }
}
//$list .= "</table>";
?>
<section>
    <div class="container container-page mx-auto">
        <div class="row mb-1">
            <div class="col-10">
                <h2>Game Stats</h2>
                <p class="text-danger"><?php echo $e; ?></p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <div class="row h-10 mb-2">
                    <div class="col-12 text-end"><img class="rounded-circle img-md me-2" src="<?=ROOT?>/assets/images/logos/<?= $awaylogo ?>.png"><?= $away ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-end"><?= $awayfd ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-end"><?= $awayry ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-end"><?= $awaypy ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-end"><?= $awayty ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-end"><?= $awaypc ?>/<?= $awaypa ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-end"><?= $away3c ?>/<?= $away3a ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-end"><?= $awaytop ?></div>
                </div>
            </div>
            <div class="col-4">
                <div class="row h-10 mb-2">
                    <div class="col-12 text-center">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Score</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">First Downs</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Total Offense</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Rushes | Yards | TDs</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Yards Per Rush</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Comp | Att | TDs</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Yards Per Pass</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Pass Yards</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">3rd Down Conv</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">4th Down Conv</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">2 Pt Conv</div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">Time of Possession</div>
                </div>
            </div>
            <div class="col-4">
                <div class="row h-10 mb-2">
                    <div class="col-12 text-start"><?= $home ?><img class="rounded-circle img-md ms-2" src="<?=ROOT?>/assets/images/logos/<?= $homelogo ?>.png"></div>
                </div>
                <div class="row">
                    <div class="col-12 text-start"><?= $homefd ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-start"><?= $homery ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-start"><?= $homepy ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-start"><?= $homety ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-start"><?= $homepc ?>/<?= $homepa ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-start"><?= $home3c ?>/<?= $home3a ?></div>
                </div>
                <div class="row">
                    <div class="col-12 text-start"><?= $hometop ?></div>
                </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php include 'include/footer.php' ?>