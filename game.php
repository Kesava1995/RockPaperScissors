<?php
$message="";
if($_GET == null)die("Name parameter missing");
else{
	$name=$_GET['name'];
if (isset($_POST['logout'])) {
    header("Location: index.php");
    exit();
}
$carr=array("Rock","Paper","Scissors");
function check($computer, $human){
	if($computer==$human) 
		return "Tie";
	else if(($human=="0" && $computer=="2")||($human=="2" && $computer=="1")||($human=="1" && $computer=="0"))
		return "You Win";
	else 
		return "You Lose";
}
$computer=rand(0,2);
if(isset($_POST['human']) && $_POST['human']!=3){
	$human=$_POST['human'];
	$message=""."Your Play=".$carr[$human]." Computer Play=".$carr[$computer]." Result=".check($computer,$human);
}
else if(isset($_POST['human']) && $_POST['human']!=-1 && $_POST['human']==3){
	$message="";
	for($c=0;$c<3;$c++) {
		for($h=0;$h<3;$h++) {
			$r = check($c,$h);
			$message.="Your Play=$carr[$h] Computer Play=$carr[$c] Result=".$r."<br>";
		}
	}
}
}
?>
<html>
<head>
<title>db472ed8</title>
</head>
<body>
<h1>Rock Paper Scissors</h1>
<?php
echo "<p>Welcome: $name</p>";?>
<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>
<?php
echo "<pre>
Please select a strategy and press Play.

$message

</pre>"
?>
</body>
</html>