<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Picture</h2>
            <hr />
            <?php
            if (isset($_POST['send_pic'])) {
                $picture_date = $_POST['picture_date'];
                $id = $_POST['edit_image_id'];
                $previous_img_name = $_POST['previous_img_name'];
                $image_name = $_FILES['picture_name']['name'];
                $image_size = $_FILES['picture_name']['size'];
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $image_extension = strtolower($image_extension);
                $path = "../images/galleryImages/";
                if (empty($picture_date)) {
                    header("location:edit_picture.php?id='$id'&&msg=empty");
                } else if (empty($image_name)) {
                    $query = "update gallery_tbl set image_date = '$picture_date' where image_id = '$id' ";
                    if (mysqli_query($link, $query)) {
                        header("location:all_pictures.php?msg=success");
                    } else {
                        echo mysqli_error($link);
                    }
                } else if (!empty($image_name)) {
                    if ($image_extension != "jpg" && $image_extension != "png" && $image_extension != "jpeg" && $image_extension != "gif") {
                        header("location:edit_picture.php?id='$id'&&msg=extension");
                    } else if ($image_size > 500000 || $image_size == 0) {
                        header("location:edit_picture.php?id='$id'&&msg=size");
                    } else {
                        $q = "select * from gallery_tbl where image_name = '$image_name'";
                        $rs = mysqli_query($link, $q);
                        if (mysqli_num_rows($rs) > 0) {
                            header("location:edit_picture.php?id='$id'&&msg=exists");
                        } else {
                            $query = "update gallery_tbl set image_name = '$image_name', image_date = '$picture_date' where image_id = '$id' ";
                            if (mysqli_query($link, $query) && move_uploaded_file($_FILES['picture_name']['tmp_name'], $path . $image_name) && unlink($path . $previous_img_name)) {
                                header("location:all_pictures.php?msg=success");
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
                $editGallery = mysqli_query($link, "select * from gallery_tbl where image_id = '$id'");
                if ($editData = mysqli_fetch_array($editGallery)) {
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "empty") {
                            message("warning", "All Fields Are Recquired.");
                        } else if ($_GET['msg'] == "extension") {
                            message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed 'Photo Cannot Added'");
                        } else if ($_GET['msg'] == "size") {
                            message("danger", "Your Image File Is To Large (>500kb), Image Cannot Added.");
                        } else if ($_GET['msg'] == "exists") {
                            message("info", "<span style='color:red'> The Gallery Image With This Name Already Exists, Gallery Image Are Not Added (Cahnge Image Name).</span>");
                        }
                    }
                    ?>
                    <form name="picture_form" method="post" action="edit_picture.php" onsubmit="return edit_picture();" enctype="multipart/form-data">
                        <div class="form-group font2">
                            <label for="staffName">Add Picture</label>
                            <input type="file" name="picture_name" class="form-control" id="staffName" />
                            <p class="help-block font3" id="picture_name_error"></p>
                        </div>
                        <div class="form-group font2">
                            <lable for="previous_img">Previous Image</lable><br>
                            <img class="img-rounded" width="20%" height="100px" src="../images/galleryImages/<?php echo $editData['image_name'] ?>">
                        </div>
                        <div class="form-group marg font2">
                            <label >Picture Date</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='date' class="form-control" name="picture_date" value="<?php echo $editData['image_date'] ?>" />
                                <span class="input-group-addon">
                                </span>
                            </div>
                            <p class="help-block font3" id="picture_date_error"></p>
                        </div>
                        <div class="text-right">
                            <input type="hidden" name="edit_image_id" value="<?php echo $editData['image_id'] ?>">
                            <input type="hidden" name="previous_img_name" value="<?php echo $editData['image_name']; ?>">
                            <input type="submit" class="btn btn-dark" name="send_pic" value="Edit Picture"></div>
                    </form>
                    <?php
                }
            }
            ?> 
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>