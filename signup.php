

<?php
	include "config/config.php";
	include "lib/database.php";
	include "helpers/format.php";

	$db = new Database();
	$fm = new Format(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<style type="text/css">
		.main_section{
			height: 300px;
			width: 400px;
			margin: 0 auto;
			background: lightgray;
			font-family: verdana;
			border: 2px solid darkgray;
			margin-top: 50px;
		}
		.tbl_login{
			margin: 0 auto;
			padding-top: 20px;
			
		}
		
		.tbl_login td input[type="text"],input[type="password"]{
			width: 200px;
			height: 20px;
			border: none;
			overflow: hidden;
			outline: none;
			margin-bottom: 5px;
			border: 1px solid darkgray;

		}
		.tbl_login td input[type="submit"]{
			padding: 5px;
			width: 70px;
			border: none;
			border: 1px solid darkgray;

		}

	</style>
</head>
<body>
	<section class="main_section">
	<?php
	
if (isset($_GET['msg'])) {
	echo "<span style= 'color:green; font-size:20px;'>".$_GET['msg']."</span>"; 
}

?>
		<?php
				
	$db = new Database();
	if (isset($_POST['signup'])) {
		
		$username 		= mysqli_real_escape_string($db->link, 	$_POST['username'] );
		$password 		= mysqli_real_escape_string($db->link, 	md5($_POST['password']));
		$fullname 		= mysqli_real_escape_string($db->link, 	$_POST['fullname']);

		if ($username == '' || $password == '' || $fullname == '') {
			echo "<span style='color:red; font-size:18px;'>Feild must not  not be empty !!</span>";

		}else{
			$query = "INSERT INTO  login_user(username, password, fullname) values('$username', '$password', '$fullname')";
			$create = $db->insert($query);
			header("Location: login.php");
		}

	}

		?>
		<form class="form" action="signup.php" method="post">
			
			<table class="tbl_login">
				<tr>
					<p style="text-align:center; font-size:25px; color:darkblue;">Sign Up Now</p>
					<hr>
				</tr>
				<tr>
					<td>Full Name</td>
					<td><input type="text" name="fullname"></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="text" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="signup" value="SignUp">
						<a href="login.php">Login</a>
					</td>
				</tr>
			</table>
		</form>
	</section>
</body>
</html>