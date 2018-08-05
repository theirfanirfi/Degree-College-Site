<?php/*
require_once './header.php';
?>


This file is actually Not applicable currently.......... I Abdurrahman Commented This Code for future Use....

Discription This code is use for dynamic meritlest............


<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Merit List</h2>
            <hr />
            <?php
            if (isset($_POST['send_merit'])) {
                $id = $_POST['edit_std_id'];
                $std_name = cleanInput($_POST['std_name']);
                $std_fname = cleanInput($_POST['std_fname']);
                $std_domicile = cleanInput($_POST['std_domicile']);
                $std_address = cleanInput($_POST['std_address']);
                $std_ob_marks = cleanInput($_POST['std_ob_marks']);
                $program_name_id = $_POST['programName'];
                if (empty($std_name) || empty($std_fname) || empty($std_domicile) || empty($std_address) || empty($std_ob_marks) || $program_name_id == "0") {
                    message("warning", "All Fields Are Required.");
                } else {
                    $query = "update merit_list set std_name = '$std_name', std_fname = '$std_fname', domicile = '$std_domicile', address = '$std_address', marks_obtained = '$std_ob_marks', program_id = '$program_name_id' where std_id = '$id'";
                    if (mysqli_query($link, $query)) {
                        header("location:all_merit_list.php?msg=success");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <?php
            if(isset($_GET['id'])){
             $id = url($_GET['id']);   
            $editMetitList = mysqli_query($link, "select * from merit_list where std_id = '$id'");
            $editData = mysqli_fetch_array($editMetitList);
            ?>
            <form method="post" name="merit_list_form" onsubmit="return add_merit_list();" action="edit_merit_list.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="stdName">Name :</label>
                    <input type="text" class="form-control" name="std_name" value="<?php echo $editData['std_name'] ?>" id="stdName" placeholder="Student Name">
                    <p class="help-block font3" id="std_name_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdFName">Father Name :</label>
                    <input type="text" class="form-control" name="std_fname" value="<?php echo $editData['std_fname'] ?>" id="stdFName" placeholder="Father Name">
                    <p class="help-block font3" id="std_fname_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdDomicile">Domicile :</label>
                    <input type="text" class="form-control" name="std_domicile" value="<?php echo $editData['domicile'] ?>" id="stdDomicile" placeholder="Student Domicile">
                    <p class="help-block font3" id="std_domicile_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdAddress">Address :</label>
                    <input type="text" class="form-control" name="std_address" value="<?php echo $editData['address'] ?>" id="stdAddress" placeholder="Student Address">
                    <p class="help-block font3" id="std_address_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdMarks">Obtained Marks :</label>
                    <input type="text" class="form-control" name="std_ob_marks" value="<?php echo $editData['marks_obtained'] ?>" id="stdMarks" placeholder="Student Obtanined Marks">
                    <p class="help-block font3" id="std_marks_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="program">Program Name :</label>
                    <select class="form-control marg font-select" name="programName" id="program">
                        <option value="0">Select Program Name</option>
                        <?php 
                        $programQuery = mysqli_query($link, "select * from program_tbl");
                        while ($row = mysqli_fetch_array($programQuery)) { ?>
                            <option value="<?php echo $row['program_id'] ?>" <?php if( $editData['program_id'] == $row['program_id'] ){ echo "selected"; } ?>><?php echo $row['program_name']; ?></option>
                        <?php } ?>
                    </select>
                    <p class="help-block font3" id="academic_level_error"></p>
                </div>
                <div class="text-right">
                    <input type="hidden" name="edit_std_id" value="<?php echo $editData['std_id']?>">
                    <input type="submit" class="btn btn-dark btn-style" name="send_merit" value="Edit Merit List">
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
?>*/