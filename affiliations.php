<?php require_once('resources/header.php'); ?>
<?php require_once('admin/php_functions.php'); ?>

<?php 
require_once('functions.php');
$Function = new Functions();

$sql = "SELECT * FROM experience_tbl ORDER BY exp_id DESC";
$exps = $Function->find_by_sql_in_all($sql);



?>

<section class="container" id="contactuss">
	<div class="row">
	<div class="col-md-12">
	<?php 
	foreach ($exps as $exp) { ?>
		<div class="col-md-6">
			<?php 
			$sqlB = "SELECT * FROM exp_aff_tbl WHERE exp_aff_id = '$exp->exp_id'";
			$affs = $Function->find_by_sql_in_all($sqlB); ?>

			<h3 style="color:#518caa ;"><?php echo $exp->exp_name; ?></h3>
			<?php 
	foreach ($affs as $aff) { ?>
			
			<a href="exp_aff.php?eid=<?php echo urlencode(url($aff->id)); ?> ">
				<h4 style="padding: 6px;box-shadow: 4px 4px;">
			<?php echo $aff->exp_aff_name; ?></h4></a>
			
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