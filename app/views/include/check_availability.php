<?php
//code check email
if (!empty($_POST["emailid"])) {
    $uemail = $_POST["emailid"];
    $sql = "SELECT email FROM dynuser WHERE email=:email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $uemail, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0)
        echo "<span style='color:red'> Email already exists .</span>";
    else
        echo "<span style='color:green'> Email available.</span>";
}
// End code check email

//Code check user name
if (!empty($_POST["username"])) {
    echo "check";
    $username = $_POST["username"];
    $user = new User;
    $aryu["username"] = $username;
    $result = $user->first($aryu);

    if ($result) {
        echo "<span style='color:red'> Username already exists .</span>";
    } else {
        echo "<span style='color:green'> Username available.</span>";
    }
}
// End code check username

//Code check user name
if (!empty($_POST["dynastyname"])) {
    $leaguename = $_POST["dynastyname"];
    $sql = "SELECT name FROM dynasty WHERE name=:dynastyname";
    $query = $dbh->prepare($sql);
    $query->bindParam(':leaguename', $leaguename, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0)
        echo "<span style='color:red'> Dynasty name already exists .</span>";
    else
        echo "<span style='color:green'> Dynasty name available.</span>";
}
// End code check username
