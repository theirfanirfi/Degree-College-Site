<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All About Us Details</h2>
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
                <th>About us Title</th>
                <th>About us Description</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
                <?php
                $aboutDetails = mysqli_query($link, "select * from about_us_tbl order by about_us_id asc");
                $sno = 1;
                while ($aboutData = mysqli_fetch_object($aboutDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $aboutData->about_us_title ?></td>
                        <td><?php echo $aboutData->about_us_description ?></td>
                        <td><a href="edit_about.php?id=<?php echo $aboutData->about_us_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $aboutData->about_us_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $delete_query = "DELETE from about_us_tbl where about_us_id = '$about_us_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_abouts.php?msg=deletesuccess");
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
                window.location.href = 'all_abouts.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>