<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="font">All News</h2>
            <hr />
            <?php
            if (isset($_GET['msg'])) {
                if ($_GET['msg'] == "success") {
                    message("success", "News Details Are Edit Successfully......");
                }
            }
            ?>
            <table class="table tbl-text table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>News Title</th>
                    <th>News Details</th>
                    <th>News Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                $newsDetails = mysqli_query($link, "select * from news_tbl order by news_id desc");
                $sno = 1;
                while ($newsData = mysqli_fetch_object($newsDetails)) {
                    ?>
                    <tr>
                        <td><?php echo $sno++; ?></td>
                        <td><?php echo $newsData->news_title ?></td>
                        <td><?php echo $newsData->news_details ?></td>
                        <td><?php echo $newsData->news_date ?></td>
                        <td><a href="edit_news.php?id=<?php echo $newsData->news_id; ?>"><i style ="color:orange;" class="fa fa-pencil-square-o fa-2x"></i></a></td>
                        <td><a href="javascript:delete_id(<?php echo $newsData->news_id; ?>)"><i style="color:red;" class="fa fa-trash-o fa-2x"></i></a></td>
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
    $news_id = $_GET['delete_id'];
    $delete_query = "DELETE from news_tbl where news_id = '$news_id'";
    if (mysqli_query($link, $delete_query)) {
        header("Location:all_news.php?msg=deletesuccess");
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
                window.location.href = 'all_news.php?delete_id=' + id;
            } else {
                alertify.error("Not Deleted Rocord!! You Hit Cancel");
            }
        });
    }
</script>