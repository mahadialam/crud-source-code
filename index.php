<?php 
include "lib/header.php";
include "config/config.php";
include "lib/database.php";
?>

<?php
//Data select query.
$db = new Database();
$query = "SELECT * FROM tbl_user";
$read = $db->select($query);

?>

<?php
//Data delete query.
$db = new Database();
if (isset($_GET['del'])) {

	$id 	= $_GET['del'];
	$query 	= "DELETE FROM tbl_user WHERE id = $id";
	$delete = $db->delete($query);
}
?>

<?php
//Get Insert and Update Successfully massage.
if (isset($_GET['msg'])) {
	echo "<span style= 'color:green; font-size:20px;' id='#savedata'>".$_GET['msg']."</span>"; 
}
?>

<?php
//Get Delete Successfully massage.	
if (isset($_GET['msg_delete'])) {
	echo "<span style= 'color:red; font-size:20px;'>".$_GET['msg_delete']."</span>"; 
}

?>



<style type="text/css">
.tbl {
	text-align: center;
	margin: 0 auto;
}
.tbl tr th, tr td{
	padding: 10px 54px;
	
}

.tbl tr:nth-child(2n+1){
	background: #fff; height: 30px;
}

.tbl tr:nth-child(2n){
	background: #f1f1f1; height: 30px;
}

.h3{
	margin-left: 5px;
}


.tbl td a{
	color: blue;
}

</style>


<span style="color: red;"><p></p></span>

<form method="post">
<table class="tbl">
	<h3 class="h3">
		<a href="create.php">Create New</a>
	</h3>
	<tr>
		<th>Name</th>
		<th>Department</th>
		<th>Age</th>
		<th>Action</th>
	</tr>

	<?php if($read) { ?>
	<?php while($row = $read->fetch_assoc()){ ?>

	<tr>
		<td style="width: 50%"><?php echo $row ['name']; ?></td>
		<td style="width: 5%"><?php echo $row ['department']; ?></td>
		<td style="width: 5%"><?php echo $row ['age']; ?></td>
		<td style="width: 40%">
			<a href="edit.php?id=<?php echo urlencode($row ['id']);?>">Edit</a> ||
			<a href="?del=<?php echo urlencode($row ['id']);?>">Delete</a>
		</td>
	</tr>

	<?php }?>
	<?php   } else {?>

	<p>Data is not available !</p>

	<?php }?>

</table>
</form>




<?php include "lib/footer.php";?>