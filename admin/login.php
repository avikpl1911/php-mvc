<?php 
include("../config/constants.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Login</title>
</head>
<body>
     <div class="login">
        <?php 
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <form action="" method="POST">
            <h2>Username:</h2>
            <input type="text" name="username" >
            <br>
            <h2>Password:</h2>
            <input type="password" name="password" >
            <br>
            <input type="submit" name="submit" value="">
        </form>
     </div>
     <?php 
     if(isset($_POST['submit'])){
         $username=$_POST['username'];
         $password=md5($_POST['password']);
        
         $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";
         $res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

         if($res==TRUE){
            $count = mysqli_num_rows($res);
            if($count==1){
                $_SESSION['login']="<div class='success'>Login Successful</div>";
                $_SESSION['user']=$username;
                header("location:".SITEURL."admin/manage-admin.php");
            }else{
                $_SESSION['login']="<div class='error'>login not successful</div>";
                header("location:".SITEURL."admin/login.php");
            }
            
         }

     }
     ?>
</body>
</html>