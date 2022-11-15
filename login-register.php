<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/BOOTSTRAP/css/bootstrap.min.css">
    <link rel="stylesheet" href="CSS/BOOTSTRAP/js/bootstrap.min.js">
    <!-- END CSS -->
    <title>YouCode Library Admin</title>
</head>
<body>
    
    <div id="loginContainer" class="container">
        <img id="logoContainer" src="CSS/IMAGES/logo.png" alt="YouCode" class="mt-4">
        <form action="" class="form" method="POST">

            <label for="email" class="MyLabels">EMAIL</label><br>
            <input type="email" name="email" id="" class="MyInputs ">
            
            <label for="password" class="MyLabels">PASSWORD</label><br>
            <input type="password" name="password" id="" class="MyInputs ">
            
            <div class="d-flex justify-content-between align-items-center mt-4">
                <span><a href="" onclick="createAccount()">Create an account</a></span>
                <button type="submit" onclick="validateEmail(event)" name="signMeIn" >Sign In</button>
            </div>
        </form>
    </div>
    
    <script src="JS/app.js">
    </script>
</body>
</html>