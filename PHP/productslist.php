<?php 

    include('issigned.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';
?>
<body>
    <?php include 'navbar.php';
    ?>
    <div>
        <?php include 'sidebar.php';
        ?>
        <div id="pageContent" class="">
            <div class="d-flex justify-content-end ps-3 pe-3 ps-sm-5 pe-lg-5 justify-content-sm-between mb-4">
                <span class="text-secondary fs-4 fw-bold d-none d-sm-inline">Total Products :<span></span></span>
                <button type="button" name="add-product" data-bs-toggle="modal" data-bs-target="#addModal">
                    Add Product
                </button>
            </div>
            <div id="listContainer" class="box table-responsive mt0 mt-lg-1">
                <table class="table table-borderless rounded-1">
                    <thead>
                        <tr>
                            <th class="fw-bold tableTitle"scope="col">ALL PRDUCTS</th>
                        </tr>
                        <tr>
                            <th class="text-white fs-7 " scope="col">Book Id<i class="text-white bi bi-caret-down-fill fs-6 "></i></th>
                            <th class="text-white fs-7 " scope="col">Book Name</th>
                            <th class="text-white fs-7 " scope="col">Stock</th>
                            <th class="text-white fs-7 text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php insertIntoProducts(); ?>
                    </tbody>
                </table>
            </div>
        </div>    
        <script>
            document.getElementsByClassName('fa-solid fa-table-columns fs-5')[0].parentElement.style.backgroundColor="#038DFE";
            document.getElementsByClassName('fa-solid fa-chart-line fs-5')[0].parentElement.removeAttribute("style");
        </script>
    </div>
    <div class="modal" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-white">Add Book</h5>
                    <button type="button" class="btn-close
                    " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <form action="script.php" method="GET">
                    <div>
                        <label for="BookName" class="MyLabels">BOOK NAME</label>
                        <input type="text" name="BookName" class="MyInputs"maxlength="35">
                    </div>
                    <label for="quantity" class="MyLabels mt-4">QUANTITY</label>
                    <div class="d-flex justify-content-between">
                        <input id="quantityInput" type="text" name="quantity" class="MyInputs" maxlength="3">
                        <button name="addBtn" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../JS/app.js"></script>
</body>
</html>