<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Contacts</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Contact Details Are Added Successfully......");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Job Title</th>
                    <th>Phone Number</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $contactDetails = mysqli_query($link, "select * from contact_tbl order by contact_id desc");
                $sno = 1;
                while ($contactData = mysqli_fetch_object($contactDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $contactData->job_title ?></td>
                        <td><?php echo $contactData->phone_no ?></td>
                        <td><?php echo $contactData->mobile_no ?></td>
                        <td><?php echo $contactData->email ?></td>
                        <td><a href="edit_contact.php?id=<?php echo $contactData->contact_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $contactData->contact_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $contact_id = $_GET['delete_id'];
    $delete_query = "DELETE from contact_tbl where contact_id = '$contact_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_contacts.php?msg=deletesuccess");
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
                window.location.href = 'all_contacts.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>