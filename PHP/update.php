<?php 
    include 'productslist.php';
    $myId=$_GET['showmodal'];
    $sql="SELECT * FROM books WHERE book_id='$myId'";
    global $conn;
    $result=mysqli_query($conn,$sql);
    $MyData=mysqli_fetch_assoc($result);
    $name=$MyData['book_name'];
    $quantite=$MyData['book_quantite'];
?>
<script>
    BookNameInput.value = "<?= $name ?>";
    quantityInput.value = "<?= $quantite ?>";
    document.querySelector('button[name=addBtn]').setAttribute('name','editBtn');
    document.querySelector('button[name=editBtn]').innerText="Save";
    modalTitle.innerText="Edit Book";
    $(document).ready(function(){
        $("#addModal").modal('show');
    });
    document.querySelector('input[name=Myid]').value="<?= $myId ?>";
</script>