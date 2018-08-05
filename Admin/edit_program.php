<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Program</h2>
            <hr />
            <?php
            if (isset($_POST['send_program'])) {
                $pro_name = cleanInput($_POST['pro_name']);
                $program_description = cleanTextDetails($_POST['program_description']);
                $academic_level_id = $_POST['academic_level'];
                $edit_program_id = $_POST['edit_program_id'];
                if (empty($pro_name) || empty($program_description)) {
                    header("location:edit_program.php?id='$edit_program_id'&&msg=empty");
                } else {
                    $query = "update program_tbl set program_name = '$pro_name', program_description = '$program_description', academic_id = '$academic_level_id' where program_id = '$edit_program_id'";
                    if (mysqli_query($link, $query)) {
                        header("location:all_programs.php?msg=success");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <?php
            ?>
            <?php
            if (isset($_GET['id'])) {
                $id = url($_GET['id']);
                $editProgram = mysqli_query($link, "select * from program_tbl where program_id = '$id'");
                if ($editData = mysqli_fetch_array($editProgram)) {
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "empty") {
                            message("warning", "All Fields Are Recquired..");
                        }
                    }
                    $academic_id = $editData['academic_id'];
                    ?>
                    <form name="program_form" method="post" action="edit_program.php" onsubmit="return add_program();" enctype="multipart/form-data">
                        <div class="form-group font2">
                            <label for="staffName">Program Name</label>
                            <input type="text" class="form-control" value="<?php echo $editData['program_name'] ?>" id="staffName" name="pro_name" placeholder="Pre engineering OR Pre Medical etc....">
                            <p class="help-block font3" id="pro_name_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="programtext">Program Description</label>
                            <textarea class="editor form-control" name="program_description" id="programtext" rows="8" placeholder=""><?php echo $editData['program_description']?></textarea>
                            <p class="help-block font3" id="program_description_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="academiclevel">Academic Level</label>
                            <select class="form-control marg font-select" name="academic_level" id="academiclevel">
                                <?php
                                $academic_query = mysqli_query($link, "select * from academic_tbl");
                                while ($row = mysqli_fetch_array($academic_query)) {
                                    ?>
                                    <option value="<?php echo $row['academic_id'] ?>" <?php if ($row['academic_id'] == $academic_id) {
                            echo "selected";
                        } ?>> <?php echo $row['academic_level']; ?></option>
        <?php } ?>
                            </select>
                        </div>
                        <div class="text-right">
                            <input type="hidden" name="edit_program_id" value="<?php echo $editData['program_id']; ?>">
                            <input type="submit" class="btn btn-dark btn-style" name="send_program" value="EDIT Program"></div>
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