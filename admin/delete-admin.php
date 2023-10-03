<?php 

include('../config/constants.php');

?>

<?php
include('partials/menu.php') ;
?>

<?php 

$id = $_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res  = mysqli_query($conn , $sql) or die(mysqli_error($conn));

if($res==TRUE){
    $_SESSION['delete'] = "<div class = 'success'>admin deleted</div>";
    header("location:".SITEURL."admin/manage-admin.php");
}else{
    $_SESSION['delete'] = "<div class = 'error'>admin deleted</div>";
    header("location:".SITEURL."admin/manage-admin.php");
}
?>