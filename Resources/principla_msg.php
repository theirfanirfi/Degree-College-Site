
<?php 
require_once('functions.php');
$Function = new Functions();


$sql = "SELECT * FROM home_tbl ORDER BY home_id DESC LIMIT 1";
$p = $Function->find_by_sql_in_shift($sql);

?>





<section class="container">
<div class="row">
<div class="col-md-2">
	<img src="images/<?php echo $p->principal_img_name; ?>" width="140" height="140" style="margin: 8px;">
</div>
<div class="col-md-10">
	<h2><?php echo $p->principal_msg_title; ?></h2>
	<p style="text-align: justify;word-break: break-all;font-size: 18px;"><?php echo $p->msg_description; ?></p>
</div>
	
</div>
</section>