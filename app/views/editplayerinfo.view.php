<?php
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] != "1") {
    header('Location: ' . ROOT . '/signin');
}

if (!isset($_SESSION["admin"]) || $_SESSION["admin"] != "1") {
    header('Location: ' . ROOT . '/signin');
}

$e = "";
$hero_title = "Admin - Rosters";
$hero_text = "Edit roster here";
$m = "";
if (isset($this->m)) {
    $m = $this->m;
}

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
        $arya["ovr"] = $_POST["ovr"];
        //$arya["isredshirt"] = $_POST["isredshirt"];
        $arya["teamid"] = $this->tid;
        $roster->insert($arya);
        redirect("editroster/" . $this->tid);
    }
    if ($m == "u") {
        $id = $this->pid;
        $aryu["year"] = $_POST["year"];
        $aryu["number"] = $_POST["number"];
        $aryu["position"] = $_POST["position"];
        $aryu["fname"] = $_POST["fname"];
        $aryu["lname"] = $_POST["lname"];
        //$aryu["isredshirt"] = $_POST["isredshirt"];
        $aryu["ovr"] = $_POST["ovr"];
        $roster->update($id, $aryu);
        redirect("editroster/" . $this->tid);
    }
}

include 'include/header.php';
$teamid = 0;

if (isset($this->tid)) {
    $teamid = $this->tid;
}

// position list
$poslist = "";
$arypos = array("-POS-", "QB", "HB", "WR", "TE", "C", "LG","RG","RT", "LT", "DT", "LE", "RE", "MLB", "LOLB", "ROLB", "DB", "CB", "FS", "SS", "K", "P", "LS");

foreach ($arypos as $o => $p) {
    $poslist .= "<option value='" . $p . "'>" . $p . "</option>";
}

// get roster
if ($teamid != 0 && $teamid != "") {

    $queryr = "SELECT r.id, r.teamid, t.id as tid, t.name as team, t.logo as logo, r.fname, r.lname, r.number, r.position, r.year, r.isredshirt, r.ovr ";
    $queryr .= " FROM dynroster r LEFT JOIN dynteams t ON r.teamid = t.id ";
    $queryr .= " WHERE r.teamid=" . $teamid . " ";
    $queryr .= " ORDER BY r.ovr DESC, r.lname";
    //echo $queryr;
    $roster = new RosterM;
    $result = $roster->findAll($queryr);

    $menu = "";

    $table = "<table class='table table-sm'>";

    if ($result) {
        foreach ($result as $x => $y) {

            $table .= "<tr style='line-height:6px;'>";
            $table .= "<form name='update' class='small' action='" . ROOT . "/editroster/" . $this->tid . "/" . $y->id . "/u' method='post'>";
            $table .= "<td><img class='img-xs' src='" . ROOT . "/assets/images/logos/" . $y->logo . ".png' /></td>";
            //$table .= "<td>" . $y->team . "</td>";
            //$table .= "<td>" . $list . "</td>";
            $table .= "<td><input type='text' class='list' style='width:40px' name='number' value='" . $y->number . "' /></td>";
            $table .= "<td class='pt-2 mt-1'>" . $y->id . "</td>";
            $table .= "<td><input type='text' class='list' style='width:130px' name='fname' value='" . $y->fname . "' /></td>";
            $table .= "<td><input type='text' class='list' style='width:130px' name='lname' value='" . $y->lname . "' /></td>";
            $table .= "<td><select name='position'>";

            foreach ($arypos as $o => $p) {
                $table .= "<option value='" . $p . "'";
                if ($p == $y->position) {
                    $table .= " selected";
                }
                $table .= ">" . $p . "</option>";
            }
            $table .= "' /></td>";

            $table .= "<td> <select  name='year'>";
            $table .= "                    <option value='0'>- YR -</option>";
            $table .= "                    <option value='SR'";
            if ($y->year == "SR") {
                $table .= " selected";
            }
            $table .= ">SR</option>";
            $table .= "                    <option value='JR'";
            if ($y->year == "JR") {
                $table .= " selected";
            }
            $table .= ">JR</option>";
            $table .= "                    <option value='SO'";
            if ($y->year == "SO") {
                $table .= " selected";
            }
            $table .= ">SO</option>";
            $table .= "                    <option value='FR'";
            if ($y->year == "FR") {
                $table .= " selected";
            }
            $table .= ">FR</option>";
            $table .= "                </select>  ";
            //$table .= "<td>RS?<input type='checkbox' class='list' style='width:40px' name='redshirt' value='" . $y->isredshirt . "' /></td>";
            $table .= "<td><input type='hidden' name='rid' value='" . $y->id . "' /> ";
            $table .= "<td><input type='text' class='list' style='width:40px' name='ovr' value='" . $y->ovr . "' maxlength='2' /></td>";
            $table .= "<td><input type='submit' class='button py-auto' style='width:40px;height:20px;' value='Edit'></td>";
            $table .= "<td class='pt-2 mt-1' style='width:140px;'><a href='" . ROOT . "/editplayerinfo/" . $this->tid . "/" . $y->id . "' class='float-left'>Player Info</a></td>";
            $table .= "</form>";
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
                <form name="selteam" action="editroster" method="post">
                    <select onchange="reload(this, 'editroster', '<?= ROOT ?>');" name="team">
                        <?= $list ?>
                    </select>
                </form>
            </div>
        </div>
        <form name="newplayer" class='mb-3' action="<?= ROOT ?>/editroster/<?= $this->tid ?>/0/a" method="post">
            <div class="row row-cols-sm-auto g-1 align-items-center">
                <div class="col-3">
                    <div class="input-group"><select class="form-select" name="tid"><?= $list ?></select></div>
                </div>
                <div class="col-1">
                    <div class="input-group">
                        <select class="form-select" name="number" id="number">
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
                <div class="col-1">
                    <div class="input-group"><input class="form-control" type="text" name="ovr" placeholder="ovr" maxlength="2" /></div>
                </div>
                <div class="col-1 form-check">
                    <input class="form-check-input" type="checkbox" name="isredshirt" id="isredshirt">
                    <label class="form-check-label" for="isredshirt">
                        Redshirt?
                    </label>
                </div>
                <div class="col-12 mb-2">
                    <div class="input-group"><input type="submit" value="Add" class="btn btn-primary"></div>
                </div>
            </div>
        </form>
        <div class="row mt-0">
            <div class="col-sm-12 align-items-stretch mb-4">
                <?php echo $table; ?>
            </div>
        </div>
    </div>
</section>
<?php include "include/footer.php"; ?>

<script>
    document.getElementById("number").focus();
</script>