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
$sql = "SELECT * FROM merit_list_tbl WHERE program_id = '$pid' ORDER BY merit_list_id DESC";
$lists = $Function->find_by_sql_in_all($sql);
?>

<section class="container">
<div class="row" id="meritzoom">

<?php 
foreach ($lists as $list) { ?>
<div class="col-md-12 listz" style="padding:20px;"  >
	<div class="col-md-8" style="padding: 20px;">
<p>&nbsp;<strong><?php echo $list->merit_list_title; ?></strong></p>
			<p ><?php echo $list->merit_list_description; ?></p>


			<p>&nbsp;<a href="images/meritListfiles/<?php echo $list->merit_list_file_name; ?>" >
				<img src="images/meritListfiles/File.png" width="50px" class="img-responsive">
			</a></p>

			<p><i class="glyphicon glyphicon-paperclip"></i>&nbsp;      <a href="images/meritListfiles/<?php echo $list->merit_list_file_name; ?>" ><?php echo $list->merit_list_file_name; ?></a></p>


			<p class="glyphicon glyphicon-calendar">&nbsp;<?php echo $list->merit_list_date; ?></p>
			</div>

			

</div>

<?php } ?>
	
</div>
	
</section>


<?php require_once('resources/footer.php'); ?>