<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Academic</h2>
            <hr />
            <?php
            if (isset($_POST['send_academic'])) {
                $academic_level = cleanInput($_POST['academic_level']);
                if (empty($academic_level)) {
                    message("warning", "All Fields Are Required");
                } else {
                    $query = "insert into academic_tbl(academic_level) values('$academic_level')";
                    if (mysqli_query($link, $query)) {
                        message("success", "Academic Level Are Added Successfully......");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <form method="post" name="academic_form" action="add_academic.php" onsubmit="return add_academic();" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">Academic Level</label>
                    <input type="text" class="form-control" name="academic_level" id="staffName" placeholder="Intermediate OR Degree">
                    <p class="help-block font3" id="academic_level_error"></p>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_academic" value="ADD Academic">
                </div>
            </form>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>