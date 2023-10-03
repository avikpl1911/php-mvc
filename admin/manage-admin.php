<?php
include('partials/menu.php');
?>
<!-- Main Content Section Start -->
<div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>


        <br /><br />

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
         <?php
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        ?>
         <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
         <?php
        if (isset($_SESSION['change-password'])) {
            echo $_SESSION['change-password'];
            unset($_SESSION['change-password']);
        }
        ?>
        <br /><br />
        <a href="add-admin.php" class="btn-primary">Add Admin</a>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>username</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM tbl_admin";

            $res = mysqli_query($conn, $sql);
            $sn = 1;
            if ($res == TRUE) {
                $count = mysqli_num_rows($res);

                if ($count > 0) {
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $fullname = $rows['full_name'];
                        $username = $rows['username'];

            ?>

                        <tr>
                            <td><?php echo $sn++ ?>.</td>
                            <td><?php echo $fullname ?></td>
                            <td><?php echo $username ?></td>
                            <td>
                            <a class="btn-secondary" style="background-color: blueviolet;" href="<?php echo SITEURL ?>admin/change-password.php?id=<?php echo $id ?>">Change Password</a>
                                <a class="btn-secondary" style="color: black;" href="<?php echo SITEURL ?>admin/update-admin.php?id=<?php echo $id ?>">Update Admin</a>
                                <a class="btn-danger" href="<?php echo SITEURL ?>admin/delete-admin.php?id=<?php echo $id ?>">Delete admin</a>
                            </td>
                        </tr>


            <?php



                    }
                } else {
                }
            }
            ?>

        </table>
    </div>

</div>
<!-- Main Content Section End -->
<?php
include('partials/footer.php')
?>