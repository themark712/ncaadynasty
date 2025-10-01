<?php
if (!isUserLoggedIn()) {
    redirect("signin");
}

if (getDynastyOwner($_SESSION["dyn"]) != $_SESSION["userid"]) {
    redirect("home");
}

$e = "";
$hero_title = "Dynasty - Schedule";
$hero_text = "Complete slate of games by week";

include 'include/header.php';

$t = "";

if (isset($this->t)) {
    $t = $this->t;
}

if ($t == "") {
    $team = new Team;
    $query = "SELECT t.id AS tid FROM dynteams t LEFT JOIN dynseasons s ON t.id=s.teamid WHERE s.id=" . $this->id;
    $result = $team->findAll($query);
    //echo $query;
    if ($result) {
        foreach ($result as $x => $y) {
            $t = $y->tid;
            $this->t = $t;
        }
    }
}

$m = "";
if (isset($this->m)) {
    $m = $this->m;
}

$s = "";
if (isset($this->s)) {
    $s = $this->s;
}

$table = "";
$conflist = "";

if ($t != "") {

    if ($m != "") {
        $sch = new ScheduleM;

        if ($m == "a") {
            // add game
            $arya["week"] = $_POST["week"];
            $arya["gamedate"] = $_POST["date"];
            $arya["location"] = $_POST["location"];
            $arya["homeid"] = $_POST["home"];
            $arya["awayid"] = $_POST["away"];
            $arya["hscore"] = $_POST["hscore"];
            $arya["ascore"] = $_POST["ascore"];
            $sch->insert($arya);
        }
        if ($m == "u") {
            // update game
            $id = $_POST["sid"];
            $aryu["date"] = $_POST["date"];
            $aryu["hscore"] = $_POST["hscore"];
            $aryu["ascore"] = $_POST["ascore"];
            $sch->update($id, $aryu);
        }

        if ($m == "d") {
            // delete game
            $sch->delete($s);
        }
    }

    // get week's games
    $querys = "SELECT s.id as sid, s.week as week, s.gamedate as date, s.ascore as ascore, ";
    $querys .= " hscore as hscore, s.location as location, th.name as home, ta.name as away ";
    $querys .= " FROM dynsch s LEFT JOIN dynteams th ON s.homeid = th.id LEFT JOIN dynteams ta on s.awayid=ta.id ";
    if ($t != 0) {
        $querys .= " WHERE (th.id=" . $t . " OR ta.id=" . $t . ") ";
    }
    $querys .= " ORDER BY week, s.gamedate";

    //echo $querys;
    $sch = new ScheduleM;
    $result = $sch->findAll($querys);

    $menu = "";

    $table = "";

    if ($result) {
        foreach ($result as $x => $y) {
            $hscore = $y->hscore;
            $ascore = $y->ascore;
            $hclass = "sch-text";
            $aclass = "sch-text";

            $table .= "<form name='update' class='row row-cols-sm-auto small' action='" . ROOT . "/editschedule/" . $t . "/u/" . $y->sid . "' method='post'>";
            $table .= "<input type='hidden' name='sid' value='" . $y->sid . "' />";
            $table .= "<input type='hidden' name='week' value='" . $y->week . "' />";
            //$table .= "<td><img src='../assets/images/logos/" . $y->logo . ".png' style='height:30px;' /></td>";
            $table .= "<div class='col-12'>" . $y->week . "</div>";
            $table .= "<div class='col-12'><input type='text' class='list' name='date' value='" . $y->date . "' /></div>";
            $table .= "<div class='col-12'><input type='text' class='list me-2' style='width:30px' name='ascore' value='" . $y->ascore . "' />";
            $table .= str_pad($y->away, 30, " ");
            $table .= "@ ";
            $table .= "" . str_pad($y->home . "", 30, " ");
            $table .= "<input type='text' class='list ms-2' style='width:30px' name='hscore' value='" . $y->hscore . "' /></div>";
            $table .= "<div class='col-12'>" . $y->location . "</div>";
            $table .= "<div class='col-12'><a href='" . ROOT . "/editgamestats/" . $y->sid . "' class='float-left me-2'>Game Stats</a>";
            $table .= "<a href='" . ROOT . "/editplayerstats/" . $y->sid . "' class='float-left'>Player Stats</a></div>";
            $table .= "<div class='col-12'><button type='submit' class='btn btn-primary btn-small float-right me-2'>U</button>";
            $table .= "<a href='" . ROOT . "/editschedule/" . $this->id . "/" . $t . "/d/" . $y->sid . "' class='btn btn-danger btn-small float-left'>D</a></div>";
            $table .= "</form>";
        }
    }
}


// get teams for select list
$queryt = "SELECT * FROM dynteams ";
$queryt .= " ORDER BY Name";

$teams = new Team;
$result = $teams->findAll($queryt);

$list = "<option value='-select team-'></option>";

foreach ($result as $x => $y) {
    $list .= "<option value='" . $y->id . "'>" . $y->name . "</option>";
}
?>
<section>
    <div class="container-fluid container-page">
        <div class="row mb-3">
            <div class="col-sm-6 d-flex align-items-stretch">
                <h2>Schedule</h2>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-sm-12 d-flex align-items-stretch">
                Team: <form name="selweek" action="editschedule" method="post" class="ms-2">
                    <select onchange="reload(this, 'editschedule/<?= $this->id ?>', '<?= ROOT ?>');" name="team">
                        <?= str_replace("value='" . $t . "'", "value='" . $t . "' selected", $list) ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-md-12 align-items-stretch mb-4">
                <?php echo $table; ?>
            </div>
        </div>
        <form name="newgame" action="<?= ROOT ?>/editschedule/<?= $this->id ?>/<?= $t ?>/a" method="post">
            <div class="row">
                <div class="col-6">
                    Add Game
                </div>
            </div>
            <div class="row row-cols-sm-auto g-3 align-items-center mt-1">
                <div class="col-2 w-15">
                    <div class="input-group">
                        <select class="form-select" name="week">
                            <option value='0'>- week -</option>
                            <?php
                            for ($i = 1; $i <= 15; $i++) {
                            ?>
                                <option value="<?php echo $i; ?>" <?php if ($t == $i) {
                                                                        echo " selected";
                                                                    } ?>><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-2 w-25" style="width:220px;">
                    <div class="input-group"><input class="form-control" type="text" name="date" placeholder="date" /></div>
                </div>
                <div class="col-2 w-25" style="width:200px;">
                    <div class="input-group"><input class="form-control" type="text" name="location" placeholder="location" /></div>
                </div>
            </div>
            <div class="row row-cols-sm-auto g-3 align-items-center mt-1">
                <div class="col-2 w-20" style="width:160px;">
                    <div class="input-group"><select class="form-select" name="away"><?= $list ?></select></div>
                </div>
                <div class="col-2 w-10" style="width:100px;">
                    <div class="input-group"><input class="form-control" type="text" name="ascore" placeholder="ascore" /></div>
                </div> <span class="m-0 p-0 pt-2">@</span>
                <div class="col-2 w-20" style="width:160px;">
                    <div class="input-group"><select class="form-select" name="home"><?= $list ?></select></div>
                </div>
                <div class="col-2 w-10" style="width:100px;">
                    <div class="input-group"><input class="form-control" type="text" name="hscore" placeholder="hscore" /></div>
                </div>
                <div class="col-12 w-15">
                    <div class="input-group"><input type="submit" value="Add" class="btn btn-primary"></div>
                </div>
            </div>

            <div class="row row-cols-md-auto g-3 align-items-center mt-2">
            </div>
        </form>
    </div>
</section>
<?php include "include/footer.php"; ?>