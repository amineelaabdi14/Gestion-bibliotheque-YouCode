<?php
    include 'db-con.php';
// Start the session
session_start();

// if(isset($_POST['signMeUp']))       signUp();   
if(isset($_POST['signMeIn']))      signIn();    


function signIn(){
    global $conn;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE admin_email = '$email' and admin_password = '$password'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        die("Welcome");
    }
    else{
        
        $_SESSION["result"] = "Incorrect email or password";
        header('Location: ../index.php');
    }
}