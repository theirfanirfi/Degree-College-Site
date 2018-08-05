<?php require_once('resources/header.php'); ?>

<?php 
require_once('functions.php');
$Function = new Functions();

$sql = "SELECT * FROM contact_tbl ORDER BY contact_id DESC";
$contacts = $Function->find_by_sql_in_all($sql);



?>

<section class="container" id="contact-us">
	<div class="row">
		<div class="col-md-12" style="padding: 20px;">
		<h2 style="margin: 12px;">Contact Us</h2>
		<?php 
		foreach ($contacts as $contact) { ?>
		<div class="col-md-5  contact" style="margin:20px;box-shadow: 10px 10px 10px 10px #eef5db;">
			<h5><strong>About:  </strong> <?php echo $contact->job_title; ?></h5>
			
	<p><i class="glyphicon glyphicon-phone-alt"></i><strong> Phone:</strong> &nbsp; <?php echo $contact->phone_no; ?></p>
	<p><i class="glyphicon glyphicon-earphone"></i><strong> Cell :</strong>&nbsp;  <?php echo $contact->mobile_no; ?></p>
	<p><i class="glyphicon glyphicon-envelope"></i><strong>&nbsp;Email</strong>: <?php echo $contact->email; ?></p>
	
			</div>


			<?php } ?>
		</div>
	</div>

</section>


<?php require_once('resources/footer.php'); ?>