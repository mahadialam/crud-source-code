<?php
	include "Session.php";
	Session::checkSession();
?>

<?php 
$fonts = "verdana";
$bgcolor = "#444"
?>

<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<style type="text/css">
		 body {font-family: <?php echo $fonts; ?>}
		 input{outline: none;}
		.phpcoding {width: 900px; margin: 0 auto; background: #ddd;}
		.headersection,.footersection{color: #fff; background: <?php echo $bgcolor; ?>; text-align: center;}
		.maincontent {min-height: 465px;  padding: 20px;}
		.headersection h2, .footersection h2 {margin: 0; padding: 10px;}
	</style>
</head>
<body>
<div class="phpcoding">
<section class="headersection">
	<h2>Student Management System</h2>
</section>

<section class="maincontent">
<hr>
<?php echo date('d/m/Y');?>
<span style="float: right;">
	<?php
	date_default_timezone_set('Asia/Dhaka');
	echo date ('h:i:s a');
	?>
	
	<?php 
		if(isset($_GET["action"]) && $_GET["action"] == "logout"){
			Session::destroy();
		}
	?>
	<a href="?action=logout">Logout</a>
</span>
<hr>