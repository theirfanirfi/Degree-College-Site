<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add About Us</h2>
            <hr />
            <?php
            if (isset($_POST['send_about'])) {
                $about_title = cleanInput($_POST['about_title']);
                $about_description = cleanTextDetails($_POST['about_description']);
                if (empty($about_title) || empty($about_description)) {
                    message("warning", "All Fields Are Required");
                }else {
                        $query = "insert into about_us_tbl(about_us_title,about_us_description) values('$about_title','$about_description')";
                        if (mysqli_query($link, $query)) {
                            message("success", "About Us Details Are Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                }
            
            ?>
            <form name="about_form" method="post" action="add_about.php" onsubmit="return add_about()" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">About us Title</label>
                    <input type="text" class="form-control" name="about_title" id="staffName" placeholder="About us Title">
                    <p class="help-block font3" id="about_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="textarea2">About Description</label>
                    <textarea class="editor form-control" name="about_description" id="area" rows="8" placeholder=""></textarea>
                    <p class="help-block font3" id="about_description_error"></p>
                </div>
                <div class="text-right">
                    <input  type="submit" class="btn btn-dark btn-style" value="Add About" name="send_about">
                </div>
            </form>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>