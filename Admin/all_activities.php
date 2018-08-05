<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Activities Details</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Our Activities Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Activities Title</th>
                    <th>Activities Description</th>
                    <th>Activities Image Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $achievemenDetails = mysqli_query($link, "select * from our_achievement_tbl order by achievement_id asc");
                $sno = 1;
                while ($achievementData = mysqli_fetch_object($achievemenDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $achievementData->achievement_title ?></td>
                        <td><?php echo $achievementData->achievement_description ?></td>
                        <td><?php echo $achievementData->achievement_image_name ?></td>
                        <td><a href="edit_activities.php?id=<?php echo $achievementData->achievement_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $achievementData->achievement_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $achievement_id = $_GET['delete_id'];
    $select_query = mysqli_query($link, "select * from our_achievement_tbl where achievement_id = '$achievement_id'");
    $row = mysqli_fetch_array($select_query);
    $delete_img_name = $row['achievement_image_name'];
    $delete_query = "DELETE from our_achievement_tbl where achievement_id = '$achievement_id'";
    if (mysqli_query($link, $delete_query) && unlink("../images/achievementImages/" . $delete_img_name)) {
        header("Location:all_activities.php?msg=deletesuccess");
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
                window.location.href = 'all_activities.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>