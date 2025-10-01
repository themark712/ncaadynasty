<div class="row mb-2 small">
    <div class="col-2 w-25">&nbsp;</div>
    <div class="col-2 w-10">Int</div>
    <div class="col-2 w-10">Fumbles</div>
    <div class="col-2 w-10">Fum Lost</div>
</div>
<div class="row mb-1 ms-1 small">
    <?= $list ?>
</div>
<form class="row row-cols-lg-auto g-3 align-items-center ms-1 mb-3" action="<?=ROOT?>/editplayerstats/<?=$this->sid?>/Turnovers" method="post">
    <input type="hidden" name="tid" value="<?= $awayid ?>" />
    <input type="hidden" name="category" value="Passing" />
    <div class="col-1">
        <img src="<?=ROOT?>/assets/images/logos/<?=$logo?>.png">
    </div>
    <div class="col-2">
        <select class="form-select" name="playerid" id="playerid">
            <?= $offenselist ?>
        </select>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" name="interceptions" id="interceptions" placeholder="Int" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" name="fumbles" id="fumbles" placeholder="Fumbles" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" name="fumbleslost" id="fumbleslost" placeholder="Fumb Lost" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" name="tds" placeholder="TDs" style="width:100px;">
        </div>
    </div>
    <div class="col-1">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>