<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit Contact Details</h2>
            <hr />
            <?php
            if (isset($_POST['send_contact'])) {
                echo $id = $_POST['edit_contact_id'];
                $job_title = cleanInput($_POST['job_title']);
                $phone_no = cleanInput($_POST['phone_no']);
                $mobile_no = cleanInput($_POST['mobile_no']);
                $email = cleanInput($_POST['email']);
                if (empty($job_title) || empty($phone_no) || empty($mobile_no) || empty($email)) {
                    message("warning", "All Fields Are Required.");
                } else {
                    $query = "update contact_tbl set job_title = '$job_title', phone_no = '$phone_no', mobile_no = '$mobile_no', email = '$email' where contact_id = '$id'";
                    if (mysqli_query($link, $query)) {
                        header("location:all_contacts.php?msg=success");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <?php
            if (isset($_GET['id'])) {
                $id = url($_GET['id']);
                $editContact = mysqli_query($link, "select * from contact_tbl where contact_id = '$id'");
                if ($dataContact = mysqli_fetch_array($editContact)) {
                    ?>
                    <form name="contact_form" method="post" action="edit_contact.php" onsubmit="return add_contact();" enctype="multipart/form-data">
                        <div class="form-group font2">
                            <label for="staffName">Job Title</label>
                            <input type="text" class="form-control" name="job_title" value="<?php echo $dataContact['job_title'] ?>" id="staffName" placeholder="Job Title">
                            <p class="help-block font3" id="job_title_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="designation">Phone No</label>
                            <input type="text" class="form-control" name="phone_no" value="<?php echo $dataContact['phone_no'] ?>" id="designation" placeholder="Phone Number">
                            <p class="help-block font3" id="phone_no_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="qualification">Mobile No</label>
                            <input type="text" class="form-control" name="mobile_no" value="<?php echo $dataContact['mobile_no'] ?>" id="qualification" placeholder="Mobile Number">
                            <p class="help-block font3" id="mobile_no_error"></p>
                        </div>
                        <div class="form-group font2 marg">
                            <label for="email">Email :</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $dataContact['email'] ?>" id="email" placeholder="Email">
                            <p class="help-block font3" id="email_error"></p>
                        </div>
                        <div class="text-right">
                            <input type="hidden" name="edit_contact_id" value="<?php echo $dataContact['contact_id'] ?> ">
                            <input type="submit" class="btn btn-dark btn-style" name="send_contact" value="ADD Contact">
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