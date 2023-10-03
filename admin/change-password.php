<?php
include('partials/menu.php') ;
?>
<?php 
$id = $_GET['id'];

?>
<div class="main-content">
<div class="wrapper">
    <form action="" method="POST">
        <tr>
            <td>Current Password:</td>
            <td>
                <input type="text" name="current_password" placeholder="Old password">
            </td>
        </tr>
        <br/>
        <tr>
        <td>New Password:</td>
            <td>
            <input type="text" name="new_password" placeholder="New password" id="">
        
            </td>
            
        </tr>
        <br/>
        <tr>
        <td>Confirm Password:</td>
            <td>
            <input type="text" name="confirm_password" placeholder="Confirm password" id="">
        
            </td>
            
        </tr>
        <br/>
        <tr>
            <td>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="change password">
            </td>
        </tr>
        
    </form>
</div>
</div>



<?php 
   if(isset($_POST['submit'])){
     $id=$_POST['id'];
     $currentpassword = md5($_POST['current_password']);
     $newpassword=md5($_POST['new_password']);
     $confirmpassword=md5($_POST['confirm_password']);

     $sql = "SELECT * FROM tbl_admin WHERE id='$id' AND password='$currentpassword'";

     $res=mysqli_query($conn,$sql) or die(mysqli_error($conn));

     if($res==TRUE){
        $count = mysqli_num_rows($res);

        if($count==1){

            if($newpassword==$confirmpassword){
                $sql2 = "UPDATE tbl_admin SET
                password='$newpassword'
                WHERE id=$id
                ";
                $res2=mysqli_query($conn,$sql2);

                if($res2==TRUE){
                    $_SESSION['change-password']="<div class='success' > Password Changed </div>";
                    header("location:".SITEURL."admin/manage-admin.php");
                }else{
                    $_SESSION['change-password']="<div class='error' > Password Not Changed </div>";
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }else{
                echo "new Passwords don't match";
            }
             
        }else{
            $_SESSION['change-password']="<div class='error' > user not found </div>";
            header("location:".SITEURL."admin/manage-admin.php");
        }
     }
   }
?>

<?php
include('partials/footer.php');
?>