<?php 
    include('issigned.php');
    include('messages.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php';
    ?>
    <body class="MyContent">
        <?php include 'navbar.php';?>
        <div>
            <?php include 'sidebar.php';?> 
            <script>
                document.getElementsByClassName('fa-solid fa-user b- fs-5')[0].parentElement.style.backgroundColor="#038DFE";
                document.getElementsByClassName('fa-solid fa-chart-line fs-5')[0].parentElement.removeAttribute("style");
            </script>
            <div id="pageContent" class="" style="">
                <div id="profileFormContainer" class="container">
                    <form id="profile-form" action="script.php"class="form d-flex flex-column " method="POST">
                        <div class="d-flex justify-content-center mt-4">
                            <img id="editImage" src="../CSS/IMAGES/pdp.jpeg" alt="" class="rounded-circle">
                        </div>
                        <div id="EditName" class="mt-2">
                            <label for="edit-name" class="MyLabels">FULL NAME</label>
                            <input type="text" class="MyInputs" name="edit-name" value="<?= $_SESSION['name']?>">
                        </div>
                        <div id="EditEmail" class="mt-2">
                            <label for="edit-email" class="MyLabels">EMAIL</label>
                            <input type="email" class="MyInputs" name="edit-email" value="<?= $_SESSION['email']?>">
                        </div>
                        <div id="Editbirthday" class="mt-2">
                            <label for="birthday" class="MyLabels">BIRTHDAY</label>
                            <input type="date" class="MyInputs" name="birthday" value="<?php if( array_key_exists('birthday',$_SESSION) ) {echo $_SESSION['birthday'];} ?>">
                        </div>
                        <div id="EditNewPassword" class="mt-2">
                            <label for="edit-newpassword" class="MyLabels">NEW PASSWORD</label>
                            <input type="password" class="MyInputs" name="edit-newpassword" value="" oninput="checkPassword()">
                            <div id="passwordError" class="text-danger"></div>
                        </div>
                        <div id="EditName" class="mt-2">
                            <label for="edit-curentpassword" class="MyLabels">CURENT PASSWORD</label>
                            <input type="password" class="MyInputs" name="edit-curentpassword" value="">
                        </div>
                        <button type="submit" name="save-profile" class="mt-4">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="../JS/app.js"></script>
</html>