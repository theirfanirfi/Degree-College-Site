<?php
require_once './header.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Activities</h2>
            <hr />
            <?php
            if (isset($_POST['send_achievement'])) {
                $id = $_POST['edit_achievement_id'];
                $previous_image_name = $_POST['previous_image_name'];
                $achievement_title = cleanInput($_POST['achievement_title']);
                $achievement_description = cleanTextDetails($_POST['achievement_description']);
                $image_name = $_FILES['achievement_image_name']['name'];
                $image_size = $_FILES['achievement_image_name']['size'];
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $image_extension = strtolower($image_extension);
                $path = "../Images/achievementImages/";
                if (empty($achievement_title) || empty($achievement_description)) {
                    header("location:edit_activities.php?id='$id'&&msg=empty");
                }else if(empty ($image_name)){
                    $query = "update our_achievement_tbl set achievement_title = '$achievement_title', achievement_description = '$achievement_description' where achievement_id = '$id'";
                    if(mysqli_query($link, $query)){
                        header("location:all_activities.php?msg=success");
                    }else{
                        mysqli_error($link);
                    }
                }else if(!empty ($image_name)){
                if ($image_extension != "jpg" && $image_extension != "png" && $image_extension != "jpeg" && $image_extension != "gif") {
                    header("location:edit_activities.php?id='$id'&&msg=extension");
                } else if ($image_size > 500000 || $image_size == 0) {
                    header("location:edit_activities.php?id='$id'&&msg=size");
                } else {
                    $q = "select * from our_achievement_tbl where achievement_image_name = '$image_name'";
                    $rs = mysqli_query($link, $q);
                    if (mysqli_num_rows($rs) > 0) {
                        header("location:edit_activities.php?id='$id'&&msg=exists");
                    } else {
                        $query = "update our_achievement_tbl set achievement_title = '$achievement_title', achievement_description = '$achievement_description', achievement_image_name = '$image_name' where achievement_id = '$id'";
                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['achievement_image_name']['tmp_name'], $path . $image_name) && unlink($path. $previous_image_name)) {
                            header("location:all_activities.php?msg=success");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                }
            }
            }
            ?>
            <?php
            if (isset($_GET['id'])) {
                $id = url($_GET['id']);
                $editAchievement = mysqli_query($link, "select * from our_achievement_tbl where achievement_id = '$id'");
                if ($editData = mysqli_fetch_array($editAchievement)) {
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "empty") {
                            message("warning", "All Fields Are Recquired..");
                        } else if ($_GET['msg'] == "extension") {
                            message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed 'Photo Cannot Added'");
                        } else if ($_GET['msg'] == "size") {
                            message("danger", "Your Image File Is To Large (>500kb), Image Cannot Added.");
                        } else if ($_GET['msg'] == "exists") {
                            message("info", " <span style='color:red'> The Principal Image With This Name Already Exists, Home Details Are Not Added (Cahnge Image Name).</span>");
                        }
                    }
                    ?>
            <form name ="achievement_form" method="post" onsubmit="return edit_achievement()" action="edit_activities.php" enctype="multipart/form-data">
                        <div class="form-group font2">
                            <label for="ourAchievement">Our Activities Title</label>
                            <input type="text" class="form-control" name="achievement_title" value="<?php echo $editData['achievement_title'] ?>" id="ourAchievement" placeholder="Our Activities Title">
                            <p class="help-block font3" id="achievement_title_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="achievementText">Activities Description</label>
                            <textarea class="editor form-control" name="achievement_description" id="achievementText" rows="8" placeholder=""> <?php echo $editData['achievement_description'] ?> </textarea>
                            <p class="help-block font3" id="achievement_description_error"></p>
                        </div>
                        <div class="form-group font2">
                                        <lable for="previous_img">Previous Image</lable><br>
                                        <img class="img-rounded" width="20%" height="100px" src="../Images/achievementImages/<?php echo $editData['achievement_image_name'] ?>">
                                    </div>
                        <div class="form-group font2">
                            <label for="achievement_image_Name">Activities Image Name</label>
                            <input type="file" class="form-control marg" name="achievement_image_name" id="achievement_image_Name" >
                            <p class="help-block font3" id="achievement_image_error"></p>    
                        </div>
                        <div class="text-right">
                            <input type="hidden" name="edit_achievement_id" value="<?php echo $editData['achievement_id']?>">
                            <input type="hidden" name="previous_image_name" value="<?php echo $editData['achievement_image_name'] ?>">
                            <input type="submit" class="btn btn-dark btn-style" value="Edit Achievement" name="send_achievement" >
                        </div>
                    </form>
                <?php }
            }
            ?>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
require_once './footer.php';
?>