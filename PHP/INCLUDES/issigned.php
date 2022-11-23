<?php 
include 'script.php';
if(isset($_COOKIE['UserToken']) )
{   
    $token = $_COOKIE['UserToken'];
    global $conn;
    $sql="SELECT * FROM admins WHERE admin_token='$token'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0)
    {   
        $data=mysqli_fetch_assoc($result);
        $_SESSION['name'] = $data['admin_name'];
        $_SESSION['birthday'] = $data['admin_birthday'];
        $_SESSION['password'] = $data['admin_password'];
        $_SESSION['email'] = $data['admin_email'];
    }
}
else
{  
    header('Location: login.php');
}
?>