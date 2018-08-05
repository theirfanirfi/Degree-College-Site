<?php
require_once './header.php';
require_once '/../functions.php';
$Function = new Functions();
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
                    <th>Program</th>
                    <th>Delete</th>
                </tr>
                <?php
                $galleryDetails = mysqli_query($link, "select * from program_gallery order by img_id desc");
                $sno = 1;
                while ($galleryData = mysqli_fetch_object($galleryDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $galleryData->img_name; ?></td>
                        <td><?php echo $galleryData->img_date; ?></td>
                        <?php $sql = "SELECT * FROM program_tbl WHERE program_id = '$galleryData->program_id' LIMIT 1";
                        $program = $Function->find_by_sql_in_shift($sql);
                         ?>

                        <td><?php echo $program->program_name; ?></td>
                        <td><a href="javascript:delete_id(<?php echo $galleryData->img_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $select_query = mysqli_query($link, "select * from program_gallery where img_id = '$image_id'");
    $row = mysqli_fetch_array($select_query);
    $delete_img_name = $row['img_name'];
    $delete_query = "DELETE from program_gallery where img_id = '$image_id'";
    if (mysqli_query($link, $delete_query) && unlink("../images/programpic/" . $delete_img_name)) {
        header("Location:all_program_pictures.php?msg=deletesuccess");
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
                window.location.href = 'all_program_pictures.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>