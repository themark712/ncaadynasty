<?php
$hero_title = "Edit Article";
$hero_text = "Edit article";

$art = new ArticleM;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $this->aid;
    $arra["week"] = $_POST["week"];
    $arra["title"] = $_POST["title"];
    $arra["content"] = $_POST["content"];
    $result = $art->update($id, $arra);
}

$arr["id"] = $this->aid;
$result = $art->first($arr);

$title = "";
$content = "";
$week = "";

if ($result) {
    $title =  $result->title;
    $content =  $result->content;
    $week =  $result->week;
}
include 'include/header.php';
?>

<!-- About Section -->
<section id="article" class="about section">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-stretch">
                <h2>Edit Article</h2>
            </div>
        </div>
        <form name="newplayer" action="<?= ROOT ?>/editarticle/<?=$this->aid?>" method="post">
            <div class="row g-3 align-items-center">
                <div class="col-2">
                    <div class="input-group">
                        <select class="form-select" name="week">
                            <option value='0'>- # -</option>
                            <?php
                            for ($i = 0; $i <= 18; $i++) {
                            ?>
                                <option value="<?php echo $i; ?>" <?php if($week==$i) { ?> selected <?php } ?>><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group"><input class="form-control" type="text" name="title" placeholder="title" value="<?= $title ?>" /></div>
                </div>
                <div class="col-12">
                    <div class="input-group"><textarea name="content" class="form-control" id="summernote" rows="100" placeholder="content"><?= $content ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row row-cols-md-auto g-3 align-items-center">
                <div class="col-12">
                    <div class="input-group"><input type="submit" value="Update" class="btn btn-primary"></div>
                    <a href="<?=ROOT?>/editarticles">Back to Article List</a>
                </div>
            </div>
        </form>

    </div>
</section>


<?php include 'include/footer.php'; ?>