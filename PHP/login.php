<?php 
include 'script.php';
if(isset($_COOKIE['UserToken']) )
{   
    header('Location: dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php') ?>
<body>
       
<?php
        if(isset($_SESSION["result"])){
            if($_SESSION["result"] == "You're registered, the password was sent to your email"){
                echo '<div id="loginErrorAlert" class="alert alert-success alert-dismissible fade show">';
           echo($_SESSION["result"]);
           echo '</div>';
            }
           else{
            echo '<div id="loginErrorAlert" class="alert alert-danger alert-dismissible fade show">';
           echo($_SESSION["result"]);
           echo '</div>';
           }
           
        }
        ?>
    <div id="loginContainer" class="container">
        <img src="../CSS/IMAGES/logo.png" alt="YouCode" class="mt-4 logoContainer">
        <form action="script.php" class="form d-flex flex-column " method="POST">
            
            <div id="emailFormContainer">
                <label for="email" class="MyLabels">EMAIL</label><br>
                <input type="email" name="email"  class="MyInputs" oninput="validateEmail()" autocomplete="off">
                <div id="emailError" class="text-danger"></div>
            </div>

            <div class="mb-3">
                <label for="password" class="MyLabels">PASSWORD</label><br>
                <input type="password" name="password" class="MyInputs">
                <div id="comfirEmailError" class="text-danger mb-0 "></div>
            </div>
            <div id="fullName"></div>
            <div class="d-flex justify-content-between align-items-center mt-3" style="">
                <span><a href="#" onclick="createAccount()">Create an account</a></span>
                <button type="submit"  name="signMeIn" disabled>Sign In</button>
            </div>
            

        </form>
    </div>
    
    <script src="../JS/app.js">
    </script>
    <?php 
    unset($_SESSION['result']);
    ?>
</body>
</html>