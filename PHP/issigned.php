<?php 
include 'script.php';

if(isset($_COOKIE['UserToken']) )
{   
    echo "oui hh";
    global $conn;
    $sql="SELECT * FROM users WHERE token='".$_COOKIE['UserToken']."'";
    $result=mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result) > 0)
    {   
        $MyData;
        foreach($result as $row)
        {
            $MyData[$row['admin_token']]=$row;
        }
        $_SESSION['name'] = $MyData['admin_token']['admin_name'];
        $_SESSION['birthday'] = $MyData['admin_token']['admin_birthday'];
        $_SESSION['password'] = $MyData['admin_token']['admin_password'];
        $_SESSION['email'] = $MyData['admin_token']['admin_email'];
        header('Location: dashboard.php');
    }
   
}
else
{   
    header('Location: PHP/login.php');
}
// global $_SESSION;
// print_r($_COOKIE['id']);
// die();
// $now = time(); // Checking the time now when home page starts.
// header('Location: PHP/login.php');
// if($now > $_SESSION['expire'])
// {   
//     // echo("nn hh");
//     header('Location: PHP/login.php');
// }
// else{
//     // die("yes hh");
//     // header('Location: PHP/dashboard.php');
// }
?>