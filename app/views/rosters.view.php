<?php
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] != "1") {
    header('Location: ' . ROOT . '/signin');
}

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] != "1") {
    header('Location: ' . ROOT . '/signin');
}

$e = "";
$hero_title = "Dynasty - Roster";
$hero_text = "Edit roster here";
$m = $this->m;

$table = "";
$conflist = "";

if ($m != "") {
    $roster = new RosterM;

    if ($m == "a") {
        // add game
        $arya["year"] = $_POST["year"];
        $arya["number"] = $_POST["number"];
        $arya["position"] = $_POST["position"];
        $arya["fname"] = $_POST["fname"];
        $arya["lname"] = $_POST["lname"];
        $arya["isredshirt"] = $_POST["isredshirt"];
        $arya["teamid"] = $_POST["tid"];
        $roster->insert($arya);
        redirect("editroster/" . $this->sid . "&tid=" . $_POST["tid"]);
    }
}

include 'include/header.php';
$teamid = 0;

if (isset($this->tid)) {
    $teamid = $this->tid;
}

// position list
$poslist = "";
$arypos = array("-POS-", "QB", "RB", "WR", "TE", "OL", "DL", "DT", "DE", "LB", "DB", "CB", "S", "K", "P", "LS");

foreach ($arypos as $o => $p) {
    $poslist .= "<option value='" . $p . "'>" . $p . "</option>";
}

// get roster
if ($teamid != 0 && $teamid != "") {

    $queryr = "SELECT r.id, r.teamid, t.id as tid, t.name as team, t.logo as logo, r.fname, r.lname, r.number, r.position, r.year, r.isredshirt ";
    $queryr .= " FROM dynroster r LEFT JOIN dynteams t ON r.teamid = t.id ";
    $queryr .= " WHERE r.teamid=" . $teamid . " ";
    $queryr .= " ORDER BY r.position, r.lname";
    //echo $queryr;
    $roster = new RosterM;
    $result = $roster->findAll($queryr);

    $menu = "";

    $table = "<table class='table table-sm'>";

    if ($result) {
        foreach ($result as $x => $y) {

            $table .= "<tr>";
            $table .= "<td><img src='" . ROOT . "/assets/images/logos/" . $y->logo . ".png' style='height:30px;' /></td>";
            //$table .= "<td>" . $y->team . "</td>";
            //$table .= "<td>" . $list . "</td>";
            $table .= "<td>" . $y->number . "</td>";
            $table .= "<td>" . $y->id . "</td>";
            $table .= "<td>" . $y->fname . "</td>";
            $table .= "<td>" . $y->lname . "</td>";
            $table .= "<td>" . $y->position . "</td>";
            $table .= "<td>" . $y->year . "</td>";

            $table .= "<td>RS?<input type='checkbox' class='list' style='width:40px' name='redshirt' value='" . $y->isredshirt . "' disabled /></td>";
            $table .= "<td><input type='hidden' name='rid' value='" . $y->id . "' /> ";
            $table .= "<td><a href='" . ROOT . "/editpratings/" . $y->id . "' class='float-left'>Player Ratings</a></td>";
            $table .= "</tr>\r\n";
        }
    }
}

$table .= "</table>";


// get teams for select list
$queryt = "SELECT * FROM dynteams ";
$queryt .= " ORDER BY Name";

$teams = new Team;
$result = $teams->findAll($queryt);

$list = "<option value='-select team-'></option>";

foreach ($result as $x => $y) {
    $list .= "<option value='" . $y->id . "'";
    if ($teamid == $y->id) {
        $list .= " selected";
    }
    $list .= ">" . $y->name . "</option>";
}
?>

<section>
    <div class="container-fluid container-page">
        <div class="row">
            <div class="col-sm-2 align-items-stretch">
                <h2>Roster</h2>
            </div>
            <div class="col-sm-4 align-items-stretch mt-2">
                <form name="selteam" action="rosters" method="post">
                    <select onchange="reload(this, 'rosters', '<?= ROOT ?>');" name="team">
                        <?= $list ?>
                    </select>
                </form>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-sm-12 align-items-stretch mb-4">
                <?php echo $table; ?>
            </div>
        </div>
        <form name="newplayer" action="<?= ROOT ?>/editroster/<?= $this->sid ?>/a" method="post">
            <div class="row row-cols-sm-auto g-3 align-items-center">
                <div class="col-3">
                    <div class="input-group"><select class="form-select" name="tid"><?= $list ?></select></div>
                </div>
                <div class="col-1">
                    <div class="input-group">
                        <select class="form-select" name="number">
                            <option value='0'>- # -</option>
                            <?php
                            for ($i = 0; $i <= 99; $i++) {
                            ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-1">
                    <div class="input-group">
                        <select class="form-select" name="year">
                            <option value='0'>- YR -</option>
                            <option value="SR">SR</option>
                            <option value="JR">JR</option>
                            <option value="SO">SO</option>
                            <option value="FR">FR</option>
                        </select>
                    </div>
                </div>
                <div class="col-2">
                    <div class="input-group"><select class="form-select" name="position"><?= $poslist ?></select></div>
                </div>
                <div class="col-2">
                    <div class="input-group"><input class="form-control" type="text" name="fname" placeholder="fname" /></div>
                </div>
                <div class="col-2">
                    <div class="input-group"><input class="form-control" type="text" name="lname" placeholder="lname" /></div>
                </div>
                <div class="col-1 form-check">
                    <input class="form-check-input" type="checkbox" name="isredshirt" id="isredshirt">
                    <label class="form-check-label" for="isredshirt">
                        Redshirt?
                    </label>
                </div>
            </div>
    </div>
    <div class="row row-cols-md-auto g-3 align-items-center">
        <div class="col-12">
            <div class="input-group"><input type="submit" value="Add" class="btn btn-primary"></div>
        </div>
    </div>
    </form>
    </div>
</section>
<?php include "include/footer.php"; ?>