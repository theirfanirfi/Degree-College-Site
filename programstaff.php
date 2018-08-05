<?php require_once('resources/header.php'); ?>
<?php require_once('admin/php_functions.php'); ?>

<?php 
require_once('functions.php');
$Function = new Functions();

if(isset($_GET['pid'])){
$pid = url($_GET['pid']);
}else {
	header("Location:ourstaff.php");
}
$Function = new Functions();
$sql = "SELECT * FROM staff_tbl WHERE program_id = '$pid' ORDER BY staff_id DESC";
$staffs = $Function->find_by_sql_in_all($sql);
?>

<section class="container">
<div class="row" id="staffzoom">

<?php 
foreach ($staffs as $staff) { ?>
<div class="col-md-6 staffz" style="padding:20px;"  >
	<div class="col-md-4">
		
		<img src="images/staffimages/<?php echo $staff->staff_img_name; ?>" width="150px" height="100px">
	</div>
	<div class="col-md-8">
<p>&nbsp;<i class="glyphicon glyphicon-user"><strong>&nbsp; <?php echo $staff->staff_name; ?></strong></i></p>
			<p><i class="glyphicon glyphicon-eye-open"> Designation: <?php echo $staff->staff_designation; ?> </i></p>
			<p><i class="glyphicon glyphicon-education"> Qualification: <?php echo $staff->staff_qualification; ?> </i></p>
			<p><i class="glyphicon glyphicon-envelope"> Email: <?php echo $staff->staff_email; ?></i></p>
			</div>

</div>

<?php } ?>
	
</div>
	
</section>


<?php require_once('resources/footer.php'); ?>