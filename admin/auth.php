<?php
// mendapatkan var 
	$username = $_POST['username'];
	$password = $_POST['password'];

include("../class/class.db.php");
include("../class/function.php");
$db = new db();
$q ="
	select * from tb_admin where username='$username' and password='$password'
";


$login = $db->run($q);

// $data = mysqli_fetch_array($login);

	// echo $query;

	if ($password === $login[0]['password']) {
		setcookie("webgis", "$username");
		header("Location: admin.php");
	}
	
	else {
		header("Location: logingagal.php");
	}


