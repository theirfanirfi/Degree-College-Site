<?php
require_once './header.php';
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Merit List</h2>
            <hr />
            <?php
            if (isset($_POST['send_merit'])) {
                $id = $_POST['edit_merit_id'];
                $previous_file_name = $_POST['previous_file_name'];
                $merit_list_title = cleanInput($_POST['merit_list_title']);
                $merit_list_description = cleanTextDetails($_POST['merit_list_description']);
                $program_name_id = cleanInput($_POST['program_name_id']);
                $merit_date = $_POST['merit_date'];
                $file_name = $_FILES['merit_file_name']['name'];
                $file_size = $_FILES['merit_file_name']['size'];
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
                $file_extension = strtolower($file_extension);
                $path = "../Images/meritListFiles/";
                if (empty($merit_list_title) || empty($merit_list_description) || empty($merit_date) || $program_name_id == 0) {
                    header("location:edit_merit_list.php?id='$id'&&msg=empty");
                } else if (empty($file_name)) {
                    $query = "update merit_list_tbl set merit_list_title = '$merit_list_title', merit_list_description = '$merit_list_description', merit_list_date = '$merit_date', program_id = '$program_name_id' where merit_list_id = '$id'";
                    if (mysqli_query($link, $query)) {
                        header("location:all_merit_list.php?msg=success");
                    } else {
                        mysqli_error($link);
                    }
                } else if (!empty($file_name)) {
                    if ($file_extension != "pdf" && $file_extension != "docx" && $file_extension != "doc" && $file_extension != "dotx" && $file_extension != "dot" && $file_extension != "gif") {
                        header("location:edit_merit_list.php?id='$id'&&msg=extension");
                    } else if ($file_size > 2000000 || $file_size == 0) {
                        header("location:edit_merit_list.php?id='$id'&&msg=size");
                    } else {
                        $q = "select * from merit_list_tbl where merit_list_file_name = '$file_name'";
                        $rs = mysqli_query($link, $q);
                        if (mysqli_num_rows($rs) > 0) {
                            header("location:edit_merit_list.php?id='$id'&&msg=exists");
                        } else {
                            $query = "update merit_list_tbl set merit_list_title = '$merit_list_title', merit_list_description = '$merit_list_description', merit_list_date = '$merit_date', merit_list_file_name = '$file_name', program_id = '$program_name_id' where merit_list_id = '$id'";
                            if (mysqli_query($link, $query) && move_uploaded_file($_FILES['merit_file_name']['tmp_name'], $path . $file_name) && unlink($path . $previous_file_name)) {
                                header("location:all_merit_list.php?msg=success");
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
                $editMerit = mysqli_query($link, "select * from merit_list_tbl where merit_list_id = '$id'");
                if ($editData = mysqli_fetch_array($editMerit)) {
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "empty") {
                            message("warning", "All Fields Are Recquired..");
                        } else if ($_GET['msg'] == "extension") {
                            message("danger", "Sorry Only PDF, DOCX, DOC, DOTX, DOT, & GIF Files are Allowed 'File Cannot Added'");
                        } else if ($_GET['msg'] == "size") {
                            message("danger", "Your File Is To Large (>2MB), Image Cannot Added.");
                        } else if ($_GET['msg'] == "exists") {
                            message("danger", "The Merit List File With This Name Already Exists, Home Details Are Not Added <span style=color:blue>(Cahnge Image Name).</span>");
                        }
                    }
                    ?>
                    <?php
                    $program_id = $editData['program_id'];
                    $selectProgram = mysqli_query($link, "select * from program_tbl order by program_id asc")
                    ?>
                    <form name ="merit_form" method="post" onsubmit="return edit_merit_list()" action="edit_merit_list.php" enctype="multipart/form-data">
                        <div class="form-group font2">
                            <label for="meritTitle">Merit List Title</label>
                            <input type="text" class="form-control" name="merit_list_title" value="<?php echo $editData['merit_list_title'] ?>" id="meritTitle" placeholder="Merit List Title">
                            <p class="help-block font3" id="merit_title_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="meritText">Merit List Description</label>
                            <textarea class="editor form-control" name="merit_list_description" id="meritText" rows="8" placeholder=""> <?php echo $editData['merit_list_description'] ?> </textarea>
                            <p class="help-block font3" id="merit_description_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="meritImageName">Merit List File Name</label>
                            <input type="file" class="form-control marg" name="merit_file_name" id="meritImageName" >
                            <p class="help-block font3" id="merit_image_error"></p>    
                        </div>
                        <div class="form-group font2">
                            <label for="exampleSelect">Select Program</label><br>
                            <select class="form-control form-group" id="exampleSelect" name="program_name_id">
                                <option value="0">Select Program Name</option>
                                <?php while ($programData = mysqli_fetch_array($selectProgram)) {
                                    ?> 
                                    <option value="<?php echo $programData['program_id'] ?>" <?php if ($programData['program_id'] == $program_id) { ?> selected <?php } ?> > <?php echo $programData['program_name']; ?> </option>
        <?php } ?>
                            </select>
                            <p class="help-block font3" id="select_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="meritDate">Merit List Date</label>
                            <input type="date" class="form-control" name="merit_date" value="<?php echo $editData['merit_list_date'] ?>" id="meritDate" >
                            <p class="help-block font3" id="merit_date_error"></p>
                        </div>

                        <div class="text-right">
                            <input type="hidden" name="edit_merit_id" value="<?php echo $editData['merit_list_id'] ?>">
                            <input type="hidden" name="previous_file_name" value="<?php echo $editData['merit_list_file_name'] ?>">
                            <input type="submit" class="btn btn-dark btn-style" value="Edit Merit List" name="send_merit" >
                        </div>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>
<!-- /page content -->
<?php
require_once './footer.php';
?>