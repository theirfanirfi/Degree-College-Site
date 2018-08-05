<?php require_once('resources/header.php'); ?>
<?php require_once('admin/php_functions.php'); ?>

<?php 
require_once('functions.php');
$Function = new Functions();

if(isset($_GET['eid'])){
$eid = url($_GET['eid']);
}else {
	header("Location:index.php");
}
$Function = new Functions();
$sql = "SELECT * FROM exp_aff_tbl WHERE id = '$eid' LIMIT 1";
$exp_aff = $Function->find_by_sql_in_shift($sql);
?>

<section class="container">
<div class="row">
<div class="col-md-8" style="padding: 20px;">
	<h1><?php echo $exp_aff->exp_aff_name; ?></h1>
	<p><?php echo $exp_aff->exp_aff_description; ?></p>
</div>
	
</div>
	<!-- <a style="padding: 8px;margin: 20px;" class="btn btn-info" href="programstaff.php?pid=<?php //echo urlencode(url($exp_aff->id)); ?>"><?php// echo $exp_aff->exp_aff_name; ?>'s Staff</a> -->
</section>



<?php require_once('resources/footer.php'); ?>