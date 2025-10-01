<?php
if (!isUserLoggedIn()) {
    redirect(ROOT . "/signin");
}

$_SESSION["dyn"] = $this->id;

if (getDynastyOwner($_SESSION["dyn"]) != $_SESSION["userid"]) {
    redirect("home");
}

$hero_title = "Dynasty Seasons";
$hero_text = "View your seasons here";

include 'include/header.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $season=new Season;
    $aryn["dynastyid"] = $this->id;
    $aryn["teamid"] = $_POST["teamid"];
    $aryn["year"] = $_POST["year"];
    $result=$season->insert($aryn);
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
$list .="</select>";

$dynastyname = getDynastyName($this->id);
$season = new Season;
$querys = "SELECT d.name AS dynasty,s.id, s.year, t.name as team FROM dynseasons s LEFT JOIN dynteams t ON s.teamid=t.id LEFT JOIN dynasty d ON d.id=s.dynastyid WHERE s.dynastyid=" . $this->id;
//echo $querys;
$result = $season->findAll($querys);

$seasons = "<table class='table table-sm'>";

if ($result) {
    foreach ($result as $x => $y) {
        $seasons .= "<tr>";
        $seasons .= "<td>" . $y->team . "</td>";
        $seasons .= "<td>" . $y->year . "</td>";
        $seasons .= "<td><a href='" . ROOT . "/rosters/" . $y->id . "'>Roster</a></td>";
        $seasons .= "<td><a href='" . ROOT . "/editschedule/" . $y->id . "'>Schedule</a></td>";
        $seasons .= "<td><a href='" . ROOT . "/editarticles/" . $y->id . "'>Articles</a></td>";
        $seasons .= "</tr>";
    }
} else {
    $e .= "No seasons found";
}
$seasons .= "</table>";
?>
<section>
<div class="container container-page mx-auto">
    <div class="row mb-1">
        <div class="col-10">
            <h2><?=$dynastyname?> - Seasons</h2>
            <p class="text-danger"><?php echo $e; ?></p>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-10">
            <?php echo $seasons; ?>
        </div>
    </div>

    <?php
    if ($_SESSION["prem"] == 1) { ?>
        <div class="row mb-1">
            <div class="col-10">
                <h4>Add Season</h4>
            </div>
            <div class="row mb-3">
                <form class="form col-10" action="<?=ROOT?>/editschedule/<?=$this->id?>" method="post">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Season Year</span>
                        <input type="text" id="year" name="year" class="form-control" placeholder="year" aria-label="year" aria-describedby="inputGroup-sizing-sm">
                        <span id="dynasty-availability-status" class="text-center ms-3" onchange="setButton()"></span>
                    </div>
                    <div class="input-group-select">
                        <?=$list?>
                    </div>
                    <div class="input-group input-group-sm mt-3">
                        <button id="create" class="btn btn-primary">Add Season</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
</section>
<?php include 'include/footer.php' ?>
