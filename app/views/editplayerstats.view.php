<?php
if (!isUserLoggedIn()) {
    redirect(ROOT . "/signin");
}

if (getDynastyOwner($_SESSION["dyn"]) != $_SESSION["userid"]) {
    redirect("home");
}

$hero_title = "Player Stats";
$hero_text = "Update your games's player stats here";

$e = "";

// return stats model and list based on category sent in url
$statlist = "";
$statsmodel = "";

if ($this->cid == "Passing") {
    $statlist = PASSINGSTATS;
    $statsmodel = new PlayerStatsPassM;
}

if ($this->cid == "Rushing") {
    $statlist = RUSHINGSTATS;
    $statsmodel = new PlayerStatsRushM;
}

if ($this->cid == "Receiving") {
    $statlist = RECEIVINGSTATS;
    $statsmodel = new PlayerStatsRecM;
}

if ($this->cid == "Defense") {
    $statlist = DEFENSESTATS;
    $statsmodel = new PlayerStatsDefM;
}

if ($this->cid == "Turnovers") {
    $statlist = TURNOVERSTATS;
    $statsmodel = new PlayerStatsTOM;
}

// update stats
if ($this->m == "u") {
    $aryu["playerid"] = $_POST["pid"];
    foreach ($statlist as $p => $q) {
        $aryu[$q] = $_POST[$q];
    }
    print_r($aryu);
    $statsmodel->update($_POST["id"], $aryu);
    redirect("editplayerstats/" . $this->sid . "/" . $this->cid);
}

// delete player stat line
if ($this->m == "d") {
    $statsmodel->delete($this->pid);
    redirect("editplayerstats/" . $this->sid . "/" . $this->cid);
}

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

// get player lists - away offense
$awayplisto = "";
$awayplistd = "";
$playersao = new RosterM;
$queryp = "SELECT * FROM dynroster WHERE teamid=" . $awayid . " ORDER BY CASE WHEN position='QB' THEN 0 WHEN position='RB' THEN 1 WHEN position='WR' THEN 2 WHEN position='TE' THEN 3 ELSE 99 END, lname";
$resulta = $playersao->findall($queryp);
$awayplisto = "<option value=''>-select-</option>";
if ($resulta) {
    foreach ($resulta as $x => $y) {
        $awayplisto .= "<option value='" . $y->id . "'>" . $y->lname . ", " . $y->fname . "</option>>";
    }
}
// get player lists -away defense
$playersad = new RosterM;
$queryp = "SELECT * FROM dynroster WHERE teamid=" . $awayid . " ORDER BY CASE WHEN position='DE' THEN 0 WHEN position='DT' THEN 1 WHEN position='DL' THEN 2 WHEN position='LB' THEN 3 WHEN position='CB' THEN 2 WHEN position='S' THEN 2 ELSE 99 END, lname";
$resulta = $playersad->findall($queryp);

if ($resulta) {
    foreach ($resulta as $x => $y) {
        $awayplistd .= "<option value='" . $y->id . "'>" . $y->lname . ", " . $y->fname . "</option>>";
    }
}
// get player lists - home offense
$homeplisto = "";
$homeplistd = "";

$playersao = new RosterM;
$queryp = "SELECT * FROM dynroster WHERE teamid=" . $homeid . " ORDER BY CASE WHEN position='QB' THEN 0 WHEN position='RB' THEN 1 WHEN position='WR' THEN 2 WHEN position='TE' THEN 3 ELSE 99 END, lname";
$resulta = $playersao->findall($queryp);

if ($resulta) {
    foreach ($resulta as $x => $y) {
        $homeplisto .= "<option value='" . $y->id . "'>" . $y->lname . ", " . $y->fname . "</option>>";
    }
}
// get player lists -home defense
$playersad = new RosterM;
$queryp = "SELECT * FROM dynroster WHERE teamid=" . $homeid . " ORDER BY CASE WHEN position='DE' THEN 0 WHEN position='DT' THEN 1 WHEN position='DL' THEN 2 WHEN position='LB' THEN 3 WHEN position='CB' THEN 2 WHEN position='S' THEN 2 ELSE 99 END, lname";
$resulta = $playersad->findall($queryp);

if ($resulta) {
    foreach ($resulta as $x => $y) {
        $homeplistd .= "<option value='" . $y->id . "'>" . $y->lname . ", " . $y->fname . "</option>>";
    }
}

$tid = 0;

if (isset($_REQUEST["tid"])) {
    $tid = $_REQUEST["tid"];
}
$offenselist = "";
$defenselist = "";
$logo = "";

if ($tid == $homeid) {
    $offenselist = $homeplisto;
    $defenselist = $homeplistd;
    $logo = $homelogo;
}

if ($tid == $awayid) {
    $offenselist = $awayplisto;
    $defenselist = $awayplistd;
    $logo = $awaylogo;
}

// insert from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arya["schid"] = $this->sid;
    $arya["playerid"] = $_POST["playerid"];

    foreach ($statlist as $p => $q) {
        $arya[$q] = $_POST[$q];
    }

    $result = $statsmodel->insert($arya);
    redirect("editplayerstats/" . $this->sid . "/" . $this->cid . "&tid=" . $tid);
}


if ($statsmodel != "") {
    // get stats by category passed in url
    $query = "SELECT s.*, r.fname as fname, r.lname as lname ";
    $query .= "FROM dynpstats" . $this->cid . "  s ";
    $query .= "  LEFT JOIN dynroster r ON s.playerid=r.id ";
    $query .= "WHERE s.schid=" . $this->sid . " ";
    $query .= " AND s.playerid IN (SELECT id FROM dynroster WHERE teamid=" . $tid . ") ";
    $query .= "ORDER BY s.playerid";
    //echo $query;

    $result = $statsmodel->findAll($query);
    $list = "";

    if ($result) {
        foreach ($result as $x => $y) {
            $list .= "<form name='update' class='row w-100 row-cols-sm-auto small-st' action='" . ROOT . "/editplayerstats/" . $this->sid . "/Passing/u/" . $y->playerid . "' method='post'>";
            $list .= "<input type='hidden' name='id' value='" . $y->id . "'>";
            $list .= "<div class='col-2 w-25'><select name='pid'>" . str_replace("value='" . $y->playerid . "'", "value='" . $y->playerid . "' selected", $offenselist) . "</select></div>";
            foreach ($statlist as $p => $q) {
                $list .= "<div class='col-2 w-10'><input type='text' class='list ms-2' style='width:30px' name='" . $q . "' value='" . $y->$q  . "' /></div>";
            }
            $list .= "<div class='col-2 w-10'>";
            $list .= "<button type='submit' class='btn btn-primary btn-small float-right me-2'>U</button>";
            $list .= "<a href='" . ROOT . "/editplayerstats/" . $this->sid . "/Passing/d/" . $y->id . "' class='btn btn-danger btn-small float-left'>D</a>";
            $list .= "</div>";
            $list .= "</form>";
        }
    }
}
// stats file import
$file = ROOT . "/assets/files/offense.txt";
$contents = file_get_contents($file);
$lines = explode("\n", $contents); // this is your array of words

foreach ($lines as $word) {
    if (trim($word) != ""  && !strpos($word, "-ID")  &&  !strpos($word, "IGNORE")) {
        $stats = explode(',', $word);

        $playerid = $stats[0];
        $statr = new PlayerStatsRushM;
        $ary["schid"] = $this->sid;
        $ary["playerid"] = $stats[0];
        $ary["rush"] = $stats[3];
        $ary["yards"] = $stats[4];
        //$result=$statr->insert[$ary];
    }
}

include 'include/header.php';
?>
<section>
    <div class="container container-page mx-auto">
        <div class="row mb-2">
            <div class="col-3">
                <h2>Player Stats</h2>
            </div>
            <div class="col-7 my-auto">
                <?= $away ?> @ <?= $home ?>
            </div>
        </div>
        <div class="row small mb-3">
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Passing&tid=<?= $awayid ?>"><?= $away ?> Passing</a></div>
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Passing&tid=<?= $homeid ?>"><?= $home ?> Passing</a></div>
        </div>
        <?php if ($this->cid == "Passing") {
            include "include/passtable.php";
        } ?>
        <div class="row small mb-3">
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Rushing&tid=<?= $awayid ?>"><?= $away ?> Rushing</a></div>
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Rushing&tid=<?= $homeid ?>"><?= $home ?> Rushing</a></div>
        </div>
        <?php if ($this->cid == "Rushing") {
            include "include/rushtable.php";
        } ?>
        <div class="row small mb-3">
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Receiving&tid=<?= $awayid ?>"><?= $away ?> Receiving</a></div>
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Receiving&tid=<?= $homeid ?>"><?= $home ?> Receiving</a></div>
        </div>
        <?php if ($this->cid == "Receving") {
            include "include/receivingtable.php";
        } ?>
        <div class="row small mb-3 ">
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Defense&tid=<?= $awayid ?>"><?= $away ?> Defense</a></div>
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Defense&tid=<?= $homeid ?>"><?= $home ?> Defense</a></div>
        </div>
        <?php if ($this->cid == "Defense") {
            include "include/defensetable.php";
        } ?>
        <div class="row small mb-3">
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Turnovers&tid=<?= $awayid ?>"><?= $away ?> Turnovers</a></div>
            <div class="col-3"><a href="<?= ROOT ?>/editplayerstats/<?= $this->sid ?>/Turnovers&tid=<?= $homeid ?>"><?= $home ?> Turnovers</a></div>
        </div>
        <?php if ($this->cid == "Turnovers") {
            include "include/totable.php";
        } ?>
    </div>
</section>
<?php include 'include/footer.php' ?>