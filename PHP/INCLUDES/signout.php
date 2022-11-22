<?php
include 'script.php';
if(isset($_GET["signout"]))
{   
    if($_GET["signout"] == 1)
    {
        setcookie("UserToken", "", time() - 3600,"/");
        $_SESSION["message"] = "You were signed out";
        header('Location: ./login.php');
    }
}
    

    

