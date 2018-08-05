<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Home Details</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Home Details Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Principle Message Title</th>
                    <th>Message Description</th>
                    <th>Principal Image Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $homeDetails = mysqli_query($link, "select * from home_tbl order by home_id desc");
                $sno = 1;
                while ($homeData = mysqli_fetch_object($homeDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $homeData->principal_msg_title ?></td>
                        <td><?php echo $homeData->msg_description ?></td>
                        <td><?php echo $homeData->principal_img_name ?></td>
                        <td><a href="edit_home.php?id=<?php echo $homeData->home_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $homeData->home_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $home_id = $_GET['delete_id'];
    $select_query = mysqli_query($link, "select * from home_tbl where home_id = '$home_id'");
    $row = mysqli_fetch_array($select_query);
    $delete_img_name = $row['principal_img_name'];
    $delete_query = "DELETE from home_tbl where home_id = '$home_id'";
    if (mysqli_query($link, $delete_query) && unlink("../images/homePageImages/" . $delete_img_name)) {
        header("Location:all_home.php?msg=deletesuccess");
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
                window.location.href = 'all_home.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>