<?php
$e = "";

$hero_title = "Sign Up";
$hero_text = "Sign up for your free account to play";

$username = "";
$email = "";
$check = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordc = $_POST["passwordc"];

    if ($username == "" || $email == "" || $_POST["password"] == "" || $_POST["passwordc"] == "") {
        $e .= "Please enter username and password<br />";
    }

    if ($_POST["password"] != $_POST["passwordc"]) {
        $e .= "Passwords do not match<br />";
    }

    if (!isset($_POST["check"])) {
        $e .= "You must agree to the terms of use<br />";
    } else {
        $check = 1;
    }

    // check image
    $target_file = IMAGE_DIR . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"  && $imageFileType != "gif") {
        $e .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }
    if ($_FILES["image"]["size"] > 5000000) {
        $e .= "Sorry, your file is too large. Images should be less than 50kb<br>";
        $uploadOk = 0;
    }

    if ($e == "") {
        $e = "form submitted";
        $user = new User;

        $arr["username"] = $_POST["username"];
        $arr["password"] = $_POST["password"];
        $arr["email"] = $_POST["email"];
        $date =  new DateTime("now");
        $insertDate  = $date->format('Y-m-d H:i:s');
        $arr["created"] = $insertDate;
        //$arr["isadmin"] = 0;
        //$arr["ispremium"] = 0;

        $result = $user->insert($arr);

        $e = "insert successful";
        $user = new User;

        $arrl["username"] = $_POST["username"];
        $arrl["password"] = $_POST["password"];
        $arrl["email"] = $_POST["email"];
        $result = $user->first($arrl, []);

        if ($result) {
            $e = "new user found";
            $_SESSION["userid"] = $result->id;
            $_SESSION["username"] = $result->username;
            $_SESSION["admin"]=$result->isadmin;    
            
            //upload image
            $target_file = IMAGE_DIR . $result->id;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file . "." . $imageFileType)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }

            header('Location: home');
        } else {
            $e = "user not found";
        }
    } else {
        echo $e;
    }
}

require 'include/header.php';
?>

<div class="container my-3 mx-auto">
    <div class="row">
        <div class="col-md-10 col-lg-10 col-sm-12">
            <h2>Sign Up</h2>
            <p class="text-danger"><?php echo $e; ?></p>
            <form class="form" action="signup" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text mr-3 w-25" id="inputGroup-sizing-sm">User Name</span>
                    <input type="text" id="username" name="username" class="form-control" placeholder="username" onBlur="checkusernameAvailability();"  aria-label="username" aria-describedby="inputGroup-sizing-sm" value="<?= $username ?>">
                    <span id="user-availability-status" class="text-center ms-3"></span>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text w-25"" id="inputGroup-sizing-sm">Email</span>
                    <input type="text" id="emailid" name="email" class="form-control" placeholder="email address" onBlur="checkemailAvailability();" aria-label="email" aria-describedby="inputGroup-sizing-sm" value="<?= $email ?>">
                    <span id="email-availability-status" class="text-center ms-3"></span>
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text w-25"" id="inputGroup-sizing-sm">Password</span>
                    <input type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text w-25"" id="inputGroup-sizing-sm">Confirm Password</span>
                    <input type="password" name="passwordc" class="form-control" placeholder="confirm password" aria-label="password" c aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text w-25"" style="width:120px;" id="inputGroup-sizing-sm">Profile Image</span>
                    <input type="file" name="image" id="image" class="form-control" placeholder="profile image" aria-label="password" c aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3 ml-2 pl-3">
                    <input class="form-check-input" type="checkbox" name="check" value="agree" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        By checking this box, I acknowledge that this site is for entertainment purposes only.
                    </label>
                </div>
                <div class="input-group input-group-sm mt-3">
                    <button class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include 'include/footer.php' ?>


<script>
function checkemailAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "<?=ROOT?>/ajax",
        data: 'emailid=' + $("#emailid").val(),
        type: "POST",
        success: function(data) {
            $("#email-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {}
    });
}

function checkusernameAvailability() {
    $("#loaderIcon").show();
    
    jQuery.ajax({
        url: "<?=ROOT?>/ajax",
        data: 'username=' + $("#username").val(),
        type: "POST",
        success: function(data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {alert("what");}
    });
}
</script>