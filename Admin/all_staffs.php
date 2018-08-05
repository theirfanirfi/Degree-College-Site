<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Staffs Details</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Staff Details Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>   
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Qualification</th>
                    <th>Email</th>
                    <th>Program Name</th>
                    <th>Picture</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $staffDetails = mysqli_query($link, ("select * from staff_tbl order by staff_id desc"));
                $sno = 1;
                while ($staffData = mysqli_fetch_object($staffDetails)) {
                    ?>
                    <tr><td><?php echo $sno++ ?></td>
                        <td><?php echo $staffData->staff_name ?></td>
                        <td><?php echo $staffData->staff_designation ?></td>
                        <td><?php echo $staffData->staff_qualification ?></td>
                        <td><?php echo $staffData->staff_email ?></td>
                        <td><?php $program_id = $staffData->program_id; 
                         $selectProgram = mysqli_query($link, "select * from program_tbl where program_id = '$program_id'");
                         $programData = mysqli_fetch_object($selectProgram);
                         echo $programData->program_name;
                                ?></td>
                        <td><?php echo $staffData->staff_img_name ?></td>
                        <td><a href="edit_staff.php?id=<?php echo $staffData->staff_id ?>"><i style="color:orange;" class="fa fa-pencil-square-o fa-2x"></a></td>
                        <td><a href="javascript:delete_id(<?php echo $staffData->staff_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $staff_id = $_GET['delete_id'];
    $select_query = mysqli_query($link, "select * from staff_tbl where staff_id = '$staff_id'");
    $row = mysqli_fetch_array($select_query);
    $delete_img_name = $row['staff_img_name'];
    $delete_query = "DELETE from staff_tbl where staff_id = '$staff_id'";
    if (mysqli_query($link, $delete_query) && unlink("../images/staffsImages/" . $delete_img_name)) {
        header("Location:all_staffs.php?msg=deletesuccess");
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
                window.location.href = 'all_staffs.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>