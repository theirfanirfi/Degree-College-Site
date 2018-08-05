<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Slider Image</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Slider Image Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>   
                    <th>Image Title</th>
                    <th>Image Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $sliderDetails = mysqli_query($link, ("select * from slider_tbl order by slider_img_id desc"));
                $sno = 1;
                while ($sliderData = mysqli_fetch_object($sliderDetails)) {
                    ?>
                    <tr><td><?php echo $sno++ ?></td>
                        <td><?php echo $sliderData->slider_img_title ?></td>
                        <td><?php echo $sliderData->slider_img_name ?></td>
                        <td><a href="edit_slider_img.php?id=<?php echo $sliderData->slider_img_id ?>"><i style="color:orange;" class="fa fa-pencil-square-o fa-2x"></a></td>
                        <td><a href="javascript:delete_id(<?php echo $sliderData->slider_img_id ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $slider_id = $_GET['delete_id'];
    $select_query = mysqli_query($link, "select * from slider_tbl where slider_img_id = '$slider_id'");
    $row = mysqli_fetch_array($select_query);
    $delete_img_name = $row['slider_img_name'];
    $delete_query = "DELETE from slider_tbl where slider_img_id = '$slider_id'";
    if (mysqli_query($link, $delete_query) && unlink("../images/sliderImages/" . $delete_img_name)) {
        header("Location:all_slider_img.php?msg=deletesuccess");
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
                window.location.href = 'all_slider_img.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>