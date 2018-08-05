<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Staff</h2>
            <hr />
            <?php
            if (isset($_POST['send_staff'])) {
                $id = $_POST['edit_staff_id'];
                $previous_image_name = $_POST['previous_image_name'];
                $te_name = cleanInput($_POST['te_name']);
                $te_designation = cleanInput($_POST['te_designation']);
                $te_qualification = cleanInput($_POST['te_qualification']);
                $te_email = cleanInput($_POST['te_email']);
                $program_name_id = cleanInput($_POST['program_name_id']);
                $te_image_name = $_FILES['te_picture']['name'];
                $te_image_size = $_FILES['te_picture']['size'];
                $te_image_extension = pathinfo($te_image_name, PATHINFO_EXTENSION);
                $te_image_extension = strtolower($te_image_extension);
                $path = "../images/staffsImages/";
                if (empty($te_name) || empty($te_designation) || empty($te_email) || empty($program_name_id)) {
                    header("location:edit_staff.php?id='$id'&&msg=empty");
                } else if (empty($te_image_name)) {
                    $update_query = "update staff_tbl set staff_name = '$te_name', staff_designation = '$te_designation', staff_qualification = '$te_qualification', staff_email = '$te_email', program_id = '$program_name_id' where staff_id = '$id'";
                    if (mysqli_query($link, $update_query)) {
                        header("location:all_staffs.php?msg=success");
                    }
                } else if (!empty($te_image_name)) {
                    if ($te_image_extension != "jpg" && $te_image_extension != "jpeg" && $te_image_extension != "png" && $te_image_extension != "gif") {
                        header("location:edit_staff.php?id='$id'&&msg=extension");
                    } else if ($te_image_size > 500000 || $te_image_size == 0) {
                        header("location:edit_staff.php?id='$id'&&msg=size");
                    } else {
                        $q = "select * from staff_tbl where staff_img_name = '$te_image_name'";
                        $rs = mysqli_query($link, $q);
                        if (mysqli_num_rows($rs) > 0) {
                            header("location:edit_staff.php?id='$id'&&msg=exist");
                        } else {
                            $query = "update staff_tbl set staff_name = '$te_name', staff_designation = '$te_designation', staff_qualification = '$te_qualification', staff_email = '$te_email', staff_img_name = '$te_image_name', program_id = '$program_name_id' where staff_id = '$id' ";
                            if (mysqli_query($link, $query) && move_uploaded_file($_FILES['te_picture']['tmp_name'], $path . $te_image_name) && unlink($path . $previous_image_name)) {
                                header("location:all_staffs.php?msg=success");
                            } else {
                                echo mysqli_error($link);
                            }
                        }
                    }
                }
            }
            ?>
            <?php
            if (isset($_GET['id'])) {
                $id = url($_GET['id']);
                $editStaff = mysqli_query($link, "select * from staff_tbl where staff_id = '$id'");
                $row = mysqli_fetch_array($editStaff);
                if (isset($_GET['msg'])) {
                    if ($_GET['msg'] == "empty") {
                        message("warning", "All Fields Are Required.");
                    } else if ($_GET['msg'] == "extension") {
                        message("danger", "Sorry Only JPG, JPEG, PNG, & GIF Files are Allowed <span style=color:red>'Photo Cannot Added.'</span>");
                    } else if ($_GET['msg'] == "size") {
                        message("danger", "Your Image File is to Large (>500kb), <span style=color:blue>'Photo Cannot Added'</span>");
                    } else if ($_GET['msg'] == "exist") {
                        message("danger", " The Teacher Image With This Name Is Alreday Exists , Add Staffs Are Not Added <span style=color:blue> (Change Image Name).</span>");
                    }
                }
                ?>
                <?php 
                $program_id = $row['program_id'];
                $selectProgram = mysqli_query($link, "select * from program_tbl ")?>
                <form method="post" name="staff_form" onsubmit="return edit_staff();" action="edit_staff.php" enctype="multipart/form-data">
                    <div class="form-group font2">
                        <label for="staffName">Name :</label>
                        <input type="text" class="form-control" name="te_name" value="<?php echo $row['staff_name'] ?>" id="staffName" placeholder="Teacher Name">
                        <p class="help-block font3" id="teacher_name"></p>
                    </div>
                    <div class="form-group font2">
                        <label for="designation">Designation :</label>
                        <input type="text" class="form-control" name="te_designation" value="<?php echo $row['staff_designation'] ?>" id="designation" placeholder="Designation">
                        <p class="help-block font3" id="teacher_designation"></p>
                    </div>
                    <div class="form-group font2">
                        <label for="qualification">Qualification :</label>
                        <input type="text" class="form-control" name="te_qualification" value="<?php echo $row['staff_qualification'] ?>" id="qualification" placeholder="Qualification">
                        <p class="help-block font3" id="teacher_qualification"></p>
                    </div>
                    <div class="form-group font2">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="te_email" value="<?php echo $row['staff_email'] ?>" id="email" placeholder="Email">
                        <p class="help-block font3" id="teacher_email"></p>
                    </div>
                    <div class="form-group font2">
                    <label for="exampleSelect">Select Program</label><br>
                    <select class="form-control form-group" id="exampleSelect" name="program_name_id">
                        <option value="0">Select Program Name</option>
                        <?php while($programData = mysqli_fetch_array($selectProgram)){?> 
                        <option value="<?php echo $programData['program_id']?>" <?php if($programData['program_id'] == $program_id){ echo "selected"; }?>> <?php echo $programData['program_name']; ?> </option>
                    <?php }?>
                    </select>
                    <p class="help-block font3" id="select_error"></p>
                </div>
                    <div class="form-group font2">
                        <label for="exampleInputFile">Previous Image</label><br>
                        <img class="img-rounded" width="20%" height="100px" src="../images/staffsImages/<?php echo $row['staff_img_name'] ?>">
                    </div>
                    <div class="form-group font2">
                        <label for="exampleInputFile">Upload Picture</label>
                        <input type="file" id="exampleInputFile" name="te_picture">
                        <p class="help-block font3" id="teacher_picture"></p>
                    </div>
                    <div class="text-right">
                        <input type="hidden" name="edit_staff_id" value="<?php echo $id; ?> " />
                        <input type="hidden" name="previous_image_name" value="<?php echo $row['staff_img_name']; ?>"/>
                        <input type="submit" class="btn btn-dark btn-style" name="send_staff" value="EDIT Staff">
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
?>