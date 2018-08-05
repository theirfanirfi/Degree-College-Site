<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All Pictures</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "Gallery Image Are Editted Successfully");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr> 
                    <th>S.No</th>
                    <th>Picture Name</th>
                    <th>Picture Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $galleryDetails = mysqli_query($link, "select * from gallery_tbl order by image_id desc");
                $sno = 1;
                while ($galleryData = mysqli_fetch_object($galleryDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $galleryData->image_name ?></td>
                        <td><?php echo $galleryData->image_date ?></td>
                        <td><a href="edit_picture.php?id=<?php echo $galleryData->image_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $galleryData->image_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $image_id = $_GET['delete_id'];
    $select_query = mysqli_query($link, "select * from gallery_tbl where image_id = '$image_id'");
    $row = mysqli_fetch_array($select_query);
    $delete_img_name = $row['image_name'];
    $delete_query = "DELETE from gallery_tbl where image_id = '$image_id'";
    if (mysqli_query($link, $delete_query) && unlink("../images/galleryImages/" . $delete_img_name)) {
        header("Location:all_pictures.php?msg=deletesuccess");
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
                window.location.href = 'all_pictures.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>