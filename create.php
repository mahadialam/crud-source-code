<?php 
include "lib/header.php";
include "config/config.php";
include "lib/database.php";
?>

<?php  
	
	$db = new Database();
	if (isset($_POST['submit'])) {
		
		$name 		= mysqli_real_escape_string($db->link, $_POST['name'] );
		$department = mysqli_real_escape_string($db->link, $_POST['department']);
		$age 		= mysqli_real_escape_string($db->link, $_POST['age']);

		if ($name == '' || $department == '' || $age == '') {
			$error = "Feild must be not empty !";

		}else{
			$query = "INSERT INTO tbl_user(name, department, age) values('$name', '$department', '$age')";
			$create = $db->insert($query);
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

.goback input{
	width: 195px;
}


</style>
<span style="color: green;"><p></p></span>

<form action="create.php" method="post">
	
	<table class="tbl_create">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" placeholder="Enter your name"></td>
		</tr>

		<tr>
			<td>Department:</td>
			<td><input type="text" name="department" placeholder="Enter your department"></td>
		</tr>

		<tr>
			<td>Age:</td>
			<td><input type="text" name="age" placeholder="Enter your age"></td>
		</tr>

		<tr>
			<td></td>
			<td>
				<input type="submit" name="submit" value="Submit">
				<input type="reset" name="submit" value="Cancel">
			</td>
		</tr>

		<tr>
			<td></td>
			<td class="goback"><input type="submit" name="goback" value="Go back"></td>
		</tr>
	</table>
	
</form>



<?php include "lib/footer.php";?>