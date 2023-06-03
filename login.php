<?php
include 'config.php';
session_start();
$_SESSION['errmsg'] = "";

    if(isset($_POST['submit'])){
        $uname= $_POST['uname'];
        $passwd= $_POST['passwd'];
        $select= mysqli_query($con, "SELECT * FROM t_login where uname='$uname' and passwd='$passwd'");
        $row= mysqli_fetch_array($select);
    if($row > 0){
        $_SESSION['login']= $_POST['uname'];
        $_SESSION['id']= $row['id'];
        header('Location: inventory.php');
      }else{
        $_SESSION['errmsg']= "Invalid Username or Password";
      }  
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="" method="post">
            <h2>Admin Login</h2>
            <h4>Please Insert Username & Password</h4>
            <div class="row uname">
                <div class="col">
                    <label for="uname">Username</label>
                </div>
                <div class="col">
                    <input type="text" name="uname" style="width:200px; height: 22px;" required>
                </div>
            </div>
            <div class="row passwd">
                <div class="col">
                    <label for="passwd">Password</label>
                </div>
                <div class="col">
                    <input type="password" name="passwd" style="width:200px; height: 22px;" required>
                </div>
            </div>
            <div class="row">
                <input type="submit" value="Login" name="submit" style="width:75px; height: 22px;">
            </div>
            <span style="color:red;">
                <?php echo htmlentities($_SESSION['errmsg']); ?>
                <?php echo htmlentities($_SESSION['errmsg']="");?>
            </span>
        </form>
    </div>

    

</body>

</html>