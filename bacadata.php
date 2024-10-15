<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "databel");

//baca status jam
$sql1 = mysqli_query($konek, "select * from jam where status=1");
$sql2 = mysqli_query($konek, "select * from jam where status=2");
$sql3 = mysqli_query($konek, "select * from jam where status=3");

//jika ada datanya, maka infokan ke nodemcu, waktunya bel bunyi

if (mysqli_num_rows($sql1) > 0) {
	echo "bunyikan 1";
}
if (mysqli_num_rows($sql2) > 0) {
	echo "bunyikan 2";
}
if (mysqli_num_rows($sql3) > 0) {
	echo "bunyikan 3";
}


?><?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "databel");

//baca status jam
$sql1 = mysqli_query($konek, "select * from jam where status=1");
$sql2 = mysqli_query($konek, "select * from jam where status=2");
$sql3 = mysqli_query($konek, "select * from jam where status=3");

//jika ada datanya, maka infokan ke nodemcu, waktunya bel bunyi

if (mysqli_num_rows($sql1) > 0) {
	echo "bunyikan 1";
}
if (mysqli_num_rows($sql2) > 0) {
	echo "bunyikan 2";
}
if (mysqli_num_rows($sql3) > 0) {
	echo "bunyikan 3";
}


?>