<?php
require_once './header.php';
require_once '/../functions.php';

$Function = new Functions();
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Picture</h2>
            <hr />
            <?php
            if (isset($_POST['send_pic'])) {
                $picture_date = $_POST['picture_date'];
                $program_id = $_POST['program_id'];
                $image_name = $_FILES['picture_name']['name'];
                $image_size = $_FILES['picture_name']['size'];
                $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);
                $image_extension = strtolower($image_extension);
                $path = "../images/programpic/";
                if (empty($image_name) || empty($picture_date)) {
                    message("warning", "All Fields Are Required..??");
                } else if ($image_extension != "jpg" && $image_extension != "png" && $image_extension != "jpeg" && $image_extension != "gif") {
                    message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed 'Photo Cannot Added'");
                } else if ($image_size > 500000 || $image_size == 0) {
                    message("danger", "Your Image File Is To Large (>500kb), Image Cannot Added.");
                } else {
                    $q = "select * from program_gallery where img_name = '$image_name'";
                    $rs = mysqli_query($link, $q);
                    if (mysqli_num_rows($rs) > 0) {
                        message("info", "<span style='color:red'>The  Image With This Name Already Exists, Image is Not Added (Cahnge Image Name).</span>");
                    } else {
                        $query = "insert into program_gallery(img_name,img_date,program_id) values('$image_name','$picture_date','$program_id')";
                        if (mysqli_query($link, $query) && move_uploaded_file($_FILES['picture_name']['tmp_name'], $path . $image_name)) {
                            message("success", "Image is Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                }
            }
            ?>
            <form name="picture_form" method="post" action="add_program_picture.php" onsubmit="return add_picture();" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">Add Picture</label>
                    <input type="file" name="picture_name" class="form-control" id="staffName" />
                    <p class="help-block font3" id="picture_name_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="staffName">Program</label>
                    <br/>
                    <select style="width: 100%;padding: 8px;border-radius: 4px;" name="program_id">
                        <option>Select Program</option>
                        <?php 

                        $sql = "SELECT * FROM program_tbl";
                        $programs = $Function->find_by_sql_in_all($sql);
                        foreach ($programs as $program) { ?>
                        <option value="<?php echo $program->program_id; ?>"><?php echo $program->program_name; ?></option>
                        <?php } ?>


                    </select>
                    <p class="help-block font3" id="picture_name_error"></p>
                </div>

                <div class="form-group marg font2">
                    <label >Picture Date</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='date' class="form-control" name="picture_date" />
                        <span class="input-group-addon">
                        </span>
                    </div>
                    <p class="help-block font3" id="picture_date_error"></p>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_pic" value="ADD Picture"></div>
            </form>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>