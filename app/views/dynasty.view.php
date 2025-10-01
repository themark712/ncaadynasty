<?php
if (!isUserLoggedIn()) {
    redirect(ROOT . "/signin");
}

$_SESSION["dyn"] = $this->id;

$hero_title = "Dynasty Home";
$hero_text = "";

include 'include/header.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $season = new Season;
    $aryn["dynastyid"] = $this->id;
    $aryn["teamid"] = $_POST["teamid"];
    $aryn["year"] = $_POST["year"];
    $result = $season->insert($aryn);
}

$e = "";
if (isset($_REQUEST["e"])) {
    $e = $_REQUEST["e"];
}

// get teams for select list
$queryt = "SELECT * FROM dynteams ";
$queryt .= " ORDER BY name";

$teams = new Team;
$result = $teams->findAll($queryt);

$list = "<select class='form-select' name='teamid'>";
$list .= "<option value='-select team-'></option>";

foreach ($result as $a => $b) {
    $list .= "<option value='" . $b->id . "'>" . $b->name . "</option>";
}
$list .= "</select>";

$dynastyname = getDynastyName($this->id);

$season = new Season;
$querys = "SELECT d.name AS dynasty,s.id, s.year, t.id as tid, t.name as team, t.logo, t.color ";
$querys .= "FROM dynseasons s  ";
$querys .= "  LEFT JOIN dynteams t ON s.teamid=t.id  ";
$querys .= "  LEFT JOIN dynasty d ON d.id=s.dynastyid  ";
$querys .= "WHERE s.dynastyid=" . $this->id;
//echo $querys;
$result = $season->findAll($querys);

$logo = "";
$bgcolor = "";
$teamid = "";

if ($result) {
    foreach ($result as $x => $y) {
        $logo = $y->logo;
        $bgcolor = $y->color;
        $teamid = $y->tid;
    }
} else {
    $e .= "Team not found";
}

// get latest article
$querya = "SELECT * FROM dynarticles WHERE dynastyid=" . $_SESSION["dyn"] . " ORDER BY created DESC LIMIT 1";
$art = new ArticleM;
$result = $art->findAll($querya);
$latestart = "";

if ($result) {
    foreach ($result as $a => $b) {
        $latestart .= "<h6 class='display-7'>" . $b->title . "</h6>";
        $latestart .= "<p class='m-0 p-0'>" . $b->created . "</p>";
        $latestart .= "<p>" . $b->content . "</p>";
    }
}

// get schedule
$sch = new ScheduleM;
$querys = "SELECT s.id, s.homeid, s.awayid, s.gamedate, th.name as home, ta.name as away, s.hscore, s.ascore  ";
$querys .= "FROM dynsch s  ";
$querys .= "  LEFT JOIN dynteams th ON s.homeid=th.id  ";
$querys .= "  LEFT JOIN dynteams ta ON s.awayid=ta.id  ";
$querys .= "WHERE (s.awayid=" . $teamid . " OR s.homeid=" . $teamid . ") ORDER BY gamedate";
$result = $sch->findAll($querys);
$schedule = "";
$displaydate = "";
if ($result) {
    foreach ($result as $a => $b) {
        $phpdate = strtotime( $b->gamedate );
        $displaydate = date( 'm/d/Y', $phpdate );
        if ($b->homeid == $teamid) {
            $schedule .= $displaydate . " - " . $b->away . "(" . $b->hscore . "-" . $b->ascore . ")<br>";
        }
        if ($b->awayid == $teamid) {
            $schedule .= $displaydate . " - " . "@ " . $b->home . "(" . $b->ascore . "-" . $b->hscore . ")<br>";
        }
    }
}
?>
<section style="padding-top:8px;margin-bottom:0px;">
    <div class="container-fluid mx-3">

        <div class="row mb-3 me-3">
            <div class="col-12 d-flex py-2" style="background-color:#<?= $bgcolor ?>">
                <img src="<?= ROOT ?>/assets/images/logos/<?= $logo ?>.png" class="img-sm me-2">
                <h5 class="my-auto"><?= $dynastyname ?></h5>
                <p class="text-danger"><?php echo $e; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-sm-12 border-end">
                <div class="row mb-3">
                    <div class="col-12">
                        <h3>Lastest News</h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <?php echo $latestart; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12 ps-2 small" style="line-height: 20px;">
                <h3>Schedule</h3>
                <?=$schedule?>
            </div>
        </div>
    </div>
</section>
<?php include 'include/footer.php' ?>