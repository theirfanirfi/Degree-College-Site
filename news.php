<?php require_once 'Resources/header.php'; ?>
<?php require_once 'functions.php'; ?>
<section class="container">
	<div class="row">
	<h1 style="text-align: center;">News</h1>

	<div class="col-md-12" style="padding: 20px;">
	<?php 
	if(isset($_GET['nid']))
	{
		$id = $_GET['nid'];
	}

	$Function = new Functions();
	$sql = "SELECT * FROM news_tbl WHERE news_id = '$id' LIMIT 1";
	$news = $Function->find_by_sql_in_shift($sql);
	
	?>
	<h2 style="font-weight: bold;"><?php echo $news->news_title; ?></h2>
	<p><i class="glyphicon glyphicon-calendar"></i>&nbsp;<strong>Date: </strong> <?php echo $news->news_date; ?></p>
	<p><?php echo $news->news_details; ?></p>
		
	</div>



</section>

<?php require_once 'Resources/footer.php'; ?>