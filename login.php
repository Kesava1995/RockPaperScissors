<?php
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
$salt = 'XyZzy12*_';
$mess="";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if(empty($_POST['who']) or empty($_POST['pass']))$mess= "User name and password are required";
else{
	$pass=$_POST['pass'];
	if(hash('md5',$salt.$pass)!==$stored_hash)$mess="Incorrect password";
	else{
        header("Location: game.php?name=" . urlencode($_POST['who']));
        exit();
	}
}
}
?>
<html>
<head>
<title>db472ed8</title>
</head>
<body>
<form method="POST" action="login.php">
<h1>Log In</h1>
<p style="color:red;">
<?php
if (isset($mess)) {
    echo htmlentities($mess);
}
?>
</p>
<label for="who">Username</label>
<input type="text"  name="who"><br>
<label for="#2">Password</label>
<input type="password" name="pass"><br>
<input type="submit" value="Log In">
<input type="reset" value="Cancel">
</form>
</body>
</html>