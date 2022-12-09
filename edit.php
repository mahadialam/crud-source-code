<?php 
include "lib/header.php";
include "config/config.php";
include "lib/database.php";
?>

<?php  
	
	$id = $_GET['id'];
	$db = new Database();
	$query = "SELECT * FROM tbl_user WHERE id=$id";
	$getData = $db->select($query)->fetch_assoc();

	if (isset($_POST['submit'])) {
		
		$name 		= mysqli_real_escape_string($db->link, $_POST['name'] );
		$department = mysqli_real_escape_string($db->link, $_POST['department']);
		$age 		= mysqli_real_escape_string($db->link, $_POST['age']);

		if (empty($name or $department or $age)) {
		$error = "Feild must be not empty !";

	}else{
		$query 		= "UPDATE tbl_user SET
		name 		= '$name',
		department  = '$department',
		age 		= '$age'
		WHERE id = $id";
		$update = $db->update($query);
	}
	}
?>

<?php

if (isset($_POST['delete'])) {
		$db = new Database();
		$id = $_GET['id'];
		$query = "DELETE FROM tbl_user WHERE id = $id";
		$deleteData = $db->delete($query);
		if ($deleteData) {
			header("Location: index.php?msg_delete=".urlencode("Data deleted successfully."));
			exit();
		}
	}

?>

<?php
	
if (isset($error)) {
	echo "<span style= 'color:red;'>".$error."</span>"; 
}

if (isset($_POST['goback'])) {
	header("Location: index.php");
}

?>

<style type="text/css">

.tbl_create td input{
	padding: 5px 20px;
	margin-left: 20px;
	margin-bottom: 10px;
}

.tbl_create a {
	margin-left: 20px;
}


</style>
<span style="color: green;"><p></p></span>

<form action="edit.php?id=<?php echo $id; ?>" method="post">
	
	<table class="tbl_create">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $getData['name']?>"></td>
		</tr>

		<tr>
			<td>Department:</td>
			<td><input type="text" name="department" value="<?php echo $getData['department']?>"></td>
		</tr>

		<tr>
			<td>Age:</td>
			<td><input type="text" name="age" value="<?php echo $getData['age']?>"</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Update">
				<input type="reset" name="submit" value="Cancel">
			</td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" name="delete" value="Delete">
				<input type="submit" name="goback" value="Go back">
			</td>
		</tr>
	</table>
	
</form>



<?php include "lib/footer.php";?>