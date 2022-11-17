<?php 
    include('issigned.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';

?>
<body>
    <nav id="" class="navbar headerDiv">
        <img id="navLogo" src="../CSS/IMAGES/logo.png" alt="" class="ms-4" >
        <div class="align-items-center me-4">
            <img id="pdp" src="../CSS/IMAGES/pdp.jpeg" alt="" class="rounded-circle" >
            <span class="text-white ms-3" style="font-size:18px;"> <?php echo $_SESSION['name'] ?>  </span>
        </div>
    </nav>
    <div id="sideBar" class="MyNavigation">
        <ul class="d-flex align-items-start flex-column"><!-- d-flex align-items-start flex-column -->
            <li class="text-white btn mb-2 mt-4"><img src="../CSS/IMAGES/profile-icon.png" alt="" style="width:30px;height:30px;margin-left:6px;"></a><span style="margin-left:9px">Profile</span></li> 
            <li class="text-white btn mb-2"><img src="../CSS/IMAGES/dashboard.png" alt="" style="width:41px;height:41px;filter: brightness(0);"></a> <span>Dashboard</span> </li> 
            <li class="text-white btn mb-2"><img src="../CSS/IMAGES/list-icon.png" alt="" style="width:33px;height:33px;margin-left:4px;"></a> <span style="margin-left:4px">Products List</span></li>
        </ul>
    </div>
</body>
</html>