<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit About Us Details</h2>
            <hr />
            <?php
            if (isset($_POST['send_about'])) {
                $id = $_POST['edit_about_id'];
                $about_title = cleanInput($_POST['about_title']);
                $about_description = cleanTextDetails($_POST['about_description']);
                if (empty($about_title) || empty($about_description)) {
                    message("warning", "All Fields Are Required");
                } else {
                    $query = "update about_us_tbl set about_us_title = '$about_title', about_us_description = '$about_description' where about_us_id = '$id'";
                    if (mysqli_query($link, $query)) {
                        header("location:all_abouts.php?msg=success");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <?php
            if(isset($_GET['id'])){
              $id = url($_GET['id']);
              $editAbout = mysqli_query($link, "select * from about_us_tbl where about_us_id = '$id'");
              $editData = mysqli_fetch_array($editAbout);
            
            ?>
            <form name="about_form" method="post" action="edit_about.php" onsubmit="return add_about()" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">About us Title</label>
                    <input type="text" class="form-control" name="about_title" value="<?php echo $editData['about_us_title'] ?> " id="staffName" placeholder="About us Title">
                    <p class="help-block font3" id="about_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="textarea2">About Description</label>
                    <textarea class="editor form-control" name="about_description" id="area" rows="8" placeholder=""> <?php echo $editData['about_us_description'] ?> </textarea>
                    <p class="help-block font3" id="about_description_error"></p>
                </div>
                <div class="text-right">
                    <input type="hidden" name="edit_about_id" value="<?php echo $editData['about_us_id']?>">
                    <input  type="submit" class="btn btn-dark btn-style" value="Add About" name="send_about">
                </div>
            </form>
            <?php
            }
            ?>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>