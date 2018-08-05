<?php require_once('resources/header.php'); ?>
<?php require_once('admin/php_functions.php'); ?>

<?php 
require_once('functions.php');
$Function = new Functions();

$sql = "SELECT * FROM academic_tbl ORDER BY academic_id DESC";
$academics = $Function->find_by_sql_in_all($sql);



?>

<section class="container" id="contactuss">
	<div class="row">
	<div class="col-md-12">
	<?php 
	foreach ($academics as $academic) { ?>
		<div class="col-md-6">
			<?php 
			$sqlB = "SELECT * FROM program_tbl WHERE academic_id = '$academic->academic_id'";
			$programs = $Function->find_by_sql_in_all($sqlB); ?>

			<h3 style="color:#518caa ;"><?php echo $academic->academic_level; ?>'s Staffs</h3>
			<?php 
	foreach ($programs as $program) { ?>
			
			<a href="programstaff.php?pid=<?php echo urlencode(url($program->program_id)); ?> ">
				<h4 style="padding: 6px;box-shadow: 4px 4px;">
			<?php echo $program->program_name; ?></h4></a>
			
			<?php } ?>
			<!-- <p>&nbsp;<i class="glyphicon glyphicon-user"><strong>&nbsp; <?php// echo $staff->staff_name; ?></strong></i></p>
			<p><i class="glyphicon glyphicon-eye-open"> Designation: </i></p>
			<p><i class="glyphicon glyphicon-education"> Qualification: </i></p>
			<p><i class="glyphicon glyphicon-envelope"> Email: </i></p> -->
			
		</div>

		<?php } //} ?>
	</div>
	</div>

</section>


<?php require_once('resources/footer.php'); ?>