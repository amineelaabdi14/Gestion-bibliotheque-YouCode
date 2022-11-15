<!DOCTYPE html>
<html lang="en">
<?php include 'PHP/head.php';

//  echo'<p class="text-white">';
//  print_r($_SESSION);
//  echo '</p>';
    
?>
<body>
    
        <?php
        if(isset($_SESSION["result"])){
           echo '<div id="loginErrorAlert" class="alert alert-danger alert-dismissible fade show">';
            echo($_SESSION["result"]);
           echo '</div>';
        }
        ?>
    
   
    <div id="loginContainer" class="container">
        <img id="logoContainer" src="CSS/IMAGES/logo.png" alt="YouCode" class="mt-4">
        <form action="PHP/script.php" class="form" method="POST">
            
            <div id="emailFormContainer">
                <label for="email" class="MyLabels">EMAIL</label><br>
                <input type="email" name="email" id="" class="MyInputs" onkeyup="validateEmail();hideLoginError()">
                <div id="emailError" class="text-danger"></div>
            </div>

            <div>
                <label for="password" class="MyLabels">PASSWORD</label><br>
                <input type="password" name="password" id="" class="MyInputs ">
            </div>
            
            <div class="d-flex justify-content-between align-items-center mt-4">
                <span><a href="#" onclick="createAccount()">Create an account</a></span>
                <button type="submit"  name="signMeIn" disabled>Sign In</button>
            </div>
        </form>
    </div>
    
    <script src="JS/app.js">
    </script>
    <?php 
    session_destroy ();
    ?>
</body>
</html>