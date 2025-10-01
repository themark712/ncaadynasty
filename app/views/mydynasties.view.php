<?php
if (!isUserLoggedIn()) {
    redirect(ROOT . "/signin");
}

unset($_SESSION["dyn"]);

$hero_title = "My Dynasties";
$hero_text = "View your dynasties here";

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

$mydyn = new DynastyM;
$aryl["userid"] = $_SESSION["userid"];
$result = $mydyn->where($aryl);

$list = "<table class='table table-sm'>";

if ($result) {
    foreach ($result as $x => $y) {
        $list .= "<tr>";
        $list .= "<td><a href='" . ROOT . "/dynasty/" . $y->id . "'>" . $y->name . "</a></td>";
        if ($_SESSION["userid"] == $y->userid) {
            $list .= "<td><a href='" . ROOT . "/editdynasty/" . $y->id . "'>Edit</a></td>";
        }
        $list .= "</tr>";
    }
} else {
    $e .= "No dynasties found";
}
$list .= "</table>";
?>
<section>
    <div class="container container-page mx-auto">
        <div class="row mb-1">
            <div class="col-10">
                <h2>My Dynasties</h2>
                <p class="text-danger"><?php echo $e; ?></p>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-10">
                <?php echo $list; ?>
            </div>
        </div>

        <?php
        if ($_SESSION["prem"] == 1) { ?>
            <div class="row mb-1">
                <div class="col-10">
                    <h4>Create Dynasty</h4>
                </div>
                <div class="row mb-3">
                    <form class="form col-10" action="<?= ROOT ?>/mydynasties" method="post">
                        <div class="input-group input-group-sm mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Dynasty Name</span>
                            <input type="text" id="dynastyname" name="dynastyname" class="form-control" onblur="checkDynastyAvailability()" placeholder="dynasty name" aria-label="dynasty name" aria-describedby="inputGroup-sizing-sm">
                            <span id="dynasty-availability-status" class="text-center ms-3" onchange="setButton()"></span>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="public" type="checkbox" value="public" id="flexCheckDefault">
                        </div>
                        <div class="input-group input-group-sm mt-3">
                            <button id="create" class="btn btn-primary">Create Dynasty</button>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?php include 'include/footer.php' ?>

<script>
    function checkDynastyAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "<?= ROOT ?>/ajax",
            data: 'dynastyname=' + $("#dynastyname").val(),
            type: "POST",
            success: function(data) {
                $("#dynasty-availability-status").html(data);
                $("#loaderIcon").hide();
                var msg = $("#dynasty-availability-status").html();
                setButton(msg);
            },
            error: function() {}
        });
    }

    function setButton(msg2) {
        var btn = document.getElementById("create");
        if (msg2.indexOf("already") > 0) {
            btn.disabled = "disabled";
            btn.disabled = true;
        } else {
            btn.disabled = "disabled";
            btn.disabled = false;
        }
    }
</script>