<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Slider Image</h2>
            <hr />
            <?php
            if (isset($_POST['send_slider'])) {
                $slider_img_title = cleanInput($_POST['slider_img_title']);
                $slider_image_name = $_FILES['slider_image']['name'];
                $slider_image_size = $_FILES['slider_image']['size'];
                $slider_image_extension = pathinfo($slider_image_name, PATHINFO_EXTENSION);
                $slider_image_extension = strtolower($slider_image_extension);
                $path = "../images/sliderimages/";
                if (empty($slider_img_title) || empty($slider_image_name)) {
                    message("warning", "All Fields Are Required.");
                } else if ($slider_image_extension != "jpg" && $slider_image_extension != "jpeg" && $slider_image_extension != "png" && $slider_image_extension != "gif") {
                    message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed <span style=color:blue>'Photo Cannot Added'</span>");
                } else if ($slider_image_size > 500000 || $slider_image_size == 0) {
                    message("danger", "Your Image File is to Large (>500kb), <span style=color:blue>'Photo Cannot Added'</span>");
                } else {
                    $q = "select * from slider_tbl where slider_img_name = '$slider_image_name'";
                    $rs = mysqli_query($link, $q);
                    if (mysqli_num_rows($rs) > 0) {
                        message("info", "<span style=color:red> The Slider Image With This Name Is Alreday Exists , Add Slider Image Are Not Added (Change Image Name).</span>");
                    } else {
                        $query = "insert into slider_tbl(slider_img_title,slider_img_name) values('$slider_img_title','$slider_image_name')";
                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['slider_image']['tmp_name'], $path . $slider_image_name)) {
                            message("success", "Slider Image Are Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                }
            }
            ?>
            <form method="post" name="slider_form" onsubmit="return add_slider();" action="add_slider_img.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="imageTitle">Slider Image Title :</label>
                    <input type="text" class="form-control" name="slider_img_title" id="imageTitle" placeholder="Image Title">
                    <p class="help-block font3" id="slider_img_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="exampleInputFile">Upload Slider Image</label>
                    <input type="file" id="exampleInputFile" name="slider_image">
                    <p class="help-block font3" id="slider_img_error"></p>
                </div><div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_slider" value="ADD Slider Image">
                </div>
            </form>    
        </div>
    </div>
</div>
<?php
require_once './footer.php';
?>

