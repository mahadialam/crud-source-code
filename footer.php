<!--
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="text"><?php echo $errname;?></td>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input type="text" name="email"><?php echo $erremail;?></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
-->

<?php 

/*

//Simple result app **

$arr = array(
	'Name: Mahadi Alam Sumon<br>Result: Pass<br>CGPA: 3.11'=>'162692',
	'Name: Atikul Islam<br>Result: Pass<br>CGPA: 3.45'=>'162696', 
	'<span style="color: red;">Name: Rubel Islam<br>Result: Refard 2 subject (66654,66652)</span>'=>'162688', 
	'Name: A S Nayem<br>Result: Pass<br>CGPA: 3.50'=>'162700');

if (isset($_POST['text'])){
	global $txt;
	global $result;
	$txt = $_POST['text'];
	$result = array_search($txt, $arr);
	
	if(in_array($txt, $arr)){
		
		$result = array_search($txt, $arr);

	}else{
		echo "<br><span style = 'color: red'>Invalid roll number !!</span>";
	}	
}

//Form validation**

$errname = $erremail = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (empty($_POST['text'])) {
		$errname = '<span style="color: red"> *Name required</span>';
}else {
	$name = validate($_POST['text']);
}

if (empty($_POST['email'])) {
		$erremail = '<span style="color: red"> *E-mail required</span>';
}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$erremail = '<span style="color: red"> *Invalid email format</span>';
}
else {
	$email = validate($_POST['email']);
}
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = validate($_POST['text']);
	$email = validate($_POST['email']);



	echo 'Name '.'<span style="color: green;">'.$_POST['text'].'</span>';
	echo '<br/>';
	echo 'Email '.'<span style="color: green;">'.$_POST['email'].'</span>';
}


	function validate($data){
	$data = trim('$data');
	$data = stripcslashes('$data');
	$data = htmlspecialchars('$data');
	
	return $data;
}


// While loops
$x = 1;
while($x <= 5){
	echo "While loops number is: $x <br/>";
	$x++;
}

// Do while loops
$x = 2;
do{
	echo "Do while loops number is: $x <br/>";
	$x++;
}while($x <= 5);

// For loops
for($i = 0; $i <= 10; $i++){
	echo "For loops number is: $i <br/>";
}

//Foreach loops
$color = array("blue", "red", "skyblue");
foreach($color as $mycolor){
	echo "Foreach code $mycolor <br/>";
}


// Functions program
function school($x = "My college"){
	echo "$x is good<br/>";
}
school("Sylhet Polytechnic Institute");
school();

function sum($x, $y){
	$z = $x+$y;
	return $z;
}
echo "<br/> 5+10 = ".sum(5,10);


// Array program
$x = array(5, 10, 15, 17);
$length = count($x);

for ($i = 0; $i<$length; $i++){
	echo " $x[$i] <br/>";
	
}

$friends = array("Ridoy" => "22", "Faruk" => "21", "Jony" => "23");

foreach($friends as $key => $value){
	echo $key.", Age = ".$value;
	echo "<br/>";
}

$bestus = array(
	array("Ridoy", "Rongpur"),
	array("Faruk", "Chittagong"),
	array("Jony", "Rajshahi"),
	array("Mahadi", "Sylhet")
);

for($row=0; $row<4; $row++){
	echo "<p>Row number $row</p>";
	echo "<ul>";
	for($col=0; $col<2; $col++){
		echo "<li>".$bestus[$row][$col]."</li>";
	}

	echo "</ul>";
}



//Array sorting
$x = array(34, 434, 43);
sort($x); //chuto theke boro print korar jonno

for($i=0; $i<3; $i++){
	echo "".$x[$i]."<br/>";
}

$x = array(34, 434, 43);
rsort($x); //boro theke chuto print korar jonno

for($i=0; $i<3; $i++){
	echo " ".$x[$i];
	echo "<br/>";
}

$y = array("Ridoy"=>5, "Faruk"=>12, "Jony"=>20);
asort($y); // valueke chuto theke boro onujayi print korar jonno

foreach($y as $key => $value){
	echo "Key = ".$key." Value = ".$value;
	echo "<br/>";
}

$y = array("Jamal"=>6, "Aslam"=>30, "Rohim"=>12);
ksort($y); // key ortat namguloke alphabet akare sajiye print kroar jonno 

foreach ($y as $key => $value) {
	echo "Key = ".$key." Value = ".$value;
	echo "<br/>";
}


// SUPPER VRAIBLE $GLOBALS AND $_SERVER 
$x = 5;
$y = 15;

function sum(){
	$GLOBALS['z']= $GLOBALS['x']+$GLOBALS['y'];
}

sum();
echo $z;
echo "<br/>";

echo $_SERVER['SERVER_NAME'];
ECHO "<br/>";
echo $_SERVER['PHP_SELF'];
ECHO "<br/>";
echo $_SERVER['SERVER_ADDR'];





<form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
Username: <input name="username" type="text"/>
<input type="submit" value="Submit"/>
</form>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = $_REQUEST['username'];
	if(empty($name)){
		echo "<span style='color: red;'>Username field must not be empty !!</span>";
	}else{
		echo "<span style='color: green;'>You have submitted : ".$name."</span>";
	}
}

?>

*/

?>
<!--<a href="text.php?msg=Good&txt=Bye">Sent Data</a>-->
</section>

<section class="footersection">
	<h2>Developer Mahadi Alam</h2>
</section>
</div>

<script type="js" src="jquery/jquery.js"></script>

</body>
</html>