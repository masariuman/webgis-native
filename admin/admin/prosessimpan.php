<?php
  require("koneksi.php");

$no_pelanggan   = $_POST["no_pelanggan"];
$titik_gps      = $_POST["titik_gps"];
$nama_pelanggan = $_POST["nama_pelanggan"];
$longitude      = $_POST["longitude"];
$latitude       = $_POST["latitude"];
$kelompok       = $_POST["kelompok"];
$alamat         = $_POST["alamat"];
$gambar         = $_POST["gambar"];

// echo $no_pelanggan  ;
// echo $titik_gps     ;
// echo $nama_pelanggan;
// echo $longitude     ;
// echo $latitude      ;
// echo $kelompok      ;
// echo $alamat        ;
// echo $gambar        ;

$query = "INSERT into tb_sambungan (no_pelanggan,titik_gps,nama_pelanggan,alamat,kelompok,foto,x,y) 
		VALUES ('$no_pelanggan','$titik_gps','$nama_pelanggan','$alamat','$kelompok','$gambar','$latitude','$longitude')";
mysqli_query($conn, $query) or die("insert failed");
header("Location: table2.php");
?>