<?php require_once 'functions.php'; 

$Function = new Functions();

$sql = "SELECT * FROM footer_tbl ORDER BY id DESC LIMIT 1";
$footer = $Function->find_by_sql_in_shift($sql);


?>
<footer class="container">
<section class="row section-one">
	<div class="col-md-4">
	<h4>Nursing College</h4>


		<?php 



		?>
	<p><i class="glyphicon glyphicon-map-marker"></i>&nbsp; <?php echo $footer->location; ?></p>


	
		
	</div>
	<div class="col-md-4">
	<h4>Social Links</h4>
	<p><a href="http://<?php echo $footer->fb_url; ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i>&nbsp; Facebook</a></p>

	<p><a href="http://<?php echo $footer->twitter_url; ?>"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp; Twitter</a></p>
		
	</div>
	<div id="contactUs" class="col-md-4">
	<h4 style="text-align: center;">Contact Us</h4>
	<p style="font-weight: bold;"><?php echo $footer->contact_officer_designation; ?></p>
	<p><i class="glyphicon glyphicon-phone-alt"></i> Phone : &nbsp; <?php echo $footer->contact_officer_phone; ?></p>
	<p><i class="glyphicon glyphicon-earphone"></i> Cell :&nbsp;&nbsp;  <?php echo $footer->contact_officer_mobile; ?></p>
	<p><i class="glyphicon glyphicon-envelope"></i>&nbsp;Email: <?php echo $footer->contact_officer_email; ?></p>
	</div>
</section>

<section class="row second-section">
	<div class="col-md-12 ">
		<p>© 2017 GDC. All Rights Reserved | Design by Max Tech Developers</p>
	</div>
</section>
</footer>


<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/vertical.news.slider.min.js"></script>
<script>
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-1965499-1']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</body>
</html>