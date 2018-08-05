<?php 
require_once './header.php';
?>
<div class="right_col" rol="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Change User Name</h2>
            <hr />
            <?php
            if(isset($_POST['send_user_name'])){
             $current_user_name = cleanInput($_POST['current_user_name']) ;
             $current_password = cleanInput($_POST['current_password']);
             $new_user_name = cleanInput($_POST['new_user_name']);
             $current_user_name = md5($current_user_name);
             $current_password = md5($current_password);
             $query = mysqli_query($link, "select * from degree_admin where admin_name = '$current_user_name' and admin_pass = '$current_password'");
             if(empty($current_user_name)){
                 message('info', "Current User Name Are Recquired...");
             }else if(empty ($current_password)){
                  message('info', "Current Password Are Recquired...");
             }else if(empty ($new_user_name)){
                  message('info', "New User Name Are Recquired...");
             }else if(mysqli_num_rows($query) <= 0){
                 message('danger', "Current User Name And Password Is Incorrect");
             }else{
                 $new_user_name = md5($new_user_name);
                 $update_query = "update degree_admin set admin_name = '$new_user_name'";
                 if(mysqli_query($link, $update_query)){
                     $_SESSION['user_name'] =  $new_user_name;
                     message('success', "User Name Is Update Successfully Next LonIn With This UserName");
                 }
             }
            }
            ?>
            <form method="post" name="change_user_name_form" onsubmit="return change_user_name();" action="change_user_name.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="userName">Current User Name :</label>
                    <input type="text" class="form-control" name="current_user_name" id="userName" placeholder="Current User Name">
                    <p class="help-block font3" id="user_name_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="pass">Current Password :</label>
                    <input type="password" class="form-control" name="current_password" id="pass" placeholder="Password">
                    <p class="help-block font3" id="password_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="newUserName">New User Name :</label>
                    <input type="text" class="form-control" name="new_user_name" id="newUserName" placeholder="New User Name">
                    <p class="help-block font3" id="new_user_name_error"></p>
                </div> 
               <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_user_name" value="Change User Name">
                </div>
            </form>    
        </div>
    </div>
</div>
<?php
require_once './footer.php';
?>