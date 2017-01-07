<?php

include("class/class.db.php");
include("class/function.php");
$db = new db();
$q ="
	SELECT tb_sambungan.*, tb_kecamatan.*, tb_desa.nama_desa
	FROM tb_sambungan
	LEFT JOIN tb_kecamatan ON tb_sambungan.id_kecamatan = tb_kecamatan.id_kecamatan
	LEFT JOIN tb_desa ON tb_sambungan.id_desa = tb_sambungan.id_desa
	WHERE tb_sambungan.id_sambungan = '".$_GET['id']."'
";


	// mendapatkan var 
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// query
	$query="select * from siswa where username='$username' and password='$password'";
	$query1="select * from guru where username='$username' and password='$password'";
	$query2="select * from admin where username='$username' and password='$password'";

	// hasil
	$hasil = mysqli_query($conn, $query) or die("Error");
	$hasil1 = mysqli_query($conn, $query1) or die("Error1");
	$hasil2 = mysqli_query($conn, $query2) or die("Error2");

	// data
	$data = mysqli_fetch_array($hasil);
	$data1 = mysqli_fetch_array($hasil1);
	$data2 = mysqli_fetch_array($hasil2);

	// $un = $row['username'];
	// $un1 = $row['username'];
	// $un2 = $row['username'];


	// echo $query;

	if ($password === $data['password']) {
		setcookie("amcor", "$username");
		header("Location: indexsiswa.php");
	}
	elseif ($password === $data1['password']) {
		setcookie("amcor", "$username");
		header("location: indexguru.php");
	}
	elseif ($password === $data2['password']) {
		setcookie("amcor", "$username");
		header("Location: indexadmin.php");
	}
	elseif (empty($username) or empty($password)) {
		header("Location: logintidakbolehkosong.php");
	}
	else {
		header("Location: logingagal.php");
	}




	if (isset ($_POST['back'])){
		header("Location: news.php");
	}





	// $ceksiswa=mysqli_num_rows($query);
	// $cekguru=mysqli_num_rows($query1);
	// $cekadmin=mysqli_num_rows($query2);

	// if($ceksiswa){
	// 	header("Location: indexsiswa.php");
	// }
	// else if($cekguru){
	// 	header("Location: indexguru.php");
	// }
	// else if($cekadmin){
	// 	header("Location: indexadmin.php");
	// }	
	// else if (empty($username) or empty ($password)){
	// 	header("Location: logintidakbolehkosong.php");
	// }
	// else {
	// 	header("Location: logingagal.php");
	// }

?>


<!-- tempat anda
$koneksi=mysql_connect(“localhost”, “root”, “”);
$db=mysql_select_db(“latihan”,$koneksi);

// mencari password berdasarkan username
$query = “SELECT * FROM login WHERE username = ‘$username'”;
$hasil = mysql_query($query) or die(“Error”);
$data  = mysql_fetch_array($hasil);
// cek kesesuaian password terenkripsi dari form login
// dengan password dari database
if ($data[‘password’])
{
// jika sesuai, maka buat session untuk username
$_SESSION[‘username’] = $username;

// menampilkan menu ke halaman akses
echo “<h2>Login sukses</h2>”;
echo “<p><a href=hal1.php>Menu 1</a> | <a href=hal2.php>Menu 2</a> <a href=logout.php>Logout</a></p
}
else

echo “<h2>Login Gagal <A HREF=login.php> kembali ke depan </A></h2>”;

?> -->