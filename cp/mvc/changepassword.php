<?php
include("../configs/config.php");
?>

<?php
if (isset($_POST['update_password'])) {
    $old_user_password 		  = trim($_POST['old_user_password']);
    $user_password 			  = trim($_POST['user_password']);
    $user_retype_password 	  = trim($_POST['user_retype_password']);

    $old_user_password_db 	  = md5($old_user_password); 

    $check_old_password 	  = mysqli_query($con, "SELECT * FROM `doctor_user` WHERE `user_id`='$logged_user_id' AND `user_password`='$old_user_password_db' AND `status`=1");

    if (mysqli_num_rows($check_old_password) != 1) {
        echo "Incorrect old password. Please re-enter.";
    } elseif ($user_password != $user_retype_password) {
        echo "Passwords do not match. Please re-enter.";
    } else {
        $user_password_db = md5($user_password);

        $update_query = mysqli_query($con, "UPDATE `doctor_user` SET `user_password`='$user_password_db' WHERE `status`=1 AND `user_id`='$logged_user_id'");

        if ($update_query) {
            echo "Updated Successfully";
        } else {
            echo "Failed! Try Again";
        }
    }
}
?>

<h3 class="mt-4">Change your password</h3>

<div class="alert alert-danger">
  <strong>Change Password!</strong><br>Please use strong password. Do not use '123' or 'abc' type password
</div>

<div class="p-5">

    <form action="" method="POST">

        <label for="old_user_password">Old Password:</label><br>
        <input type="password" id="old_user_password" name="old_user_password" required><br>

        <label for="user_password">New Password:</label><br>
        <input type="password" id="user_password" name="user_password" required><br>

        <label for="user_retype_password">Re-type Password:</label><br>
        <input type="password" id="user_retype_password" name="user_retype_password" required><br>

        <input type="submit" name="update_password" value="Submit">
    </form>
</div>



