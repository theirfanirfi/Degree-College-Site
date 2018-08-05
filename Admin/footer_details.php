<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add Footer Details</h2>
            <hr />
            <?php
            if (isset($_POST['send_staff'])) {
                $ins_address = cleanInput($_POST['te_name']);
                $fburl = cleanInput($_POST['fburl']);
                $turl = cleanInput($_POST['turl']);
                $coName = cleanInput($_POST['contact_officer_name']);
                $coDesignation = cleanInput($_POST['contact_officer_designation']);
                $coPhone = cleanInput($_POST['contact_officer_phone']);
                $coMobile = cleanInput($_POST['contact_officer_mobile']);
                $te_email = cleanInput($_POST['te_email']);
                if (empty($ins_address) || empty($fburl) || empty($turl) || empty($coName) || empty($coDesignation) || empty($coPhone) || empty($coMobile) || empty($te_email)) {
                    message("warning", "All Fields Are Required.");
                }  else {
                        $query = "insert into footer_tbl(location,fb_url,twitter_url,contact_officer_name,contact_officer_designation,contact_officer_phone,contact_officer_mobile,contact_officer_email) values('$ins_address','$fburl','$turl','$coName','$coDesignation','$coPhone','$coMobile','$te_email')";
                        if (mysqli_query($link, $query)) {
                            message("success", "Teacher Details Are Added Successfully......");
                        } else {
                            echo mysqli_error($link);
                        }
                    }
                
            }
            ?>
            <?php $selectProgram = mysqli_query($link, "select * from program_tbl order by program_id asc")?>
            <form method="post" name="staff_form" onsubmit="return add_staff();" action="footer_details.php" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">Institute Address :</label>
                    <input type="text" class="form-control" name="te_name" id="staffName" placeholder="Address">
                    <p class="help-block font3" id="teacher_name"></p>
                </div>
                <label style="color: red;">Social Links</label>
                <div class="form-group font2">
                    <label for="designation">Facebook URL:</label>
                    <input type="text" class="form-control" name="fburl"id="designation" placeholder="Facebook URL">
                    <p class="help-block font3" id="teacher_designation"></p>
                </div>
                <div class="form-group font2">
                    <label for="qualification">Twitter URL:</label>
                    <input type="text" class="form-control" name="turl" id="qualification" placeholder="Twitter URL">
                    <p class="help-block font3" id="teacher_qualification"></p>
                </div>
                 <label style="color: red;">Contact Details</label>

                 <div class="form-group font2">
                    <label for="contact_officer_name">Contact Officer Name :</label>
                    <input type="text" class="form-control" name="contact_officer_name" id="" placeholder="Contact Officer Name">
                    <p class="help-block font3" id="teacher_email"></p>
                </div>


                <div class="form-group font2">
                    <label for="contact_officer_designation">Contact Officer Designation :</label>
                    <input type="text" class="form-control" name="contact_officer_designation" id="" placeholder="Contact Officer Designation">
                    <p class="help-block font3" id="teacher_email"></p>
                </div>

                 <div class="form-group font2">
                    <label for="contact_officer_phone">Contact Officer Phone Number :</label>
                    <input type="text" class="form-control" name="contact_officer_phone" id="" placeholder="Contact Officer Phone Number">
                    <p class="help-block font3" id="teacher_email"></p>
                </div>


                <div class="form-group font2">
                    <label for="contact_officer_mobile">Contact Officer Mobile Number :</label>
                    <input type="text" class="form-control" name="contact_officer_mobile" id="" placeholder="Contact Officer Mobile Number">
                    <p class="help-block font3" id="teacher_email"></p>
                </div>


                <div class="form-group font2">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control" name="te_email" id="email" placeholder="Email">
                    <p class="help-block font3" id="teacher_email"></p>
                </div>
                
                    
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_staff" value="ADD Footer Details">
                </div>
            </form>    

        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>