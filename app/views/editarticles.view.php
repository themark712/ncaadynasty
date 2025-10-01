<?php
$hero_title = "Articles";
$hero_text = "Edit articles";

$art=new ArticleM;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $arra["dynastyid"] = $_SESSION["dyn"];
    $arra["week"] = $_POST["week"];
    $arra["title"] = $_POST["title"];
    $arra["content"] = $_POST["content"];
    $arra["created"] = date('Y-m-d H:i:s');
    $result = $art->insert($arra);
}

$arr["dynastyid"]= $_SESSION["dyn"];
$result = $art->where($arr);

$articles = "<table class='table table-sm'";
if ($result) {
    foreach ($result as $x => $y) {
        $articles .="<tr>";
        $articles .="<td>" . $y->week . "</td>";
        $articles .="<td>" . $y->created . "</td>";
        $articles .="<td><a href='" . ROOT . "/editarticle/" . $y->id . "'>" . $y->title . "</a></td>";
        $articles .="<td>" . substr($y->content, 0, 50) . "...</td>";
        $articles .="</tr>";
    }
}
$articles .= "</table>";
include 'include/header.php';
?>

<!-- About Section -->
<section id="article" class="about section">

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-stretch">
                <h2>Articles</h2>
            </div>
        </div>
        <div class="row">
            <?=$articles?>
        </div>
        <div class="row mb-2">
            <div class="col-sm-6 d-flex align-items-stretch">
                <h3>New Article</h3>
            </div>
        </div>
        <form  name="newplayer" action="<?= ROOT ?>/editarticles/" method="post">
            <div class="row g-3 align-items-center">
                <div class="col-2">
                    <div class="input-group">
                        <select class="form-select" name="week">
                            <option value='0'>- # -</option>
                            <?php
                            for ($i = 0; $i <= 99; $i++) {
                            ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group"><input class="form-control" type="text" name="title" placeholder="title" /></div>
                </div>
                <div class="col-12">
                    <div class="input-group"><textarea name="content" class="form-control" id="summernote" rows="100" placeholder="content" value="<?= old_value('content') ?>"></textarea>
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


<?php include 'include/footer.php'; ?>