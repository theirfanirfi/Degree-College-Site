<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Contact</h2>
            <hr />
            <?php
            if (isset($_POST['send_contact'])) {
                $job_title = cleanInput($_POST['job_title']);
                $phone_no = cleanInput($_POST['phone_no']);
                $mobile_no = cleanInput($_POST['mobile_no']);
                $email = cleanInput($_POST['email']);
                if (empty($job_title) || empty($phone_no) || empty($mobile_no) || empty($email)) {
                    message("warning", "All Fields Are Required.");
                } else {
                    $query = "insert into contact_tbl(job_title,phone_no,mobile_no,email) values('$job_title','$phone_no','$mobile_no','$email')";
                    if (mysqli_query($link, $query)) {
                        message("success", "Contact Details Are Added Successfully......");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <form name="contact_form" method="post" action="add_contact.php" onsubmit="return add_contact();" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">Job Title</label>
                    <input type="text" class="form-control" name="job_title" id="staffName" placeholder="Job Title">
                    <p class="help-block font3" id="job_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="designation">Phone No</label>
                    <input type="text" class="form-control" name="phone_no" id="designation" placeholder="Phone Number">
                    <p class="help-block font3" id="phone_no_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="qualification">Mobile No</label>
                    <input type="text" class="form-control" name="mobile_no" id="qualification" placeholder="Mobile Number">
                    <p class="help-block font3" id="mobile_no_error"></p>
                </div>
                <div class="form-group font2 marg">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    <p class="help-block font3" id="email_error"></p>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_contact" value="ADD Contact">
                </div>
            </form>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>