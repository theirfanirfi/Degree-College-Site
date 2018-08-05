<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Experience</h2>
            <hr />
            <?php
            if (isset($_POST['send_academic'])) {
                $academic_level = cleanInput($_POST['academic_level']);
                if (empty($academic_level)) {
                    message("warning", "All Fields Are Required");
                } else {
                    $query = "insert into experience_tbl(exp_name) values('$academic_level')";
                    if (mysqli_query($link, $query)) {
                        message("success", "Experience Level is Added Successfully......");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <form method="post" name="academic_form" action="add_experience.php" onsubmit="return add_academic();" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">Experience Level</label>
                    <input type="text" class="form-control" name="academic_level" id="staffName" placeholder="">
                    <p class="help-block font3" id="academic_level_error"></p>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_academic" value="ADD Experience Level">
                </div>
            </form>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>