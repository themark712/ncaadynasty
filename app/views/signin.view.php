<?php
$hero_title = "Sign In";
$hero_text = "Sign in to your account here";

$e = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User;

    $arr["username"] = $_POST["username"];
    $arr["password"] = $_POST["password"];
    $result = $user->first($arr, []);

    if ($result) {
            $_SESSION["userid"]=$result->id;
            $_SESSION["username"]=$result->username;
            $_SESSION["admin"]=$result->isadmin;    
            $_SESSION["prem"]=$result->ispremium;    
            $_SESSION["email"]=$result->email;    
            header('Location: home');
    } else {
        $e = "user not found";
    }
}
require 'include/header.php';
?>
<section>
<div class="container container-page mx-auto">
    <div class="col-10">

        <h2>Sign In</h2>
        <p class="text-danger"><?php echo $e; ?></p>
        <form class="form" action="signin" method="post">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text w-25" id="inputGroup-sizing-sm">User Name</span>
                <input type="text" name="username" class="form-control" placeholder="username" aria-label="username" aria-describedby="inputGroup-sizing-sm" text="">
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text w-25" id="inputGroup-sizing-sm">Password</span>
                <input type="password" name="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="inputGroup-sizing-sm" value="">
            </div>
            <div class="input-group input-group-sm mt-3">
                <button class="btn btn-primary">Sign In</button>
            </div>
        </form>
    </div>
</div>
<section>
<?php include 'include/footer.php' ?>