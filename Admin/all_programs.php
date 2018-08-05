<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Programs</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Program Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr><th>S.No</th>
                    <th>Program Name</th>
                    <th>Program Description</th>
                    <th>Academic Level</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $programDetails = mysqli_query($link, "select * from program_tbl order by program_id desc");
                $sno = 1;
                while ($programData = mysqli_fetch_object($programDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $programData->program_name ?></td>
                        <td><?php echo $programData->program_description?></td>
                        <td>
                            <?php
                            $academic_id = $programData->academic_id;
                            $academic_query_id = mysqli_query($link, "select * from academic_tbl where academic_id = '$academic_id' ");
                            $academicData = mysqli_fetch_object($academic_query_id);
                            echo $academicData->academic_level;
                            ?>
                        </td>
                        <td><a href="edit_program.php?id=<?php echo $programData->program_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $programData->program_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $program_id = $_GET['delete_id'];
    $delete_query = "DELETE from program_tbl where program_id = '$program_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_programs.php?msg=deletesuccess");
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
                window.location.href = 'all_programs.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>