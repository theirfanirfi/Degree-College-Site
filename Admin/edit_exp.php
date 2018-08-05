<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Experience or Affiliation</h2>
            <hr />
            <?php
            if (isset($_POST['send_academic'])) {
                $id = $_POST['edit_academic_id'];
                $academic_level = cleanInput($_POST['academic_level']);
                if (empty($academic_level)) {
                    header("location:edit_academic.php?id='$id'&&msg=empty");
                } else {
                    $query = "update experience_tbl set exp_name = '$academic_level' where exp_id = '$id'";
                    if (mysqli_query($link, $query)) {
                        header("location:all_exp.php?msg=success");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <?php
            if (isset($_GET['id'])) {
                $id = url($_GET['id']);
                $editAcademic = mysqli_query($link, "select * from experience_tbl where exp_id = '$id'");
                if ($editData = mysqli_fetch_array($editAcademic)) {
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "empty") {
                            message("warning", "All Fields Are Recquired..");
                        }
                    }
                    ?>
                    <form method="post" name="academic_form" action="edit_exp.php" onsubmit="return add_academic();" enctype="multipart/form-data">
                        <div class="form-group font2">
                            <label for="staffName">Academic Level</label>
                            <input type="text" class="form-control" name="academic_level" value="<?php echo $editData['exp_name'] ?>" id="staffName" placeholder="Experience">
                            <p class="help-block font3" id="academic_level_error"></p>
                        </div>
                        <div class="text-right">
                            <input type="hidden" name="edit_academic_id" value="<?php echo $editData['exp_id'] ?>">
                            <input type="submit" class="btn btn-dark btn-style" name="send_academic" value="EDIT Experience">
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