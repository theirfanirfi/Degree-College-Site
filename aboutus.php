<?php require_once('resources/header.php'); ?>

<?php 
require_once('functions.php');
$Function = new Functions();

$sql = "SELECT * FROM about_us_tbl ORDER BY about_us_id DESC LIMIT 1";
$about = $Function->find_by_sql_in_shift($sql);



?>

<section class="container">
	<div class="row">
		<div class="col-md-8" style="padding: 16px;margin: 12px 0px;">
			<h2><?php echo $about->about_us_title; ?></h2>
			<p style="text-align: justify;"><?php echo $about->about_us_description; ?></p>
		</div>
	</div>

</section>


<?php require_once('resources/footer.php'); ?>