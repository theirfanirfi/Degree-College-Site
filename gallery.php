<!DOCTYPE html>
<html>
<head>
	<title>Gallery</title>
	<link rel="stylesheet" type="text/css" href="styles/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
	<link href="dist/css/lightgallery.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles/customstyle1.css">

</head>

<body>

<!-- Header -->
<header class="container-fluid">
<!-- google translator -->
<div class="row">
	<div class="col-md-12" >
		
	</div>
</div>


<!-- Nav bar section -->
<div class="row">
<div class="col-md-12">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a id="brand" class="navbar-brand" href="index.php"><i class="glyphicon glyphicon-home"></i>&nbsp;Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li><a href="gallery.php"><i class="glyphicon glyphicon-picture"></i>&nbsp; Gallery <span class="sr-only">(current)</span></a></li>
        <li><a href="ourlabs.php"><i class="glyphicon glyphicon-filter"></i>&nbsp; Laboratries</a></li>
        <li><a href="ourstaff.php"><i class="glyphicon glyphicon-user"></i>&nbsp; Our Staff</a></li>
        <li><a href="meritlists.php"><i class="glyphicon glyphicon-save-file"></i>&nbsp; Merit Lists</a></li>
        <li><a href="affiliations.php"><i class="glyphicon glyphicon-list-alt"></i>&nbsp; Affiliation</a></li>
        <li><a href="contactus.php"><i class="glyphicon glyphicon-phone-alt"></i>&nbsp; Contact Us</a></li>
        <li><a href="aboutus.php"><i class="glyphicon glyphicon-info-sign"></i>&nbsp; About Us</a></li>
        
      </ul>
      
      
      
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>

<hr id="navbar"  />
</div>



<section class="row top">
<div class="col-md-12">
	<h1 class="title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nursing College</h1>
</div>
	
</section>

</header>
<!-- Image gallery -->

<section class="container" style="padding: 24px;">
<div class="col-md-12">
	
<h1 style="margin:20px;font-style: italic;">Colleges' Gallery</h1>

 <div class="demo-gallery">
            <ul id="lightgallery" class="list-unstyled row">
            <?php 

require_once('functions.php');
$Function = new Functions();
$sql = "SELECT * FROM gallery_tbl ORDER BY image_id DESC";
$images = $Function->find_by_sql_in_all($sql);

foreach ($images as $image) { ?>
                <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="images/galleryimages/<?php echo $image->image_name; ?> 375, images/galleryimages/<?php echo $image->image_name; ?> 480, images/galleryimages/<?php echo $image->image_name; ?> 800" data-src="images/galleryimages/<?php echo $image->image_name; ?>" data-sub-html="<!-- <h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p> -->">
                    <a href="">
                        <img class="img-responsive" src="images/galleryimages/<?php echo $image->image_name; ?>">
                    </a>
                </li>
                <?php } ?>
            
            </ul>
        </div>



</div>


</section>
	











<footer class="container">
<section class="row section-one">
	<div class="col-md-4">
	<h4>GDC</h4>
	<p><img src="images/location.png" width="40px" height="40px">Kabal, Swat</p>
	<p>&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-phone-alt"></i>&nbsp; +9212345678912</p>
		
	</div>
	<div class="col-md-4">
	<h4>Social Links</h4>
	<p><a href="twitter.com"><img class="twitter" src="images/twitter-logo.png" width="30px" height="30px">&nbsp; Twitter</a></p>

	<p><a href="facebook.com"><img class="facebook" src="images/facebook-
	logo.png" width="30px" height="30px">&nbsp; Facebook</a></p>
		
	</div>
	<div class="col-md-4">
	<h4>Contact Us</h4>
		
	</div>
</section>

<section class="row">
	<div class="col-md-12 second-section">
		<p>© 2017 GDC. All Rights Reserved | Design by Max Tech Developers</p>
	</div>
</section>
</footer>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript">
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
        });
        </script>
        <script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="demo/js/lightgallery.js"></script>
        <script src="demo/js/lg-fullscreen.js"></script>
        <script src="demo/js/lg-thumbnail.js"></script>
        <script src="demo/js/lg-video.js"></script>
        <script src="demo/js/lg-autoplay.js"></script>
        <script src="demo/js/lg-zoom.js"></script>
        <script src="demo/js/lg-hash.js"></script>
        <script src="demo/js/lg-pager.js"></script>
        <script src="lib/jquery.mousewheel.min.js"></script>
</body>
</html>