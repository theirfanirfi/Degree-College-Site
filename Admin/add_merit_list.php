<?php
require_once './header.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Merit List</h2>
            <hr />
            <?php
            if (isset($_POST['send_merit'])) {
                $merit_list_title = cleanInput($_POST['merit_list_title']);
                $merit_list_description = cleanTextDetails($_POST['merit_list_description']);
                $merit_date = cleanInput($_POST['merit_date']);
                $program_name_id = cleanInput($_POST['program_name_id']);
                $file_name = $_FILES['merit_file_name']['name'];
                $file_size = $_FILES['merit_file_name']['size'];
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_extension = strtolower($file_extension);
                $path = "../images/meritListfiles/";
                if (empty($merit_list_title) || empty($merit_list_description) || empty($file_name) || empty($merit_date)|| $program_name_id == 0) {
                    message("warning", "All Fields Are Required");
                } else if (fileExtension($file_extension)) {
                    message("danger", "Sorry Only PDF, DOCX, DOC, DOT, DOT, DOCM, DOTX, DOTM, DOCB, XLS, XLT, XLM, XLSX, XLSM, XLRX, XLTM, XLSB, XLA, XLAM, XLL, & XLW Files are Allowed File Cannot Added");
                } else if ($file_size > 2000000 || $file_size == 0) {
                    message("danger", "Your Image File Is To Large (>2MB), File Cannot Added.");
                } else {
                    $q = "select * from merit_list_tbl where merit_list_file_name = '$file_name'";
                    $rs = mysqli_query($link, $q);
                    if (mysqli_num_rows($rs) > 0) {
                        message("danger", "The Achievement File With This Name Already Exists, Merit List Are Not Added <span style=color:blue>(Cahnge File Name).</span>");
                    } else {
                        $query = "insert into merit_list_tbl(merit_list_title,merit_list_description,merit_list_file_name,merit_list_date,program_id) values('$merit_list_title', '$merit_list_description', '$file_name', '$merit_date','$program_name_id')";
                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['merit_file_name']['tmp_name'], $path . $file_name)) {
                            message("success", "Merit List Are Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                }
            }
            ?>
            <?php $selectProgram = mysqli_query($link, "select * from program_tbl order by program_id asc")?>
            <form name ="merit_form" method="post" onsubmit="return add_merit_list()" action="add_merit_list.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="meritTitle">Merit List Title</label>
                    <input type="text" class="form-control" name="merit_list_title" id="meritTitle" placeholder="Merit List Title">
                    <p class="help-block font3" id="merit_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="meritText">Merit list Description</label>
                    <textarea class="editor form-control" name="merit_list_description" id="meritText" rows="8" placeholder=""></textarea>
                    <p class="help-block font3" id="merit_description_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="meritFileName">Merit list File Name</label>
                    <input type="file" class="form-control marg" name="merit_file_name" id="meritFileName">
                    <p class="help-block font3" id="merit_file_error"></p>    
                </div>
                <div class="form-group font2">
                    <label for="exampleSelect">Select Program</label><br>
                    <select class="form-control form-group" id="exampleSelect" name="program_name_id">
                        <option value="0">Select Program Name</option>
                        <?php while($programData = mysqli_fetch_array($selectProgram)){?> 
                        <option value="<?php echo $programData['program_id']?>"> <?php echo $programData['program_name'] ?> </option>
                    <?php }?>
                    </select>
                    <p class="help-block font3" id="select_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="meritDate">Merit List Date</label>
                    <input type="date" class="form-control" name="merit_date" id="meritDate">
                    <p class="help-block font3" id="merit_date_error"></p>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" value="ADD Merit List" name="send_merit" >
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
require_once './footer.php';
?>