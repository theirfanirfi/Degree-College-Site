

<?php 
require_once('functions.php');
$Function = new Functions();

$sqlA= "SELECT * FROM academic_tbl ORDER BY academic_id DESC";


$academics = $Function->find_by_sql_in_all($sqlA);

foreach ($academics as $academic) {
	$sqlB = "SELECT * FROM program_tbl WHERE academic_id = '$academic->academic_id' ORDER BY program_id DESC";
	$programs = $Function->find_by_id($sqlB);
	foreach ($programs as $program) {
		
	}
}

?>


<section id="OurProgrames" class="container">

	<div id="Departments" style="text-align: center;" class="col-md-8">


	<div class="row">
		<h3 style="margin-bottom: 20px;"><i class="glyphicon glyphicon-filter"></i>Our Laboratories</h3>

		<!-- degree level programs -->


		<?php 

		foreach ($academics as $academic) {
	$sqlB = "SELECT * FROM program_tbl WHERE academic_id = '$academic->academic_id' ORDER BY program_id DESC";
	//$programs = $Function->find_by_id($sqlB);

	

		?>
		<div class="col-md-6" style="text-align: left;padding-left: 40px;">

	
			<h4><?php echo $academic->academic_level; ?></h4>
			<ul>
				<?php 
		$programs = $Function->find_by_id($sqlB);
	foreach ($programs as $program) {

		?>
			<li><i class="glyphicon glyphicon-menu-right"></i>&nbsp;<a href="program.php?pid=<?php echo $program->program_id; ?>"><?php echo $program->program_name; ?></a></li>
			<?php } ?>
			</ul>
		</div>

		<?php }  ?>



	</div>

	<div class="row">
	<h3 style="margin-bottom: 20px;"><i class=""></i>Experience and Affiliation</h3>

	<?php 

	$sqlEA = "SELECT * FROM experience_tbl ORDER BY exp_id DESC";
	$exps = $Function->find_by_sql_in_all($sqlEA);
	foreach ($exps as $exp) { ?>
	<div class="col-md-6" style="text-align: left;padding-left: 40px;">
		<h4><?php echo $exp->exp_name; ?></h4>

		<?php

			$sqlEF = "SELECT * FROM exp_aff_tbl WHERE exp_aff_id = '$exp->exp_id' ORDER BY id DESC";
			$exp_aff_s = $Function->find_by_sql_in_all($sqlEF);
			foreach ($exp_aff_s as $exp_aff) { ?>

			<ul >
	<li><i class="glyphicon glyphicon-menu-right"></i>&nbsp;<a href="exp_aff.php?eid=<?php echo urlencode($exp_aff->id); ?>"><?php echo $exp_aff->exp_aff_name; ?></a></li>
	</ul>
	
</ul>
</ul>


		<?php } ?>

	</div>

	<?php } ?>
	</div>
	</div>
	