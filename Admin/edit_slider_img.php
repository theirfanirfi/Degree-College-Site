<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Slider Image</h2>
            <hr />
            <?php
            if (isset($_POST['send_slider'])) {
                $id = $_POST['edit_slider_img_id'];
                $privous_image_name = $_POST['privous_image_name'];
                $slider_img_title = cleanInput($_POST['slider_img_title']);
                $slider_image_name = $_FILES['slider_image']['name'];
                $slider_image_size = $_FILES['slider_image']['size'];
                $slider_image_extension = pathinfo($slider_image_name, PATHINFO_EXTENSION);
                $slider_image_extension = strtolower($slider_image_extension);
                $path = "../images/sliderImages/";
                if (empty($slider_img_title)) {
                    header("location:edit_slider_img.php?id='$id'&&msg=empty");
                } else if (empty($slider_image_name)) {
                    $q = "update slider_tbl set slider_img_title = '$slider_img_title' where slider_img_id = '$id'";
                    if (mysqli_query($link, $q)) {
                        header("location:all_slider_img.php?msg=success");
                    } else {
                      echo  mysqli_error($link);
                    }
                }else if(!empty ($slider_image_name)){ 
                 if ($slider_image_extension != "jpg" && $slider_image_extension != "jpeg" && $slider_image_extension != "png" && $slider_image_extension != "gif") {
                    header("location:edit_slider_img.php?id='$id'&&msg=extension");
                } else if ($slider_image_size > 500000 || $slider_image_size == 0) {
                    header("location:edit_slider_img.php?id='$id'&&msg=size");
                } else {
                    $q = "select * from slider_tbl where slider_img_name = '$slider_image_name'";
                    $rs = mysqli_query($link, $q);
                    if (mysqli_num_rows($rs) > 0) {
                        header("location:edit_slider_img.php?id='$id'&&msg=exist");
                    } else {
                        $query = "update slider_tbl set slider_img_title = '$slider_img_title', slider_img_name = '$slider_image_name' where slider_img_id = '$id'";
                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['slider_image']['tmp_name'], $path . $slider_image_name) && unlink($path . $privous_image_name)) {
                            header("location:all_slider_img.php?msg=success");
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
                $editSlider = mysqli_query($link, "select * from slider_tbl where slider_img_id = '$id'");
                $row = mysqli_fetch_array($editSlider);
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "empty") {
                        message("warning", "All Fields Are Required.");
                    } else if ($_GET['msg'] == "extension") {
                        message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed <span style=color:blue>'Photo Cannot Added.'</span>");
                    } else if ($_GET['msg'] == "size") {
                        message("danger", "Your Image File is to Large (>500kb), <span style=color:blue>'Photo Cannot Added'</span>");
                    } else if ($_GET['msg'] == "exist") {
                        message("info", " The Slider Image With This Name Is Alreday Exists , Add Staffs Are Not Added <span style=color:black>(Change Image Name).</span>");
                    }
                }
                ?>
                <form method="post" name="slider_form" onsubmit="return edit_slider();" action="edit_slider_img.php" enctype="multipart/form-data">
                    <div class="form-group font2">
                        <label for="imageTitle">Slider Image Title :</label>
                        <input type="text" class="form-control" name="slider_img_title" value="<?php echo $row['slider_img_title'] ?>" id="imageTitle" placeholder="Image Title">
                        <p class="help-block font3" id="slider_img_title_error"></p>
                    </div>
                    <div class="form-group font2">
                        <label for="exampleInputFile">Previous Image</label><br>
                        <img class="img-rounded" width="20%" height="100px" src="../images/sliderImages/<?php echo $row['slider_img_name'] ?>">
                    </div>
                    <div class="form-group font2">
                        <label for="exampleInputFile">Upload Slider Image</label>
                        <input type="file" id="exampleInputFile" name="slider_image">
                        <p class="help-block font3" id="slider_img_error"></p>
                    </div><div class="text-right">
                        <input type="hidden" name="privous_image_name" value="<?php echo $row['slider_img_name'] ?>">
                        <input type="hidden" name="edit_slider_img_id" value="<?php echo $row['slider_img_id'] ?>">
                        <input type="submit" class="btn btn-dark btn-style" name="send_slider" value="ADD Slider Image">
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <?php
}
?>
<?php
require_once './footer.php';
?>

