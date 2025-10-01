<div class="row mb-2 small">
    <div class="col-2 w-25">&nbsp;</div>
    <div class="col-2 w-10">Rush</div>
    <div class="col-2 w-10">Yards</div>
    <div class="col-2 w-10">TDs</div>
</div>
<div class="row mb-3 ms-1 small">
    <?= $list ?>
</div>
<form class="row row-cols-lg-auto g-3 align-items-center mb-3 ms-1" action="<?=ROOT?>/editplayerstats/<?=$this->sid?>/Rushing" method="post">
    <input type="hidden" name="tid" value="<?= $awayid ?>" />
    <div class="col-2">
        <select class="form-select" name="playerid" id="playerid">
            <?= $offenselist ?>
        </select>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Attempts" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Comp" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Yards" style="width:100px;">
        </div>
    </div>
    <div class="col-2">
        <div class="input-group">
            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="TDs" style="width:100px;">
        </div>
    </div>
    <div class="col-1">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>