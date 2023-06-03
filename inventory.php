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
    <title>Inventory</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container inventory">
        <div class="row">
            <h2>Inventory</h2>
        </div>
        <div class="row table">
            <table>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
                <?php
                $sql= mysqli_query($con, "SELECT * FROM t_inventory");
                $rows=mysqli_fetch_all($sql, MYSQLI_ASSOC);
                $totalrows= count($rows);

                for($i=0; $i < $totalrows; $i++){
                    $row= $rows[$i];
                ?>
                <tr>
                    <td><?= $i+1; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['qty']; ?></td>
                    <td><?= $row['price']; ?></td>
                    <td><a href="edit.php?no=<?= $row['no']; ?>">Edit</a> - <a href="inventory.php?no=<?= $row['no']?>&del=delete"
                            onClick="return confirm('Delete this Item?')">Delete</a></td>
                </tr>
                <?php } ?>
                <?php
                    if(isset($_GET['del'])){
                        $inventoryid= $_GET['no'];
                        mysqli_query($con, "DELETE FROM t_inventory where no='$inventoryid'");
                        $_SESSION['msg']="data deleted!";
                        header("Location: inventory.php");
                    }
                ?>
            </table>
        </div>
        <div class="row">
            <a href="add.php">Add New Item</a>
        </div>
        <div class="row">
            <a href="logout.php"><input type="button" value="Logout" name="logout" style="width:75px; height: 22px;"></a>
        </div>
    </div>


</body>

</html>