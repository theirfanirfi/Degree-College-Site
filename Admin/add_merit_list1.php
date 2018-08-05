<?php
/*

This file is actually Not applicable currently.......... I Abdurrahman Commented This Code for future Use....

Discription This code is use for dynamic meritlest............   

require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Merit List</h2>
            <hr />
            <?php
            if (isset($_POST['send_merit'])) {
                $std_name = cleanInput($_POST['std_name']);
                $std_fname = cleanInput($_POST['std_fname']);
                $std_domicile = cleanInput($_POST['std_domicile']);
                $std_address = cleanInput($_POST['std_address']);
                $std_ob_marks = cleanInput($_POST['std_ob_marks']);
                $program_name_id = $_POST['programName'];
                if (empty($std_name) || empty($std_fname) || empty($std_domicile) || empty($std_address) || empty($std_ob_marks) || $program_name_id == "0") {
                    message("warning", "All Fields Are Required.");
                }else {
                        $query = "insert into merit_list(std_name,std_fname,domicile,address,marks_obtained,program_id) values('$std_name','$std_fname','$std_domicile','$std_address','$std_ob_marks','$program_name_id')";
                        if (mysqli_query($link, $query)) {
                            message("success", "Merit List Details Are Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                
            }
            ?>
            <?php
            $programQuery = mysqli_query($link, "select * from program_tbl"); 
            ?>
            <form method="post" name="merit_list_form" onsubmit="return add_merit_list1();" action="add_merit_list.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="stdName">Name :</label>
                    <input type="text" class="form-control" name="std_name" id="stdName" placeholder="Student Name">
                    <p class="help-block font3" id="std_name_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdFName">Father Name :</label>
                    <input type="text" class="form-control" name="std_fname"id="stdFName" placeholder="Father Name">
                    <p class="help-block font3" id="std_fname_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdDomicile">Domicile :</label>
                    <input type="text" class="form-control" name="std_domicile" id="stdDomicile" placeholder="Student Domicile">
                    <p class="help-block font3" id="std_domicile_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdAddress">Address :</label>
                    <input type="text" class="form-control" name="std_address" id="stdAddress" placeholder="Student Address">
                    <p class="help-block font3" id="std_address_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="stdMarks">Obtained Marks :</label>
                    <input type="text" class="form-control" name="std_ob_marks" id="stdMarks" placeholder="Student Obtanined Marks">
                    <p class="help-block font3" id="std_marks_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="program">Program Name :</label>
                    <select class="form-control marg font-select" name="programName" id="program">
                        <option value="0">Select Program Name</option>
                        <?php while ($row = mysqli_fetch_array($programQuery)) { ?>
                            <option value="<?php echo $row['program_id'] ?>"><?php echo $row['program_name']; ?></option>
                        <?php } ?>
                    </select>
                    <p class="help-block font3" id="academic_level_error"></p>
                </div>
               <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_merit" value="ADD Merit List">
                </div>
            </form>    
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>*/