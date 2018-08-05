<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Academics</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Academic Level Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Academice Level</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $academicDetails = mysqli_query($link, "select * from academic_tbl order by academic_id desc");
                $sno = 1;
                while ($academicData = mysqli_fetch_object($academicDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $academicData->academic_level ?></td>
                        <td><a href="edit_academic.php?id=<?php echo $academicData->academic_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $academicData->academic_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $academic_id = $_GET['delete_id'];
    $delete_query = "DELETE from academic_tbl where academic_id = '$academic_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_academics.php?msg=deletesuccess");
    }else{
        echo mysqli_error($link);
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
                window.location.href = 'all_academics.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>