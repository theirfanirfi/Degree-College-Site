<?php/*


This file is actually Not applicable currently.......... I Abdurrahman Commented This Code for future Use....

Discription This code is use for dynamic meritlest............


require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Merit List Details</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Merit List Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Student Name</th>
                    <th>Father Name</th>
                    <th>Domicile</th>
                    <th>Address</th>
                    <th>Obtained Marks</th>
                    <th>Program Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $meritListDetails = mysqli_query($link, "select * from merit_list order by std_id asc");
                
                $sno = 1;
                while ($meritListData = mysqli_fetch_object($meritListDetails)) {
                
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $meritListData->std_name ?></td>
                        <td><?php echo $meritListData->std_fname ?></td>
                        <td><?php echo $meritListData->domicile ?></td>
                        <td><?php echo $meritListData->address ?></td>
                        <td><?php echo $meritListData->marks_obtained ?></td>
                        <td><?php $program_id = $meritListData->program_id;
                        $programQuery = mysqli_query($link, "select * from program_tbl where program_id  = '$program_id'");
                        $programData = mysqli_fetch_array($programQuery);
                        echo $programData['program_name'];
                        ?></td>
                        <td><a href="edit_merit_list.php?id=<?php echo $meritListData->std_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $meritListData->std_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $std_id = $_GET['delete_id'];
    $delete_query = "DELETE from merit_list where std_id = '$std_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_merit_list.php?msg=deletesuccess");
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
                window.location.href = 'all_merit_list.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>*/