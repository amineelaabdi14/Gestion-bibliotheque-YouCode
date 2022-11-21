<?php


if(isset($_SESSION["message"])){
    if($_SESSION["message"] == "You're registered, the password was sent to your email" || $_SESSION["message"] == "You were signed out" )
    {
        echo '<div id="loginErrorAlert" class="alert alert-success alert-dismissible fade show">';
        echo($_SESSION["message"]);
        echo '</div>';
        unset($_SESSION["message"]);
    }
   else
   {
        echo '<div id="loginErrorAlert" class="alert alert-danger alert-dismissible fade show">';
        echo($_SESSION["message"]);
        echo '</div>';
        unset($_SESSION["message"]);
    }
   
}