<?php 
    include('issigned.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';
?>
<body class="MyContent">
    <?php include 'navbar.php';
        ?>
    <div>
        <?php include 'sidebar.php';
        ?>
        <div id="pageContent" class="">
            <div id="historyContainer" class="box table-responsive mt0 mt-lg-1">
                <table class="table table-borderless rounded-1">
                    <thead>
                        <tr>
                            <th class="fw-bold tableTitle"scope="col">HISTORY</th>
                        </tr>
                        <tr>
                            <th class="text-white fs-7 " scope="col">Book Id</th>
                            <th class="text-white fs-7 " scope="col">Book Name</th>
                            <th class="text-white fs-7 " scope="col">Student Name</th> 
                            <th class="text-white fs-7 text-center" scope="col">Date<i class="text-white bi bi-caret-down-fill fs-6 "></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            insertIntoHistory();
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="statsContainer" class="box table-responsive mt-3">
                <table class="table table-borderless rounded-1">
                    <thead>
                        <tr>
                            <th class="fw-bold tableTitle"scope="col">STATISTICS</th>
                        </tr>
                        <tr class="">
                            <th class="text-white fs-7 " scope="col">Book Id</th>
                            <th class="text-white fs-7 " scope="col">Book Name</th>
                            <th class="text-white fs-7 text-center" scope="col">Borrows<i class="text-white bi bi-caret-down-fill fs-6 "></i></th>
                            <th class="text-white fs-7 text-center" scope="col">Stock available</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            insertIntoStats();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    
</body>
<script src="../JS/app.js"></script>

</html>