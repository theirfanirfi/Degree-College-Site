<?php
require_once('functions.php');
$Function = new Functions();

$sql = "SELECT * FROM slider_tbl ORDER BY slider_img_id DESC LIMIT 2";
$slides = $Function->find_by_sql_in_all($sql);

 ?>


<section>
	
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

    <?php 
    $sqlB = "SELECT * FROM slider_tbl ORDER BY slider_img_id DESC LIMIT 1";
    $slide = $Function->find_by_sql_in_shift($sql);

    ?>
    <div class="item active">
        <img src="images/sliderimages/<?php echo $slide->slider_img_name; ?>" alt="<?php echo $slide->slider_img_title; ?>" >
      </div>
    <?php  
    foreach ($slides as $slide) { ?>
      
     

      <div class="item">
        <img src="images/sliderimages/<?php echo $slide->slider_img_name; ?>" alt="<?php echo $slide->slider_img_title; ?>" >
      </div>
<?php } ?>


      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


</section>