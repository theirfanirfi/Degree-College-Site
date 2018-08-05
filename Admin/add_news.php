<?php
require_once './header.php';
?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h2 class="font">Add News</h2>
            <hr />
            <?php
            if (isset($_POST['send_news'])) {
                $news_title = cleanInput($_POST['news_title']);
                $news_details = cleanTextDetails($_POST['news_details']);
                $news_date = $_POST['news_date'];
                if (empty($news_title) || empty($news_details) || empty($news_date)) {
                    message("warning", "All Fields Are Required");
                } else {
                    $query = "insert into news_tbl(news_title,news_details,news_date) values('$news_title','$news_details','$news_date')";
                    if (mysqli_query($link, $query)) {
                        message("success", "News Details Are Added Successfully......");
                    } else {
                        echo mysqli_error($link);
                    }
                }
            }
            ?>
            <form name="news_form" method="post" action="add_news.php" onsubmit="return add_news();" enctype="multipart/form-data">
                <div class="form-group font2">
                    <label for="staffName">News Title</label>
                    <input type="text" class="form-control" id="staffName" name="news_title" placeholder="Teacher Name">
                    <p class="help-block font3" id="news_title_error"></p>
                </div>
                <div class="form-group font2">
                    <label for="textarea">News Details</label>
                    <textarea class="form-control editor" id="textarea" name="news_details" rows="8"></textarea>
                    <p class="help-block font3" id="news_details_error"></p>
                </div>
                <div class="form-group marg font2">
                    <label >News Date</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='date' class="form-control" name="news_date" />
                        <span class="input-group-addon">
                        </span>
                    </div>
                    <p class="help-block font3" id="news_date_error"></p>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-dark btn-style" name="send_news" value="ADD News">
                </div>
            </form>
        </div>
    </div>    
</div>

<?php
require_once './footer.php';
?>