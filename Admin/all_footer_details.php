<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Footer Details</h2>
            <hr />
             <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "About Us Details Are Edited Successfully......");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                <th>S.No</th>
                <th>Institute Address</th>
                <th>Facebook URL</th>
                <th>Twitter URL</th>
                <th>Contact officer Name</th>
                <th>Contact officer Designation</th>
                <th>Contact officer Phone</th>
                <th>Contact officer Mobile</th>
                <th>Contact officer Email</th>
                <th>Delete</th>
                </tr>
                <?php
                $footerDetails = mysqli_query($link, "select * from footer_tbl order by id desc");
                $sno = 1;
                while ($footerData = mysqli_fetch_object($footerDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $footerData->location; ?></td>
                        <td><?php echo $footerData->fb_url; ?></td>
                        <td><?php echo $footerData->twitter_url; ?></td>
                        <td><?php echo $footerData->contact_officer_name; ?></td>
                        <td><?php echo $footerData->contact_officer_designation; ?></td>
                        <td><?php echo $footerData->contact_officer_phone; ?></td>
                        <td><?php echo $footerData->contact_officer_mobile; ?></td>
                        <td><?php echo $footerData->contact_officer_email; ?></td>
                        <td><a href="javascript:delete_id(<?php echo $footerData->id;?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
                    </tr>
                    <?php
                }
                ?>

            </table>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>
<?php
if (isset($_GET['delete_id'])) {
    $about_us_id = $_GET['delete_id'];
    $delete_query = "DELETE from footer_tbl where id = '$about_us_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_footer_details.php?msg=deletesuccess");
    }
}
if (isset($_GET['msg']) && $_GET['msg'] == 'deletesuccess') {
    echo "<script>alertify.success('Record Successfully Deleted');</script>";
}
?>
<script>
    alertify.set({labels: {
            ok: "Delete",
            cancel: "Cencel"
        }})
    function delete_id(id) {
        alertify.confirm("Are You Sure To Delete Record ?", function (e) {
            if (e) {
                window.location.href = 'all_footer_details.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>