<?php
require_once './header.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Activities</h2>
            <hr />
            <?php
            if (isset($_POST['send_achievement'])) {
                $achievement_title = cleanInput($_POST['achievement_title']);
                $achievement_description = cleanTextDetails($_POST['achievement_description']);
                $image_name = $_FILES['achievement_image_name']['name'];
                $image_size = $_FILES['achievement_image_name']['size'];
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $image_extension = strtolower($image_extension);
                $path = "../Images/achievementImages/";
                if (empty($achievement_title) || empty($achievement_description) || empty($image_name)) {
                    message("warning", "All Fields Are Required");
                } else if ($image_extension != "jpg" && $image_extension != "png" && $image_extension != "jpeg" && $image_extension != "gif") {
                    message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed 'Photo Cannot Added'");
                } else if ($image_size > 500000 || $image_size == 0) {
                    message("danger", "Your Image File Is To Large (>500kb), Image Cannot Added.");
                } else {
                    $q = "select * from our_achievement_tbl where achievement_image_name = '$image_name'";
                    $rs = mysqli_query($link, $q);
                    if (mysqli_num_rows($rs) > 0) {
                        message("info", "<span style='color:red'> The Achievement Image With This Name Already Exists, Our Achievement Are Not Added (Cahnge Image Name).</span>");
                    } else {
                        $query = "insert into our_achievement_tbl(achievement_title,achievement_description,achievement_image_name) values('$achievement_title','$achievement_description','$image_name')";
                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['achievement_image_name']['tmp_name'], $path . $image_name)) {
                            message("success", "Our Achievement Are Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                }
            }
            ?>
            <form name ="achievement_form" method="post" onsubmit="return add_achievement()" action="add_activities.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="ourAchievement">Our Activities Title</label>
                    <input type="text" class="form-control" name="achievement_title" id="ourAchievement" placeholder="Our Activities Title">
                    <p class="help-block font3" id="achievement_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="achievementText">Activities Description</label>
                    <textarea class="editor form-control" name="achievement_description" id="achievementText" rows="8" placeholder=""></textarea>
                    <p class="help-block font3" id="achievement_description_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="achievement_image_Name">Activities Image Name</label>
                    <input type="file" class="form-control marg" name="achievement_image_name" id="achievement_image_Name" placeholder="Achievement Image Name">
                    <p class="help-block font3" id="achievement_image_error"></p>    
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" value="ADD Activities" name="send_achievement" >
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
require_once './footer.php';
?>