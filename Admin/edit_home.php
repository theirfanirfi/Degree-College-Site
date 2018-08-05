<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Home Details</h2>
            <hr />
             <?php
                        if (isset($_POST['send_home'])) {
                            $id = $_POST['home_details_id'];
                            $previous_img_name = $_POST['previous_img_name'];
                            $home_title = cleanInput($_POST['home_title']);
                            $home_description = cleanTextDetails($_POST['home_description']);
                            $image_name = $_FILES['home_image_name']['name'];
                            $image_size = $_FILES['home_image_name']['size'];
                            $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                            $image_extension = strtolower($image_extension);
                            $path = "../images/";
                            if (empty($home_title) || empty($home_description)) {
                                header("location:edit_home.php?id='$id'&&msg=empty");
                            } else if (empty($image_name)) {
                                $query = "update home_tbl set principal_msg_title = '$home_title', msg_description = '$home_description' where home_id = '$id' ";
                                if (mysqli_query($link, $query)) {
                                    header("location:all_home.php?msg=success");
                                } else {
                                    echo mysqli_error($link);
                                }
                            } else if (!empty($image_name)) {
                                if ($image_extension != "jpg" && $image_extension != "png" && $image_extension != "jpeg" && $image_extension != "gif") {
                                    header("location:edit_home.php?id='$id'&&msg=extension");
                                } else if ($image_size > 500000 || $image_size == 0) {
                                    header("location:edit_home.php?id='$id'&&msg=size");
                                } else {
                                    $q = "select * from home_tbl where principal_img_name = '$image_name'";
                                    $rs = mysqli_query($link, $q);
                                    if (mysqli_num_rows($rs) > 0) {
                                        header("location:edit_home.php?id='$id'&&msg=exists");
                                    } else {
                                        $query = "update home_tbl set principal_msg_title = '$home_title', msg_description = '$home_description', principal_img_name = '$image_name' where home_id = '$id'";
                                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['home_image_name']['tmp_name'], $path . $image_name) && unlink($path . $previous_img_name)) {
                                            header("location:all_home.php?msg=success");
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
                            $editHome = mysqli_query($link, "select * from home_tbl where home_id = '$id'");
                            if ($editData = mysqli_fetch_array($editHome)) {
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
                                <form name ="home_form" method="post" onsubmit="return edit_home_details()" action="edit_home.php" enctype="multipart/form-data">
                                    <div class="form-group font2">
                                        <label for="staffName">Principal Message Title</label>
                                        <input type="text" class="form-control" name="home_title" id="staffName" value="<?php echo $editData['principal_msg_title'] ?>" placeholder="Principal Message Title">
                                        <p class="help-block font3" id="home_title_error"></p>
                                    </div>
                                    <div class="form-group font2">
                                        <label for="textarea1">Message Description</label>
                                        <textarea class="editor form-control" name="home_description" id="textarea1" rows="8" placeholder=""><?php echo $editData['msg_description'] ?></textarea>
                                        <p class="help-block font3" id="home_description_error"></p>
                                    </div>
                                    <div class="form-group font2">
                                        <lable for="previous_img">Previous Image</lable><br>
                                        <img class="img-rounded" width="20%" height="100px" src="../images/homePageImages/<?php echo $editData['principal_img_name'] ?>">
                                    </div>
                                    <div class="form-group font2">
                                        <label for="principal_image_Name">Principal Image Name</label>
                                        <input type="file" class="form-control marg" name="home_image_name" id="principal_image_Name" placeholder="Principal Image Name">
                                        <p class="help-block font3" id="home_image_error"></p>    
                                    </div>
                                    <div class="text-right">
                                        <input type="hidden" name="home_details_id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="previous_img_name" value="<?php echo $editData['principal_img_name']; ?>">
                                        <input type="submit" class="btn btn-dark btn-style" value="EDIT Home" name="send_home" >
                                    </div>
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