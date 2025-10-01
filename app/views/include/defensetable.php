<div class="row mb-2 small">
    <div class="col-2 w-25">&nbsp;</div>
    <div class="col-2 w-10">Tackles</div>
    <div class="col-2 w-10">TFL</div>
    <div class="col-2 w-10">Sacks</div>
    <div class="col-2 w-10">FF</div>
    <div class="col-2 w-10">FR</div>
    <div class="col-2 w-10">TDs</div>
</div>
<div class="row mb-1 ms-1 small">
    <?= $list ?>
</div>
<form class="row row-cols-md-auto g-3 align-items-center ms-1 mb-3" action="<?=ROOT?>/editplayerstats/<?=$this->sid?>/Defense" method="post">
    <input type="hidden" name="tid" value="<?= $awayid ?>" />
    <input type="hidden" name="category" value="Defense" />
    <div class="col-1">
        <img src="<?=ROOT?>/assets/images/logos/<?=$logo?>.png" style="height:40px;width:40px;">
    </div>
    <div class="col-2 w-20">
        <select class="form-select" name="playerid" id="playerid">
            <?= $defenselist ?>
        </select>
    </div>
    <div class="col-1 w-10">
        <div class="input-group">
            <input type="text" class="form-control" name="tackles" id="tackles" placeholder="Tackles" style="width:100px;">
        </div>
    </div>
    <div class="col-1 w-10">
        <div class="input-group">
            <input type="text" class="form-control" name="tfl" id="tfl" placeholder="TFL" style="width:100px;">
        </div>
    </div>
    <div class="col-1 w-10">
        <div class="input-group">
            <input type="text" class="form-control" name="sacks" id="sacks" placeholder="Sacks" style="width:100px;">
        </div>
    </div>
    <div class="col-1 w-10">
        <div class="input-group">
            <input type="text" class="form-control" name="forcedfumbles" id="forcedfumbles" placeholder="FF" style="width:100px;">
        </div>
    </div>
    <div class="col-1 w-10">
        <div class="input-group">
            <input type="text" class="form-control" name="fumblerecoveries" id="fumblerecoveries" placeholder="FR" style="width:100px;">
        </div>
    </div>
    <div class="col-1 w-10">
        <div class="input-group">
            <input type="text" class="form-control" name="tds" placeholder="TDs" style="width:100px;">
        </div>
    </div>
    <div class="col-1 w-10">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>