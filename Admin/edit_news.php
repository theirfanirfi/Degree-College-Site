<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Edit News</h2>
            <hr />
            <?php
            if (isset($_POST['send_news'])) {
                $id = $_POST['edit_home_id'];
                $news_title = cleanInput($_POST['news_title']);
                $news_details = cleanTextDetails($_POST['news_details']);
                $news_date = $_POST['news_date'];
                if (empty($news_title) || empty($news_details) || empty($news_date)) {
                    header("location:edit_news.php?id='$id'&&msg=empty");
                } else {
                    $query = "update news_tbl set news_title = '$news_title', news_details = '$news_details', news_date = '$news_date' where news_id = '$id' ";
                    if (mysqli_query($link, $query)) {
                        header("location:all_news.php?msg=success");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <?php
            if (isset($_GET['id'])) {
                $id = url($_GET['id']);
                $editNews = mysqli_query($link, "select * from news_tbl where news_id = '$id'");
                if ($editData = mysqli_fetch_array($editNews)) {
                    if (isset($_GET['msg'])) {
                        if ($_GET['msg'] == "empty") {
                            message("warning", "ALL Fields Are Recquired....");
                        }
                    }
                    ?>
                    <form name="news_form" method="post" action="edit_news.php" onsubmit="return add_news();" enctype="multipart/form-data">
                        <div class="form-group font2">
                            <label for="staffName">News Title</label>
                            <input type="text" class="form-control" id="staffName" name="news_title" value="<?php echo $editData['news_title'] ?>" placeholder="Teacher Name">
                            <p class="help-block font3" id="news_title_error"></p>
                        </div>
                        <div class="form-group font2">
                            <label for="textarea">News Details</label>
                            <textarea class="form-control editor" id="textarea" name="news_details" rows="8"> <?php echo $editData['news_details'] ?> </textarea>
                            <p class="help-block font3" id="news_details_error"></p>
                        </div>
                        <div class="form-group marg font2">
                            <label >News Date</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='date' class="form-control" name="news_date" value="<?php echo $editData['news_date'] ?>" />
                                <span class="input-group-addon">
                                </span>
                            </div>
                            <p class="help-block font3" id="news_date_error"></p>
                        </div>
                        <div class="text-right">
                            <input type="hidden" name="edit_home_id" value="<?php echo $id ?> ">
                            <input type="submit" class="btn btn-dark btn-style" name="send_news" value="EDIT News">
                        </div>
                    </form>
                    <?php
                }
            }
            ?>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>