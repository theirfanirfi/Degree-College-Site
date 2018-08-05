<?php
require_once './header.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Home Details</h2>
            <hr />
            <?php
            if (isset($_POST['send_home'])) {
                $home_title = cleanInput($_POST['home_title']);
                $home_description = cleanTextDetails($_POST['home_description']);
                $image_name = $_FILES['home_image_name']['name'];
                $image_size = $_FILES['home_image_name']['size'];
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $image_extension = strtolower($image_extension);
                $path = "../images/";
                if (empty($home_title) || empty($home_description) || empty($image_name)) {
                    message("warning", "All Fields Are Required");
                } else if ($image_extension != "jpg" && $image_extension != "png" && $image_extension != "jpeg" && $image_extension != "gif") {
                    message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed 'Photo Cannot Added'");
                } else if ($image_size > 500000 || $image_size == 0) {
                    message("danger", "Your Image File Is To Large (>500kb), Image Cannot Added.");
                } else {
                    $q = "select * from home_tbl where principal_img_name = '$image_name'";
                    $rs = mysqli_query($link, $q);
                    if (mysqli_num_rows($rs) > 0) {
                        message("info", "<span style='color:red'> The Principal Image With This Name Already Exists, Home Details Are Not Added (Cahnge Image Name).</span>");
                    } else {
                        $query = "insert into home_tbl(principal_msg_title,msg_description,principal_img_name) values('$home_title','$home_description','$image_name')";
                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['home_image_name']['tmp_name'], $path . $image_name)) {
                            message("success", "Home Details Are Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                }
            }
            ?>
            <form name ="home_form" method="post" onsubmit="return add_home_details()" action="add_home.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">Principal Message Title</label>
                    <input type="text" class="form-control" name="home_title" id="staffName" placeholder="Principal Message Title">
                    <p class="help-block font3" id="home_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="textarea1">Message Description</label>
                    <textarea class="editor form-control" name="home_description" id="textarea1" rows="8" placeholder=""></textarea>
                    <p class="help-block font3" id="home_description_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="principal_image_Name">Principal Image Name</label>
                    <input type="file" class="form-control marg" name="home_image_name" id="principal_image_Name" placeholder="Principal Image Name">
                    <p class="help-block font3" id="home_image_error"></p>    
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" value="ADD Home" name="send_home" >
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
require_once './footer.php';
?>