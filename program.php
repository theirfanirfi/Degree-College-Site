<?php require_once('resources/header.php'); ?>
<?php require_once('admin/php_functions.php'); ?>

<?php 
require_once('functions.php');
$Function = new Functions();

if(isset($_GET['pid'])){
$pid = url($_GET['pid']);
}else {
	header("Location:index.php");
}
$Function = new Functions();
$sql = "SELECT * FROM program_tbl WHERE program_id = '$pid' LIMIT 1";
$program = $Function->find_by_sql_in_shift($sql);
?>

<section class="container">
<div class="row">
<div class="col-md-8">
	<h1><?php echo $program->program_name; ?></h1>
	<p><?php echo $program->program_description; ?></p>

	<a style="padding: 8px;margin: 20px;" class="btn btn-info" href="programstaff.php?pid=<?php echo urlencode(url($program->program_id)); ?>"><?php echo $program->program_name ?>'s Staff</a>
</div>
<?php 

$sqlB = "SELECT * FROM program_gallery WHERE program_id = '$program->program_id' ORDER BY img_id DESC LIMIT 1";
$image = $Function->find_by_sql_in_shift($sqlB);

?>
	<div class="col-md-4">
	<img src="images/programpic/<?php echo $image->img_name; ?>" class="img-responsive" width="100%"
	alt="Image Error"
	/>
		
	</div>
	
</div>
	
</section>



<?php require_once('resources/footer.php'); ?>