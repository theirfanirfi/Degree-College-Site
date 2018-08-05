<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Experience Center or Affiliation</h2>
            <hr />
            <?php
            if (isset($_POST['send_program'])) {
                $pro_name = cleanInput($_POST['pro_name']);
                $program_description = cleanTextDetails($_POST['program_description']);
                $academic_level_id = $_POST['academic_level'];
                if (empty($pro_name) || empty($program_description) || $academic_level_id == "0") {
                    message("warning", "All Fields Are Recquired....");
                } else {
                    $query = "insert into exp_aff_tbl(exp_aff_name,exp_aff_description,exp_aff_id) values('$pro_name','$program_description','$academic_level_id ')";
                    if (mysqli_query($link, $query)) {
                        message("success", "Center is Added Successfully......");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <?php
            $academic_query = mysqli_query($link, "select * from experience_tbl");
            ?>
            <form name="program_form" method="post" action="add_expcenter.php" onsubmit="return add_program();" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">Expereince or Affiliated Center  Name</label>
                    <input type="text" class="form-control" id="staffName" name="pro_name" placeholder="">
                    <p class="help-block font3" id="pro_name_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="programtext"> Description</label>
                    <textarea class="editor form-control" name="program_description" id="programtext" rows="8" placeholder=""></textarea>
                    <p class="help-block font3" id="program_description_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="academiclevel">Level</label>
                    <select class="form-control marg font-select" name="academic_level" id="academiclevel">
                        <option value="0">Select Level</option>
                        <?php while ($row = mysqli_fetch_array($academic_query)) { ?>
                            <option value="<?php echo $row['exp_id'] ?>"><?php echo $row['exp_name']; ?></option>
                        <?php } ?>
                    </select>
                    <p class="help-block font3" id="academic_level_error"></p>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_program" value="ADD Center"></div>
            </form>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>