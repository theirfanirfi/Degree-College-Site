<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">Experience and Affiliation</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Experience Level is Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Experience Level</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $expDetails = mysqli_query($link, "select * from experience_tbl order by exp_id desc");
                $sno = 1;
                while ($expDetail = mysqli_fetch_object($expDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $expDetail->exp_name; ?></td>
                        <td><a href="edit_exp.php?id=<?php echo $expDetail->exp_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $expDetail->exp_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $delete_query = "DELETE from experience_tbl where exp_id = '$academic_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_exp.php?msg=deletesuccess");
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
                window.location.href = 'all_exp.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>