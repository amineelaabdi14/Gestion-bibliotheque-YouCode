<?php 
    include('issigned.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';

?>
<body class="MyContent" >
    <nav id="" class="navbar shadow-lg">
        <img id="navLogo" src="../CSS/IMAGES/logo.png" alt="" class="ms-4 mt-1" >
        <div class="align-items-center me-4">
            <img id="pdp" src="../CSS/IMAGES/pdp.jpeg" alt="" class="rounded-circle" >
            <span class="text-white ms-3 d-none d-sm-inline fw-semibold" style="font-size:16px;"> <?php echo $_SESSION['name'] ?>  </span>
        </div>
    </nav>
    <div class="row">
        <div id="sideBar" class="MyNavigation position-absolute start-0 d-flex flex-column justify-content-between"style="">
            <ul class="d-flex align-items-start flex-column p-0 ps-2">
                <li class="text-white btn mb-3 mt-4 d-flex flex-column flex-sm-row align-items-center"><i class="fa-solid fa-user b- fs-5"></i><span class="ms-3 d-none d-sm-inline fw-semibold">Profile</span></li> 
                <li class="text-white btn mb-3 mt-1 d-flex flex-column flex-sm-row align-items-center"><i class="fa-solid fa-chart-line fs-5"></i><span class="ms-3 d-none d-sm-inline fw-semibold">Dashboard</span></li> 
                <li class="text-white btn mb-3 mt-1 d-flex flex-column flex-sm-row align-items-center"><i class="fa-solid fa-table-columns fs-5"></i><span class="ms-3 d-none d-sm-inline fw-semibold">Products List</span></li>
            </ul>
            <a id="signOutBtn" href="script.php" class="d-block">
                <div class=" setRedColor d-flex flex-column flex-sm-row justify-content-center align-items-center mb-4">
                    <i class=" setRedColor fa-solid fa-right-from-bracket fs-5  m-auto m-sm-0"></i>
                    <span href="script.php" id="signOutText" class="setRedColor d-none d-sm-inline ms-3" style="opacity: 0.9;">Sign Out</span>
                </div>
            </a>
            
        </div>
        <div id="dashboardContent" class="" style="">
            <div class="MyTable table-responsive">
                <h5>HISTORY</h5>
                <table class="table mt-4"style="width:60%;">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>By</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Maria Anders</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>Francisco Chang</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Maria Anders</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>Francisco Chang</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Maria Anders</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>Francisco Chang</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                </table>
            </div>
            <div class="MyTable table-responsive">
                <h5>HISTORY</h5>
                <table class="table mt-4"style="width:60%;">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>By</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Maria Anders</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>Francisco Chang</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Maria Anders</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>Francisco Chang</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>Maria Anders</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                    <tr>
                        <td>#2</td>
                        <td>Francisco Chang</td>
                        <td>Mohamed Amine El Aabdi</td>
                        <td>2022-12-32</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
    
    
</body>
</html>