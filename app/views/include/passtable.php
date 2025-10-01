<div class="row mb-2 small">
    <div class="col-2 w-25">&nbsp;</div>
    <div class="col-2 w-10">Att</div>
    <div class="col-2 w-10">Comp</div>
    <div class="col-2 w-10">Yards</div>
    <div class="col-2 w-10">TDs</div>
</div>
<div class="row mb-1 ms-1 small">
    <?= $list ?>
</div>
<form class="row row-cols-lg-auto g-3 align-items-center ms-1 mb-3" action="<?=ROOT?>/editplayerstats/<?=$this->sid?>/Passing" method="post">
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
            <input type="text" class="form-control" name="attempts" id="attempts" placeholder="Attempts" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" name="completions" id="completions" placeholder="Comp" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" name="yards" id="yards" placeholder="Yards" style="width:100px;">
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