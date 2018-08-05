<?php require_once('functions.php');

$Function = new Functions();

$sql = "SELECT * FROM news_tbl ORDER BY news_id DESC LIMIT 10";
$news = $Function->find_by_sql_in_all($sql);
 ?>

<div style="text-align: center;" id="news" class="col-md-4">
		<h3>News</h3>
		 <div class="news-holder cf">

    <ul class="news-headlines">
    <?php foreach ($news as $n) { ?>
      <li class="selected"><a href="news.php?nid=<?php echo $n->news_id; ?> "><?php echo $n->news_title; ?></a></li>
      <?php } ?>
      <!-- li.highlight gets inserted here -->
    </ul>

    <div class="news-preview">
       <?php foreach ($news as $n) { ?>
      <div class="news-content">
        <!-- <img src="http://cdn.impressivewebs.com/news1.jpg"> -->
        <p><a href="news.php?nid=<?php echo $n->news_id; ?> "><?php echo $n->news_title; ?></a></p>
        <?php  ?>
        <p style="text-align: justify;word-break: break-all;"><?php 
        if(strlen($n->news_details) > 200)
        {
         echo substr($n->news_details,200); 
         }
         else
         {
          echo $n->news_details;
         }

          ?></p>

        <p><i class="glyphicon glyphicon-calendar"></i>&nbsp;<strong>Date: </strong><?php echo $n->news_date; ?></p>
       
        <p><a href="news.php?nid=<?php echo $n->news_id; ?>" class="btn btn-primary" style="padding: 8px;">Read More</a></p>
       
      </div><!-- .news-content -->

      <?php } ?>

     

    </div><!-- .news-preview -->

  </div><!-- .news-holder -->



	</div>



</section>