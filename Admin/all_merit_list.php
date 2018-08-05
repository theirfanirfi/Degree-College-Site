<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Merit List</h2>
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
                    <th>Merit List Title</th>
                    <th>Merit List Description</th>
                    <th>Merit List File Name</th>
                    <th>Program Name</th>
                    <th>Merit List Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $meritDetails = mysqli_query($link, "select * from merit_list_tbl order by merit_list_id desc");
                $sno = 1;
                while ($meritData = mysqli_fetch_object($meritDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $meritData->merit_list_title ?></td>
                        <td><?php echo $meritData->merit_list_description ?></td>
                        <td><?php echo $meritData->merit_list_file_name ?></td>
                        <td><?php $selectProgram = mysqli_query($link, "select * from program_tbl where program_id = '$meritData->program_id'"); 
                                $programData = mysqli_fetch_array($selectProgram);
                                echo $programData['program_name'];
                                ?></td>
                        <td><?php echo $meritData->merit_list_date ?></td>
                        <td><a href="edit_merit_list.php?id=<?php echo $meritData->merit_list_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $meritData->merit_list_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $merit_id = $_GET['delete_id'];
    $select_query = mysqli_query($link, "select * from merit_list_tbl where merit_list_id = '$merit_id'");
    $row = mysqli_fetch_array($select_query);
    $delete_file_name = $row['merit_list_file_name'];
    $delete_query = "DELETE from merit_list_tbl where merit_list_id = '$merit_id'";
    if (mysqli_query($link, $delete_query) && unlink("../images/meritListFiles/" . $delete_file_name)) {
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
</script>