<?php
require_once './header.php';
require_once '/../functions.php';
$Function = new Functions();
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Programs</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Center Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr><th>S.No</th>
                    <th>Experience or Affiliated Center Name</th>
                    <th>Center Description</th>
                    <th>Level</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $programDetails = mysqli_query($link, "select * from exp_aff_tbl order by id desc");
                $sno = 1;
                while ($programData = mysqli_fetch_object($programDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $programData->exp_aff_name ?></td>
                        <td><?php echo $programData->exp_aff_description?></td>
                        <td>
                            <?php
                            $academic_id = $programData->exp_aff_id;
                            $sqlA = "select * from experience_tbl where exp_id = '$academic_id' ";
                            $academicData = $Function->find_by_sql_in_shift($sqlA);
                            // $academic_query_id = mysqli_query($link, "select * from experience_tbl where exp_id = '$academic_id' ");
                            // $academicData = mysqli_fetch_object($academic_query_id);

                            echo $academicData->exp_name;
                            ?>
                        </td>
                        <td><a href="edit_exp_aff.php?id=<?php echo $programData->id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $programData->id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $delete_query = "DELETE from exp_aff_tbl where id = '$program_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_exp_aff.php?msg=deletesuccess");
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
                window.location.href = 'all_exp_aff.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>