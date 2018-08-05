<?php
require_once './header.php';
?>
<div class="right_col" rol="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Change Password</h2>
            <hr />
            <?php
            if (isset($_POST['send_pass'])) {
                $current_user_name = cleanInput($_POST['current_user_name']);
                $current_password = cleanInput($_POST['current_password']);
                $new_password = cleanInput($_POST['new_password']);
                $confirm_password = cleanInput($_POST['confirm_password']);
                $current_user_name = md5($current_user_name);
                $current_password = md5($current_password);
                $query = mysqli_query($link, "select * from degree_admin where admin_name = '$current_user_name' and admin_pass = '$current_password'");
                if (empty($current_user_name)) {
                    message('info', "Current User Name Are Recquired...");
                } else if (empty($current_password)) {
                    message('info', "Current Password Are Recquired...");
                } else if (empty($new_password)) {
                    message('info', "New Password Are Recquired...");
                } else if (empty($confirm_password)) {
                    message('info', "Confirm Password Are Recquired...");
                } else if (mysqli_num_rows($query) <= 0) {
                    message('danger', "Current User Name And Password Is Incorrect");
                } else if ($new_password != $confirm_password) {
                    message('info', "The New Password And Confirm Password Dos Not Match.");
                } else {
                    $new_password = md5($new_password);
                    $update_query = "update degree_admin set admin_pass = '$new_password'";
                    if (mysqli_query($link, $update_query)) {
                        $_SESSION['user_pass'] = $new_password;
                        message('success', "Password Is Update Successfully Next LogIn With This Password");
                    }
                }
            }
            ?>
            <form method="post" name="change_password_form" onsubmit="return change_password();" action="change_password.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="userName">Current User Name :</label>
                    <input type="text" class="form-control" name="current_user_name" id="userName" placeholder="User Name">
                    <p class="help-block font3" id="user_name_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="pass">Current Password :</label>
                    <input type="password" class="form-control" name="current_password" id="pass" placeholder="Current Password">
                    <p class="help-block font3" id="password_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="newPass">New Password :</label>
                    <input type="password" class="form-control" name="new_password" id="newPass" placeholder="New Password">
                    <p class="help-block font3" id="new_password_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="confirmPass">Confirm Password :</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirmPass" placeholder="Confirm Password">
                    <p class="help-block font3" id="confirm_pass_error"></p>
                </div> 
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_pass" value="Change Password">
                </div>
            </form>    
        </div>
    </div>
</div>
<?php
require_once './footer.php';
?>