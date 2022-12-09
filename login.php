<?php
	include 'lib/Session.php';
	Session::init();
?>

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
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){
				$username = $fm->validation($_POST['username']);
				$password = $fm->validation(md5($_POST['password'])); 

				$username = mysqli_real_escape_string($db->link, $username);
				$password = mysqli_real_escape_string($db->link, $password);
				
				if(empty($username AND $password)){
					echo "<span style='color:red; font-size:18px;'>Username and Password must not  not be empty !!</span>";
				}else{
					$query =  "SELECT * FROM login_user WHERE username = '$username' AND password = '$password'";
				$result = $db->select($query);
				if ($result != false) {
					$value = mysqli_fetch_array($result);
					$row   = mysqli_num_rows($result);
					if ($row > 0) {
						Session::set("login", true);
						Session::set("username", $value['username']);
						Session::set("userId", $value['id']);
						header("Location:index.php"); 
					}else{
						 echo "<span style='color:red; font-size:18px;'>No result found..!!</span>";
					}
				}else{
					echo "<span style='color:red; font-size:18px;'>Username or Password not mathced..!!</span>";
				}
				}

				
			}
		?>
		
		
		
		<form class="form" action="login.php" method="post">
			
			<table class="tbl_login">
				<tr>
					<p style="text-align:center; font-size:25px; color:darkgreen">User Login</p>
					<hr>
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
						<input type="submit" name="login" value="Login">
						<a href="signup.php">SignUp Now</a>
					</td>
				</tr>
			</table>
		</form>
	</section>
</body>
</html>