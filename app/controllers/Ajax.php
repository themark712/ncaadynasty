<?php

// Teams class

class Ajax
{
    use Controller;

    public function index()
    {
        //Code check email address
        if (!empty($_POST["emailid"])) {
            $uemail = $_POST["emailid"];
            $user = new User;
            $aryu["email"] = $uemail;
            $result = $user->first($aryu);

            if ($result) {
                echo "<span style='color:red'> Email already exists .</span>";
            } else {
                echo "<span style='color:green'> Email available.</span>";
            }
        }
        // End code check email

        //Code check user name
        if (!empty($_POST["username"])) {
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

        //Code check dynasty name
        if (!empty($_POST["dynastyname"])) {
            $name = $_POST["dynastyname"];
           
            $dynasty = new DynastyM;
            $aryl["name"]=$name;
            $result = $dynasty->where($aryl);

            if ($result)
                echo "<span style='color:red'> Dynasty name already exists .</span>";
            else
                echo "<span style='color:green'> Dynasty name available.</span>";
        }
        // End code check username
    }
}
