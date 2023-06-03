<?php
include 'config.php';
session_start();
if(strlen($_SESSION['id']==0)){
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Item</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container add">
        <div class="row title">
            <h2>Add New Item</h2>
        </div>
        <div class="row content">
            <form action="" method="post">
                <div class="row name">
                    <div class="col">
                        <label for="name">Name</label>
                    </div>
                    <div class="col">
                        <input type="text" name="name" style="width:600px; height: 22px;" required>
                    </div>
                </div>
                <div class="row qty">
                    <div class="col">
                        <label for="qty">Quantity</label>
                    </div>
                    <div class="col">
                        <input type="text" name="qty" style="width:600px; height: 22px;" required>
                    </div>
                </div>
                <div class="row price">
                    <div class="col">
                        <label for="price">Price</label>
                    </div>
                    <div class="row">
                        <input type="text" name="price" style="width:600px; height: 22px;" required>
                    </div>
                </div>
                <input type="submit" value="Add" name="add" style="width:75px; height: 22px;">
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['add'])){
        $name= $_POST['name'];
        $qty= $_POST['qty'];
        $price= $_POST['price'];

        $sql= mysqli_query($con, "INSERT INTO t_inventory (name, qty, price) VALUES ('$name', '$qty', '$price')");
      if($sql){
        echo "<script>alert('Success Added New Item');</script>";
        echo "<script>window.location.href='inventory.php';</script>";
      }  
    }
    ?>

</body>

</html>